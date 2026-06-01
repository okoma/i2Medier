import EditorJS from '@editorjs/editorjs';
import Checklist from '@editorjs/checklist';
import CodeTool from '@editorjs/code';
import Embed from '@editorjs/embed';
import Header from '@editorjs/header';
import InlineCode from '@editorjs/inline-code';
import List from '@editorjs/list';
import Marker from '@editorjs/marker';
import Quote from '@editorjs/quote';
import Delimiter from '@editorjs/delimiter';
import Table from '@editorjs/table';
import Underline from '@editorjs/underline';

window.i2EditorJsInstances ??= new Map();
class BaseFormTool {
    constructor({ data = {}, readOnly = false }) {
        this.data = data;
        this.readOnly = readOnly;
        this.wrapper = null;
    }

    makeField(tag, className, value = '', attributes = {}) {
        const field = document.createElement(tag);
        field.className = className;
        field.value = value ?? '';

        Object.entries(attributes).forEach(([key, val]) => {
            if (val !== null && val !== undefined) {
                field.setAttribute(key, String(val));
            }
        });

        if (this.readOnly) {
            field.setAttribute('disabled', 'disabled');
        }

        return field;
    }

    makeLabel(text) {
        const label = document.createElement('label');
        label.className = 'i2-editorjs-field-label';
        label.textContent = text;

        return label;
    }

    makeFieldGroup(labelText, field) {
        const group = document.createElement('div');
        group.className = 'i2-editorjs-field-group';
        group.append(this.makeLabel(labelText), field);

        return group;
    }

    makeUploadButton(onUploaded) {
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'i2-editorjs-upload-btn';
        btn.textContent = '↑ Upload from device';

        const fileInput = document.createElement('input');
        fileInput.type = 'file';
        fileInput.accept = 'image/jpeg,image/png,image/gif,image/webp,image/avif';
        fileInput.style.display = 'none';

        btn.addEventListener('click', () => fileInput.click());

        fileInput.addEventListener('change', async () => {
            const file = fileInput.files?.[0];
            if (!file) return;

            btn.disabled = true;
            btn.textContent = 'Uploading…';

            try {
                const formData = new FormData();
                formData.append('image', file);

                const meta = document.querySelector('meta[name="csrf-token"]');
                const res = await fetch('/admin/blog/upload-image', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': meta?.content ?? '', Accept: 'application/json' },
                    body: formData,
                });

                if (!res.ok) throw new Error('Upload failed');
                const json = await res.json();
                onUploaded(json.url);
            } catch {
                btn.textContent = 'Upload failed — try again';
            } finally {
                btn.disabled = false;
                btn.textContent = '↑ Upload from device';
                fileInput.value = '';
            }
        });

        const wrap = document.createElement('div');
        wrap.className = 'i2-editorjs-upload-wrap';
        wrap.append(btn, fileInput);

        return wrap;
    }
}

class ImageBlockTool extends BaseFormTool {
    static get toolbox() {
        return {
            title: 'Image',
            icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M4 5h16v14H4z" stroke="currentColor" stroke-width="1.8"/><circle cx="9" cy="10" r="1.5" fill="currentColor"/><path d="m20 16-4.5-4.5L8 19" stroke="currentColor" stroke-width="1.8"/></svg>',
        };
    }

    render() {
        this.wrapper = document.createElement('div');
        this.wrapper.className = 'i2-editorjs-custom-block';

        this.urlInput = this.makeField('input', 'i2-editorjs-input', this.data.url, { type: 'url', placeholder: 'https://example.com/image.jpg' });
        this.altInput = this.makeField('input', 'i2-editorjs-input', this.data.alt, { type: 'text', placeholder: 'Alternative text' });
        this.captionInput = this.makeField('textarea', 'i2-editorjs-textarea', this.data.caption, { rows: '3', placeholder: 'Optional caption' });

        const uploadBtn = this.makeUploadButton((url) => { this.urlInput.value = url; });

        this.wrapper.append(
            this.makeFieldGroup('Image URL', this.urlInput),
            uploadBtn,
            this.makeFieldGroup('Alt text', this.altInput),
            this.makeFieldGroup('Caption', this.captionInput),
        );

        return this.wrapper;
    }

    save() {
        return {
            url: this.urlInput.value.trim(),
            alt: this.altInput.value.trim(),
            caption: this.captionInput.value.trim(),
        };
    }
}

class GalleryBlockTool extends BaseFormTool {
    static get toolbox() {
        return {
            title: 'Gallery',
            icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="8" height="8" stroke="currentColor" stroke-width="1.8"/><rect x="13" y="5" width="8" height="8" stroke="currentColor" stroke-width="1.8"/><rect x="3" y="15" width="8" height="6" stroke="currentColor" stroke-width="1.8"/><rect x="13" y="15" width="8" height="6" stroke="currentColor" stroke-width="1.8"/></svg>',
        };
    }

    render() {
        this.wrapper = document.createElement('div');
        this.wrapper.className = 'i2-editorjs-custom-block';

        this.titleInput = this.makeField('input', 'i2-editorjs-input', this.data.title, { type: 'text', placeholder: 'Gallery title' });
        this.imagesInput = this.makeField('textarea', 'i2-editorjs-textarea', (this.data.images ?? []).join('\n'), { rows: '5', placeholder: 'One image URL per line' });
        this.captionInput = this.makeField('textarea', 'i2-editorjs-textarea', this.data.caption, { rows: '3', placeholder: 'Optional supporting text' });

        const uploadBtn = this.makeUploadButton((url) => {
            const current = this.imagesInput.value.trimEnd();
            this.imagesInput.value = current ? current + '\n' + url : url;
        });

        this.wrapper.append(
            this.makeFieldGroup('Gallery title', this.titleInput),
            this.makeFieldGroup('Images (one URL per line)', this.imagesInput),
            uploadBtn,
            this.makeFieldGroup('Caption', this.captionInput),
        );

        return this.wrapper;
    }

    save() {
        return {
            title: this.titleInput.value.trim(),
            images: this.imagesInput.value.split('\n').map((item) => item.trim()).filter(Boolean),
            caption: this.captionInput.value.trim(),
        };
    }
}

class AlertBlockTool extends BaseFormTool {
    static get toolbox() {
        return {
            title: 'Alert Box',
            icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 4 3 20h18L12 4Z" stroke="currentColor" stroke-width="1.8"/><path d="M12 9v5" stroke="currentColor" stroke-width="1.8"/><circle cx="12" cy="17" r="1" fill="currentColor"/></svg>',
        };
    }

    render() {
        this.wrapper = document.createElement('div');
        this.wrapper.className = 'i2-editorjs-custom-block';
        this.toneInput = document.createElement('select');
        this.toneInput.className = 'i2-editorjs-select';
        [
            ['info',    '💡 Info (blue)'],
            ['success', '✅ Success (green)'],
            ['warning', '⚠️ Warning (yellow)'],
            ['danger',  '🚫 Danger (red)'],
        ].forEach(([value, label]) => {
            const option = document.createElement('option');
            option.value = value;
            option.textContent = label;
            option.selected = (this.data.tone ?? 'info') === value;
            this.toneInput.appendChild(option);
        });
        if (this.readOnly) this.toneInput.setAttribute('disabled', 'disabled');
        this.titleInput = this.makeField('input', 'i2-editorjs-input', this.data.title, { type: 'text', placeholder: 'Bold heading (optional)' });
        this.messageInput = this.makeField('textarea', 'i2-editorjs-textarea', this.data.message, { rows: '4', placeholder: 'Alert message' });
        this.wrapper.append(
            this.makeFieldGroup('Colour / tone', this.toneInput),
            this.makeFieldGroup('Heading', this.titleInput),
            this.makeFieldGroup('Message', this.messageInput),
        );
        return this.wrapper;
    }

    save() {
        return {
            tone: this.toneInput.value,
            title: this.titleInput.value.trim(),
            message: this.messageInput.value.trim(),
        };
    }
}

class ButtonBlockTool extends BaseFormTool {
    static get toolbox() {
        return {
            title: 'Button',
            icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><rect x="4" y="8" width="16" height="8" rx="4" stroke="currentColor" stroke-width="1.8"/><path d="M10 12h4" stroke="currentColor" stroke-width="1.8"/></svg>',
        };
    }

    render() {
        this.wrapper = document.createElement('div');
        this.wrapper.className = 'i2-editorjs-custom-block';
        this.labelInput = this.makeField('input', 'i2-editorjs-input', this.data.label, { type: 'text', placeholder: 'Button label' });
        this.urlInput = this.makeField('input', 'i2-editorjs-input', this.data.url, { type: 'url', placeholder: 'https://example.com' });
        this.styleInput = document.createElement('select');
        this.styleInput.className = 'i2-editorjs-select';
        ['primary', 'secondary', 'ghost'].forEach((style) => {
            const option = document.createElement('option');
            option.value = style;
            option.textContent = style.charAt(0).toUpperCase() + style.slice(1);
            option.selected = (this.data.style ?? 'primary') === style;
            this.styleInput.appendChild(option);
        });
        if (this.readOnly) this.styleInput.setAttribute('disabled', 'disabled');
        this.wrapper.append(
            this.makeFieldGroup('Label', this.labelInput),
            this.makeFieldGroup('URL', this.urlInput),
            this.makeFieldGroup('Style', this.styleInput),
        );
        return this.wrapper;
    }

    save() {
        return {
            label: this.labelInput.value.trim(),
            url: this.urlInput.value.trim(),
            style: this.styleInput.value,
        };
    }
}

class FAQBlockTool extends BaseFormTool {
    static get toolbox() {
        return {
            title: 'FAQ',
            icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.8"/><path d="M9.5 9.5a2.5 2.5 0 1 1 4 2l-1 1" stroke="currentColor" stroke-width="1.8"/><circle cx="12" cy="16.5" r="1" fill="currentColor"/></svg>',
        };
    }

    render() {
        this.wrapper = document.createElement('div');
        this.wrapper.className = 'i2-editorjs-custom-block';
        this.titleInput = this.makeField('input', 'i2-editorjs-input', this.data.title, { type: 'text', placeholder: 'Section title' });
        this.itemsInput = this.makeField('textarea', 'i2-editorjs-textarea', (this.data.items ?? []).map((item) => `${item.question ?? ''} | ${item.answer ?? ''}`).join('\n'), { rows: '6', placeholder: 'One item per line: Question | Answer' });
        this.wrapper.append(
            this.makeFieldGroup('Title', this.titleInput),
            this.makeFieldGroup('FAQ items', this.itemsInput),
        );
        return this.wrapper;
    }

    save() {
        return {
            title: this.titleInput.value.trim(),
            items: this.itemsInput.value.split('\n').map((line) => {
                const [question, ...answerParts] = line.split('|');
                const answer = answerParts.join('|');
                return {
                    question: (question ?? '').trim(),
                    answer: (answer ?? '').trim(),
                };
            }).filter((item) => item.question && item.answer),
        };
    }
}

class CTABlockTool extends BaseFormTool {
    static get toolbox() {
        return {
            title: 'CTA',
            icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M5 12h14" stroke="currentColor" stroke-width="1.8"/><path d="m13 6 6 6-6 6" stroke="currentColor" stroke-width="1.8"/></svg>',
        };
    }

    render() {
        this.wrapper = document.createElement('div');
        this.wrapper.className = 'i2-editorjs-custom-block';
        this.eyebrowInput = this.makeField('input', 'i2-editorjs-input', this.data.eyebrow, { type: 'text', placeholder: 'Optional eyebrow' });
        this.headingInput = this.makeField('input', 'i2-editorjs-input', this.data.heading, { type: 'text', placeholder: 'CTA heading' });
        this.textInput = this.makeField('textarea', 'i2-editorjs-textarea', this.data.text, { rows: '4', placeholder: 'Supporting message' });
        this.buttonLabelInput = this.makeField('input', 'i2-editorjs-input', this.data.buttonLabel, { type: 'text', placeholder: 'Button label' });
        this.buttonUrlInput = this.makeField('input', 'i2-editorjs-input', this.data.buttonUrl, { type: 'url', placeholder: 'https://example.com/contact' });
        this.wrapper.append(
            this.makeFieldGroup('Eyebrow', this.eyebrowInput),
            this.makeFieldGroup('Heading', this.headingInput),
            this.makeFieldGroup('Text', this.textInput),
            this.makeFieldGroup('Button label', this.buttonLabelInput),
            this.makeFieldGroup('Button URL', this.buttonUrlInput),
        );
        return this.wrapper;
    }

    save() {
        return {
            eyebrow: this.eyebrowInput.value.trim(),
            heading: this.headingInput.value.trim(),
            text: this.textInput.value.trim(),
            buttonLabel: this.buttonLabelInput.value.trim(),
            buttonUrl: this.buttonUrlInput.value.trim(),
        };
    }
}

class PricingBlockTool extends BaseFormTool {
    static get toolbox() {
        return {
            title: 'Pricing',
            icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 4v16" stroke="currentColor" stroke-width="1.8"/><path d="M17 7.5c0-1.933-2.239-3.5-5-3.5s-5 1.567-5 3.5 2.239 3.5 5 3.5 5 1.567 5 3.5-2.239 3.5-5 3.5-5-1.567-5-3.5" stroke="currentColor" stroke-width="1.8"/></svg>',
        };
    }

    render() {
        this.wrapper = document.createElement('div');
        this.wrapper.className = 'i2-editorjs-custom-block';
        this.titleInput = this.makeField('input', 'i2-editorjs-input', this.data.title, { type: 'text', placeholder: 'Section title' });
        this.subtitleInput = this.makeField('textarea', 'i2-editorjs-textarea', this.data.subtitle, { rows: '3', placeholder: 'Section subtitle' });
        this.plansInput = this.makeField('textarea', 'i2-editorjs-textarea', (this.data.plans ?? []).map((plan) => `${plan.name ?? ''} | ${plan.price ?? ''} | ${plan.description ?? ''} | ${(plan.features ?? []).join('; ')}`).join('\n'), { rows: '7', placeholder: 'One plan per line: Name | Price | Description | Feature 1; Feature 2' });
        this.wrapper.append(
            this.makeFieldGroup('Title', this.titleInput),
            this.makeFieldGroup('Subtitle', this.subtitleInput),
            this.makeFieldGroup('Plans', this.plansInput),
        );
        return this.wrapper;
    }

    save() {
        return {
            title: this.titleInput.value.trim(),
            subtitle: this.subtitleInput.value.trim(),
            plans: this.plansInput.value.split('\n').map((line) => {
                const [name, price, description, features] = line.split('|').map((part) => (part ?? '').trim());
                return {
                    name,
                    price,
                    description,
                    features: (features ?? '').split(';').map((item) => item.trim()).filter(Boolean),
                };
            }).filter((plan) => plan.name),
        };
    }
}

class ServiceCardsTool extends BaseFormTool {
    static get toolbox() {
        return {
            title: 'Service Cards',
            icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="7" height="14" stroke="currentColor" stroke-width="1.8"/><rect x="14" y="5" width="7" height="14" stroke="currentColor" stroke-width="1.8"/></svg>',
        };
    }

    render() {
        this.wrapper = document.createElement('div');
        this.wrapper.className = 'i2-editorjs-custom-block';
        this.titleInput = this.makeField('input', 'i2-editorjs-input', this.data.title, { type: 'text', placeholder: 'Section title' });
        this.cardsInput = this.makeField('textarea', 'i2-editorjs-textarea', (this.data.cards ?? []).map((card) => `${card.title ?? ''} | ${card.text ?? ''} | ${card.url ?? ''}`).join('\n'), { rows: '7', placeholder: 'One card per line: Title | Description | URL' });
        this.wrapper.append(
            this.makeFieldGroup('Title', this.titleInput),
            this.makeFieldGroup('Cards', this.cardsInput),
        );
        return this.wrapper;
    }

    save() {
        return {
            title: this.titleInput.value.trim(),
            cards: this.cardsInput.value.split('\n').map((line) => {
                const [title, text, url] = line.split('|').map((part) => (part ?? '').trim());
                return { title, text, url };
            }).filter((card) => card.title),
        };
    }
}

class StatCalloutTool extends BaseFormTool {
    static get toolbox() {
        return {
            title: 'Stat Callout',
            icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M8 12h3m0 0v-3m0 3v3m0-3h3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>',
        };
    }

    render() {
        this.wrapper = document.createElement('div');
        this.wrapper.className = 'i2-editorjs-custom-block';
        this.statInput = this.makeField('input', 'i2-editorjs-input', this.data.stat, { type: 'text', placeholder: '53% or ₦2M+ or 48 hrs' });
        this.labelInput = this.makeField('textarea', 'i2-editorjs-textarea', this.data.label, { rows: '3', placeholder: 'Supporting sentence. Wrap key words in **double asterisks** for bold.' });
        this.wrapper.append(
            this.makeFieldGroup('Stat / Number', this.statInput),
            this.makeFieldGroup('Supporting text', this.labelInput),
        );
        return this.wrapper;
    }

    save() {
        return {
            stat: this.statInput.value.trim(),
            label: this.labelInput.value.trim(),
        };
    }
}

class CompareTool extends BaseFormTool {
    static get toolbox() {
        return {
            title: 'Comparison',
            icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><rect x="2" y="4" width="9" height="16" rx="2" stroke="currentColor" stroke-width="1.8"/><rect x="13" y="4" width="9" height="16" rx="2" stroke="currentColor" stroke-width="1.8"/></svg>',
        };
    }

    render() {
        this.wrapper = document.createElement('div');
        this.wrapper.className = 'i2-editorjs-custom-block';

        const badHead = document.createElement('div');
        badHead.textContent = '❌ Left side (bad)';
        badHead.style.cssText = 'font-size:.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:#c0392b;margin:.25rem 0 .5rem';

        const goodHead = document.createElement('div');
        goodHead.textContent = '✓ Right side (good)';
        goodHead.style.cssText = 'font-size:.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:#166534;margin:1rem 0 .5rem';

        this.leftLabelInput = this.makeField('input', 'i2-editorjs-input', this.data.leftLabel, { type: 'text', placeholder: '❌ Typical Page Builder Site' });
        this.leftScoreInput = this.makeField('input', 'i2-editorjs-input', this.data.leftScore, { type: 'text', placeholder: 'Score / value — e.g. 35' });
        this.leftDescInput = this.makeField('textarea', 'i2-editorjs-textarea', this.data.leftDesc, { rows: '3', placeholder: 'Describe why this is the worse option' });
        this.rightLabelInput = this.makeField('input', 'i2-editorjs-input', this.data.rightLabel, { type: 'text', placeholder: '✓ i2Medier Custom Build' });
        this.rightScoreInput = this.makeField('input', 'i2-editorjs-input', this.data.rightScore, { type: 'text', placeholder: 'Score / value — e.g. 96' });
        this.rightDescInput = this.makeField('textarea', 'i2-editorjs-textarea', this.data.rightDesc, { rows: '3', placeholder: 'Describe why this is the better option' });

        this.wrapper.append(
            badHead,
            this.makeFieldGroup('Label', this.leftLabelInput),
            this.makeFieldGroup('Score / Value', this.leftScoreInput),
            this.makeFieldGroup('Description', this.leftDescInput),
            goodHead,
            this.makeFieldGroup('Label', this.rightLabelInput),
            this.makeFieldGroup('Score / Value', this.rightScoreInput),
            this.makeFieldGroup('Description', this.rightDescInput),
        );
        return this.wrapper;
    }

    save() {
        return {
            leftLabel: this.leftLabelInput.value.trim(),
            leftScore: this.leftScoreInput.value.trim(),
            leftDesc: this.leftDescInput.value.trim(),
            rightLabel: this.rightLabelInput.value.trim(),
            rightScore: this.rightScoreInput.value.trim(),
            rightDesc: this.rightDescInput.value.trim(),
        };
    }
}

class ProConListTool extends BaseFormTool {
    static get toolbox() {
        return {
            title: 'Pro / Con List',
            icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><circle cx="5" cy="8" r="1.5" fill="currentColor"/><circle cx="5" cy="16" r="1.5" fill="currentColor"/><path d="M9 8h10M9 16h10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>',
        };
    }

    render() {
        this.wrapper = document.createElement('div');
        this.wrapper.className = 'i2-editorjs-custom-block';

        this.typeInput = document.createElement('select');
        this.typeInput.className = 'i2-editorjs-select';
        [
            ['check', '✓ Check list — gold ticks (use for "what to do")'],
            ['cross', '✗ Cross list — red crosses (use for "what not to do")'],
        ].forEach(([value, label]) => {
            const option = document.createElement('option');
            option.value = value;
            option.textContent = label;
            option.selected = (this.data.type ?? 'check') === value;
            this.typeInput.appendChild(option);
        });
        if (this.readOnly) this.typeInput.setAttribute('disabled', 'disabled');

        this.itemsInput = this.makeField('textarea', 'i2-editorjs-textarea', (this.data.items ?? []).join('\n'), { rows: '6', placeholder: 'One item per line' });

        this.wrapper.append(
            this.makeFieldGroup('List type', this.typeInput),
            this.makeFieldGroup('Items (one per line)', this.itemsInput),
        );
        return this.wrapper;
    }

    save() {
        return {
            type: this.typeInput.value,
            items: this.itemsInput.value.split('\n').map((item) => item.trim()).filter(Boolean),
        };
    }
}

class ChallengeGridTool extends BaseFormTool {
    static get toolbox() {
        return {
            title: 'Challenge Grid',
            icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="8" height="8" rx="1" stroke="currentColor" stroke-width="1.8"/><rect x="13" y="3" width="8" height="8" rx="1" stroke="currentColor" stroke-width="1.8"/><rect x="3" y="13" width="8" height="8" rx="1" stroke="currentColor" stroke-width="1.8"/><rect x="13" y="13" width="8" height="8" rx="1" stroke="currentColor" stroke-width="1.8"/></svg>',
        };
    }

    render() {
        this.wrapper = document.createElement('div');
        this.wrapper.className = 'i2-editorjs-custom-block';
        this.cardsInput = this.makeField('textarea', 'i2-editorjs-textarea',
            (this.data.cards ?? []).map((c) => `${c.icon ?? ''} | ${c.title ?? ''} | ${c.desc ?? ''} | ${c.variant ?? 'light'}`).join('\n'),
            { rows: '7', placeholder: 'globe | Card Title | Description text | dark\nclipboard-list | Another Card | Description | light' }
        );
        this.wrapper.append(this.makeFieldGroup('Cards (icon-name | title | description | dark or light)', this.cardsInput));
        return this.wrapper;
    }

    save() {
        return {
            cards: this.cardsInput.value.split('\n').map((line) => {
                const [icon, title, desc, variant] = line.split('|').map((p) => (p ?? '').trim());
                return { icon: icon ?? '', title: title ?? '', desc: desc ?? '', variant: variant === 'dark' ? 'dark' : 'light' };
            }).filter((c) => c.title),
        };
    }
}

class ProcessStepsTool extends BaseFormTool {
    static get toolbox() {
        return {
            title: 'Process Steps',
            icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><circle cx="6" cy="5" r="2.5" stroke="currentColor" stroke-width="1.8"/><circle cx="6" cy="12" r="2.5" stroke="currentColor" stroke-width="1.8"/><circle cx="6" cy="19" r="2.5" stroke="currentColor" stroke-width="1.8"/><path d="M6 7.5v2M6 14.5v2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><path d="M11 5h8M11 12h8M11 19h8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>',
        };
    }

    render() {
        this.wrapper = document.createElement('div');
        this.wrapper.className = 'i2-editorjs-custom-block';
        this.stepsInput = this.makeField('textarea', 'i2-editorjs-textarea',
            (this.data.steps ?? []).map((s) => `${s.title ?? ''} | ${s.desc ?? ''}`).join('\n'),
            { rows: '8', placeholder: 'Discovery Phase | We interviewed stakeholders and mapped user journeys…\nDesign | Created wireframes and high-fidelity mockups…' }
        );
        this.wrapper.append(this.makeFieldGroup('Steps (step title | description)', this.stepsInput));
        return this.wrapper;
    }

    save() {
        return {
            steps: this.stepsInput.value.split('\n').map((line) => {
                const [title, ...descParts] = line.split('|');
                return { title: (title ?? '').trim(), desc: descParts.join('|').trim() };
            }).filter((s) => s.title),
        };
    }
}

class TechStackTool extends BaseFormTool {
    static get toolbox() {
        return {
            title: 'Tech Stack',
            icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 3 3 7.5 12 12l9-4.5L12 3Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M3 12l9 4.5 9-4.5" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M3 16.5l9 4.5 9-4.5" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>',
        };
    }

    render() {
        this.wrapper = document.createElement('div');
        this.wrapper.className = 'i2-editorjs-custom-block';
        this.chipsInput = this.makeField('textarea', 'i2-editorjs-textarea',
            (this.data.chips ?? []).map((c) => `${c.icon ?? ''} | ${c.name ?? ''} | ${c.role ?? ''}`).join('\n'),
            { rows: '8', placeholder: 'code-bracket | WordPress | CMS / Platform\ncog-6-tooth | ACF Pro | Flexible Content' }
        );
        this.wrapper.append(this.makeFieldGroup('Tech items (icon-name | name | role)', this.chipsInput));
        return this.wrapper;
    }

    save() {
        return {
            chips: this.chipsInput.value.split('\n').map((line) => {
                const [icon, name, role] = line.split('|').map((p) => (p ?? '').trim());
                return { icon: icon ?? '', name: name ?? '', role: role ?? '' };
            }).filter((c) => c.name),
        };
    }
}

class FeatureGridTool extends BaseFormTool {
    static get toolbox() {
        return {
            title: 'Feature Grid',
            icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M3 5a2 2 0 0 1 2-2h4v8H3V5ZM3 13h6v8H5a2 2 0 0 1-2-2v-6ZM15 3h4a2 2 0 0 1 2 2v6h-6V3ZM15 13h6v6a2 2 0 0 1-2 2h-4v-8Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>',
        };
    }

    render() {
        this.wrapper = document.createElement('div');
        this.wrapper.className = 'i2-editorjs-custom-block';
        this.itemsInput = this.makeField('textarea', 'i2-editorjs-textarea',
            (this.data.items ?? []).map((i) => `${i.icon ?? ''} | ${i.title ?? ''} | ${i.desc ?? ''}`).join('\n'),
            { rows: '8', placeholder: 'currency-dollar | Dual Donation Gateway | Paystack for NGN and Stripe for GBP/USD donors…\nclipboard-list | Programs Directory | Filterable archive of all active programs…' }
        );
        this.wrapper.append(this.makeFieldGroup('Features (icon-name | title | description)', this.itemsInput));
        return this.wrapper;
    }

    save() {
        return {
            items: this.itemsInput.value.split('\n').map((line) => {
                const [icon, title, ...descParts] = line.split('|');
                return { icon: (icon ?? '').trim(), title: (title ?? '').trim(), desc: descParts.join('|').trim() };
            }).filter((i) => i.title),
        };
    }
}

class ScreensGridTool extends BaseFormTool {
    static get toolbox() {
        return {
            title: 'Screens Grid',
            icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><rect x="2" y="4" width="9" height="7" rx="1" stroke="currentColor" stroke-width="1.8"/><rect x="13" y="4" width="9" height="7" rx="1" stroke="currentColor" stroke-width="1.8"/><rect x="2" y="13" width="9" height="7" rx="1" stroke="currentColor" stroke-width="1.8"/><rect x="13" y="13" width="9" height="7" rx="1" stroke="currentColor" stroke-width="1.8"/></svg>',
        };
    }

    render() {
        this.wrapper = document.createElement('div');
        this.wrapper.className = 'i2-editorjs-custom-block';
        this.screensInput = this.makeField('textarea', 'i2-editorjs-textarea',
            (this.data.screens ?? []).map((s) => `${s.label ?? ''} | ${s.url ?? ''}`).join('\n'),
            { rows: '5', placeholder: 'Homepage | https://example.com/screens/home.jpg\nDashboard | https://example.com/screens/dashboard.jpg' }
        );
        const uploadBtn = this.makeUploadButton((url) => {
            const current = this.screensInput.value.trimEnd();
            this.screensInput.value = current ? `${current}\nNew Screen | ${url}` : `New Screen | ${url}`;
        });
        this.wrapper.append(
            this.makeFieldGroup('Screens (label | image URL)', this.screensInput),
            uploadBtn,
        );
        return this.wrapper;
    }

    save() {
        return {
            screens: this.screensInput.value.split('\n').map((line) => {
                const [label, ...urlParts] = line.split('|');
                return { label: (label ?? '').trim(), url: urlParts.join('|').trim() };
            }).filter((s) => s.label || s.url),
        };
    }
}

class ImpactStatsTool extends BaseFormTool {
    static get toolbox() {
        return {
            title: 'Impact Stats',
            icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M4 20V14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M8 20V10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M12 20V6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M16 20V12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M20 20V8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
        };
    }

    render() {
        this.wrapper = document.createElement('div');
        this.wrapper.className = 'i2-editorjs-custom-block';
        this.statsInput = this.makeField('textarea', 'i2-editorjs-textarea',
            (this.data.stats ?? []).map((s) => `${s.number ?? ''} | ${s.suffix ?? ''} | ${s.label ?? ''}`).join('\n'),
            { rows: '5', placeholder: '280 | % | Growth in online donation volume\n3400 | + | Newsletter subscribers in first 6 months\n71 | % | Program applications now submitted online' }
        );
        this.wrapper.append(this.makeFieldGroup('Stats (number | suffix | label  —  suffix is %, +, etc.)', this.statsInput));
        return this.wrapper;
    }

    save() {
        return {
            stats: this.statsInput.value.split('\n').map((line) => {
                const [number, suffix, ...labelParts] = line.split('|');
                return { number: (number ?? '').trim(), suffix: (suffix ?? '').trim(), label: labelParts.join('|').trim() };
            }).filter((s) => s.number),
        };
    }
}

class LessonsListTool extends BaseFormTool {
    static get toolbox() {
        return {
            title: 'Lessons List',
            icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 2a5 5 0 1 1 0 10A5 5 0 0 1 12 2Z" stroke="currentColor" stroke-width="1.8"/><path d="M4 21v-1a8 8 0 0 1 16 0v1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>',
        };
    }

    render() {
        this.wrapper = document.createElement('div');
        this.wrapper.className = 'i2-editorjs-custom-block';
        this.itemsInput = this.makeField('textarea', 'i2-editorjs-textarea',
            (this.data.items ?? []).map((i) => `${i.icon ?? ''} | ${i.body ?? ''}`).join('\n'),
            { rows: '7', placeholder: 'light-bulb | **Key finding title.** Supporting explanation of what was learned.\ntarget | **Second lesson heading.** More context and detail here.' }
        );
        this.wrapper.append(this.makeFieldGroup('Lessons (icon-name | body  —  wrap opening sentence in **double asterisks** for bold)', this.itemsInput));
        return this.wrapper;
    }

    save() {
        return {
            items: this.itemsInput.value.split('\n').map((line) => {
                const [icon, ...bodyParts] = line.split('|');
                return { icon: (icon ?? '').trim(), body: bodyParts.join('|').trim() };
            }).filter((i) => i.body),
        };
    }
}

window.i2EditorJsField = function i2EditorJsField(config) {
    return {
        editor: null,
        booted: false,
        holderId: config.holderId,
        isDisabled: config.isDisabled,
        isSyncingFromEditor: false,
        lastSerializedState: JSON.stringify(config.state ?? null),
        placeholder: config.placeholder,
        saveTimeout: null,
        state: config.state,
        submitHandler: null,

        boot() {
            if (this.booted) {
                return;
            }

            this.booted = true;
            this.init();
        },

        async init() {
            if (!this.$refs.holder) {
                return;
            }

            if (this.$refs.holder.dataset.editorjsInitialized === 'true') {
                return;
            }

            this.$refs.holder.dataset.editorjsInitialized = 'true';

            const existingInstance = window.i2EditorJsInstances.get(this.holderId);

            if (existingInstance?.destroy) {
                await existingInstance.destroy();
                window.i2EditorJsInstances.delete(this.holderId);
            }

            if (this.$refs.holder) {
                this.$refs.holder.innerHTML = '';
            }

            if (this.editor?.destroy) {
                await this.editor.destroy();
                this.editor = null;
            }

            const initialData = this.resolveInitialData();
            this.lastSerializedState = JSON.stringify(this.state ?? initialData ?? null);

            this.editor = new EditorJS({
                holder: this.$refs.holder,
                readOnly: this.isDisabled,
                autofocus: !this.isDisabled,
                minHeight: 320,
                placeholder: this.placeholder,
                data: initialData?.blocks?.length ? initialData : undefined,
                tools: {
                    header: {
                        class: Header,
                        shortcut: 'CMD+SHIFT+H',
                        config: {
                            levels: [2, 3, 4],
                            defaultLevel: 2,
                            placeholder: 'Section heading',
                        },
                    },
                    list: {
                        class: List,
                        inlineToolbar: true,
                    },
                    checklist: {
                        class: Checklist,
                        inlineToolbar: true,
                    },
                    quote: {
                        class: Quote,
                        inlineToolbar: true,
                        config: {
                            quotePlaceholder: 'Pull quote or highlighted thought',
                            captionPlaceholder: 'Optional citation',
                        },
                    },
                    table: {
                        class: Table,
                        inlineToolbar: true,
                    },
                    code: CodeTool,
                    embed: {
                        class: Embed,
                        config: {
                            services: {
                                youtube: true,
                                coub: true,
                                codepen: true,
                                vimeo: true,
                                instagram: true,
                                twitter: true,
                            },
                        },
                    },
                    delimiter: Delimiter,
                    marker: {
                        class: Marker,
                        shortcut: 'CMD+SHIFT+M',
                    },
                    underline: {
                        class: Underline,
                        shortcut: 'CMD+U',
                    },
                    inlineCode: {
                        class: InlineCode,
                        shortcut: 'CMD+SHIFT+C',
                    },
                    imageBlock: ImageBlockTool,
                    galleryBlock: GalleryBlockTool,
                    alertBlock: AlertBlockTool,
                    buttonBlock: ButtonBlockTool,
                    faqBlock: FAQBlockTool,
                    ctaBlock: CTABlockTool,
                    pricingBlock: PricingBlockTool,
                    serviceCardsBlock: ServiceCardsTool,
                    statCalloutBlock: StatCalloutTool,
                    compareBlock: CompareTool,
                    proConListBlock: ProConListTool,
                    challengeGridBlock: ChallengeGridTool,
                    processStepsBlock: ProcessStepsTool,
                    techStackBlock: TechStackTool,
                    featureGridBlock: FeatureGridTool,
                    screensGridBlock: ScreensGridTool,
                    impactStatsBlock: ImpactStatsTool,
                    lessonsListBlock: LessonsListTool,
                },
                onChange: async () => {
                    if (this.isDisabled) {
                        return;
                    }

                    window.clearTimeout(this.saveTimeout);

                    this.saveTimeout = window.setTimeout(async () => {
                        await this.syncEditorState();
                    }, 50);
                },
            });

            await this.editor.isReady;

            window.i2EditorJsInstances.set(this.holderId, this.editor);

            this.$watch('state', async (value) => {
                if (this.isSyncingFromEditor) {
                    return;
                }

                const serialized = JSON.stringify(value ?? null);

                if (serialized === this.lastSerializedState || !this.editor) {
                    return;
                }

                this.lastSerializedState = serialized;
                await this.editor.isReady;

                if (!value?.blocks?.length) {
                    return;
                }

                await this.editor.render(value);
            });

            const form = this.$el.closest('form');

            if (form) {
                this.submitHandler = async () => {
                    await this.syncEditorState();
                };

                form.addEventListener('submit', this.submitHandler, true);
            }

            this.$el.addEventListener('alpine:destroy', async () => {
                window.clearTimeout(this.saveTimeout);

                const form = this.$el.closest('form');

                if (form && this.submitHandler) {
                    form.removeEventListener('submit', this.submitHandler, true);
                }

                const currentInstance = window.i2EditorJsInstances.get(this.holderId);

                if (currentInstance?.destroy) {
                    await currentInstance.destroy();
                    window.i2EditorJsInstances.delete(this.holderId);
                } else if (this.editor?.destroy) {
                    await this.editor.destroy();
                    this.editor = null;
                }

                if (this.$refs.holder) {
                    delete this.$refs.holder.dataset.editorjsInitialized;
                    this.$refs.holder.innerHTML = '';
                }
            }, { once: true });
        },

        async syncEditorState() {
            if (!this.editor || this.isDisabled) {
                return;
            }

            const output = await this.editor.save();

            this.isSyncingFromEditor = true;
            this.state = output;
            this.lastSerializedState = JSON.stringify(output ?? null);

            queueMicrotask(() => {
                this.isSyncingFromEditor = false;
            });
        },

        resolveInitialData() {
            if (this.state && Array.isArray(this.state.blocks) && this.state.blocks.length) {
                return this.state;
            }

            return null;
        },

        emptyDocument() {
            return {
                blocks: [],
            };
        },
    };
};
