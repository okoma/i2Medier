const TEMPLATE_MESSAGES = {
    general: "Hi! I'd like to enquire about your services.",
    quote: "Hello! I'm interested in getting a quote. Can you help me?",
    appointment: "Hi, I'd like to book an appointment. When are you available?",
    support: 'Hello! I need support with an issue. Are you available?',
    website: "Hi! I saw your website and I'm interested in learning more about what you offer.",
    order: "Hello! I'd like to place an order. Can you assist me?",
    none: '',
};

const STORAGE_KEY = 'i2m_wa_links';

let currentLink = '';
let qrSize = 200;
let embedStyle = 'float';
let savedLinks = [];

document.addEventListener('DOMContentLoaded', () => {
    savedLinks = loadSavedLinks();

    bindInputs();
    bindTemplates();
    bindToggles();
    bindTabs();
    bindVariants();
    bindQrSizes();
    bindEmbedStyles();
    bindActions();

    updateCharCount();
    generateLink();
    renderSavedList();
});

function bindInputs() {
    [
        'country-code',
        'phone-number',
        'agent-name',
        'utm-source',
        'utm-medium',
        'utm-campaign',
    ].forEach((id) => {
        document.getElementById(id)?.addEventListener('input', generateLink);
        document.getElementById(id)?.addEventListener('change', generateLink);
    });

    document.getElementById('wa-message')?.addEventListener('input', () => {
        updateCharCount();
        generateLink();
    });

    document.getElementById('display-label')?.addEventListener('input', renderSavedList);
}

function bindTemplates() {
    document.querySelectorAll('.tpl-pill').forEach((pill) => {
        pill.addEventListener('click', () => {
            document.querySelectorAll('.tpl-pill').forEach((item) => item.classList.remove('active'));
            pill.classList.add('active');
            const message = TEMPLATE_MESSAGES[pill.dataset.template] ?? '';
            document.getElementById('wa-message').value = message;
            updateCharCount();
            generateLink();
        });
    });
}

function bindToggles() {
    const toggleApp = document.getElementById('toggle-app');
    const toggleUtm = document.getElementById('toggle-utm');

    toggleApp?.addEventListener('click', () => {
        toggleApp.classList.toggle('on');
        toggleApp.setAttribute('aria-pressed', String(toggleApp.classList.contains('on')));
        generateLink();
    });

    toggleUtm?.addEventListener('click', () => {
        toggleUtm.classList.toggle('on');
        const isOn = toggleUtm.classList.contains('on');
        toggleUtm.setAttribute('aria-pressed', String(isOn));
        document.getElementById('utm-fields').hidden = !isOn;
        generateLink();
    });
}

function bindTabs() {
    document.querySelectorAll('.op-tab').forEach((tab) => {
        tab.addEventListener('click', () => {
            document.querySelectorAll('.op-tab').forEach((item) => item.classList.remove('active'));
            document.querySelectorAll('.op-pane').forEach((pane) => pane.classList.remove('active'));
            tab.classList.add('active');
            document.getElementById(`pane-${tab.dataset.tab}`)?.classList.add('active');
        });
    });
}

function bindVariants() {
    document.querySelectorAll('.vr-btn[data-variant]').forEach((button) => {
        button.addEventListener('click', () => copyVariant(button.dataset.variant, button));
    });
}

function bindQrSizes() {
    document.querySelectorAll('.qr-size-btn').forEach((button) => {
        button.addEventListener('click', () => {
            qrSize = Number(button.dataset.size || '200');
            document.querySelectorAll('.qr-size-btn').forEach((item) => item.classList.remove('active'));
            button.classList.add('active');
            if (currentLink) {
                updateQr(currentLink);
            }
        });
    });
}

function bindEmbedStyles() {
    document.querySelectorAll('.embed-style-card').forEach((button) => {
        button.addEventListener('click', () => {
            embedStyle = button.dataset.style || 'float';
            document.querySelectorAll('.embed-style-card').forEach((item) => item.classList.remove('selected'));
            button.classList.add('selected');
            updateEmbedCode();
        });
    });
}

function bindActions() {
    document.getElementById('wa-reset-btn')?.addEventListener('click', resetAll);
    document.getElementById('wa-open-nav-btn')?.addEventListener('click', openWhatsApp);
    document.getElementById('open-wa-btn')?.addEventListener('click', openWhatsApp);
    document.getElementById('preview-float-btn')?.addEventListener('click', openWhatsApp);
    document.getElementById('copy-link-btn')?.addEventListener('click', copyPrimaryLink);
    document.getElementById('save-link-btn')?.addEventListener('click', saveCurrentLink);
    document.getElementById('save-current-btn')?.addEventListener('click', saveCurrentLink);
    document.getElementById('download-qr-btn')?.addEventListener('click', downloadQr);
    document.getElementById('copy-qr-url-btn')?.addEventListener('click', copyQrUrl);
    document.getElementById('copy-embed-btn')?.addEventListener('click', copyEmbed);
    document.getElementById('shorten-btn')?.addEventListener('click', openBitly);
}

function generateLink() {
    const countryCode = getValue('country-code');
    const phoneRaw = getValue('phone-number').trim();
    const message = getValue('wa-message').trim();
    const agentName = getValue('agent-name').trim();
    const useApp = document.getElementById('toggle-app')?.classList.contains('on');

    const phone = normalizePhone(countryCode, phoneRaw);

    if (!phoneRaw) {
        currentLink = '';
        setText('link-url-plain', 'Enter your phone number to generate your link');
        setText('ld-phone', '234XXXXXXXXXX');
        setText('ld-param', '');
        setText('var-wame', 'wa.me/234XXXXXXXXXX');
        setText('var-api', 'api.whatsapp.com/send?phone=234XXXXXXXXXX');
        setText('prev-name', 'Business Name');
        setText('prev-msg', TEMPLATE_MESSAGES.general);
        setText('prev-time', 'Just now');
        updateQr('');
        updateEmbedCode();
        return;
    }

    const baseLink = useApp ? `https://wa.me/${phone}` : `https://api.whatsapp.com/send?phone=${phone}`;
    const messageParam = message ? `${useApp ? '?' : '&'}text=${encodeURIComponent(message)}` : '';
    let finalLink = `${baseLink}${messageParam}`;

    if (document.getElementById('toggle-utm')?.classList.contains('on')) {
        const params = new URLSearchParams();
        ['source', 'medium', 'campaign'].forEach((key) => {
            const value = getValue(`utm-${key}`).trim();
            if (value) {
                params.set(`utm_${key}`, value);
            }
        });
        const query = params.toString();
        if (query) {
            finalLink += `${finalLink.includes('?') ? '&' : '?'}${query}`;
        }
    }

    currentLink = finalLink;

    setText('link-url-plain', finalLink);
    setText('ld-phone', phone);
    setText('ld-param', message ? `${useApp ? '?' : '&'}text=...` : '');
    setText('var-wame', truncate(`https://wa.me/${phone}${message ? `?text=${encodeURIComponent(message)}` : ''}`, 55));
    setText('var-api', truncate(`https://api.whatsapp.com/send?phone=${phone}${message ? `&text=${encodeURIComponent(message)}` : ''}`, 55));
    setText('prev-name', agentName || 'Business WhatsApp');
    setText('prev-msg', message || '(no pre-filled message)');
    setText('prev-time', new Date().toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit' }));

    updateQr(finalLink);
    updateEmbedCode();
}

function updateQr(url) {
    const image = document.getElementById('qr-img');
    const placeholder = document.getElementById('qr-placeholder');

    if (!image || !placeholder) {
        return;
    }

    if (!url) {
        image.hidden = true;
        image.style.display = 'none';
        placeholder.hidden = false;
        placeholder.style.display = 'flex';
        image.removeAttribute('src');
        return;
    }

    const qrUrl = `https://api.qrserver.com/v1/create-qr-code/?size=${qrSize}x${qrSize}&format=png&margin=10&data=${encodeURIComponent(url)}`;
    image.src = qrUrl;
    image.hidden = false;
    image.style.display = 'block';
    image.style.width = `${Math.min(qrSize, 220)}px`;
    image.style.height = `${Math.min(qrSize, 220)}px`;
    placeholder.hidden = true;
    placeholder.style.display = 'none';
}

function updateEmbedCode() {
    const block = document.getElementById('embed-code-block');

    if (!block) {
        return;
    }

    const link = currentLink || 'https://wa.me/234XXXXXXXXXX';
    const iconPath1 = 'M20 11.6A8.4 8.4 0 0 1 7.6 19L4 20l1.1-3.5A8.4 8.4 0 1 1 20 11.6z';
    const iconPath2 = 'M9.5 8.8c.3-.7.6-.7.9-.7h.7c.2 0 .5.1.6.5l.7 1.7c.1.2 0 .5-.1.7l-.5.6c.6 1 1.5 1.8 2.6 2.4l.6-.5c.2-.1.4-.2.7-.1l1.6.7c.3.1.5.3.5.6v.7c0 .3 0 .6-.7.9-.6.3-1.3.3-2 0-2.8-1.1-5.1-3.3-6.2-6.1-.3-.7-.3-1.4 0-2z';

    let code = '';

    if (embedStyle === 'float') {
        code = `<!-- WhatsApp Floating Button by i2Medier -->
<style>
  .wa-float-btn {
    position: fixed;
    bottom: 24px;
    right: 24px;
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: #25d366;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 20px rgba(37,211,102,.4);
    z-index: 999;
    text-decoration: none;
    transition: transform .2s;
  }
  .wa-float-btn:hover { transform: scale(1.08); }
  .wa-float-btn svg { width: 28px; height: 28px; }
</style>
<a href="${escapeHtml(link)}" target="_blank" class="wa-float-btn" rel="noopener">
  <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
    <path d="${iconPath1}"></path>
    <path d="${iconPath2}"></path>
  </svg>
</a>`;
    } else if (embedStyle === 'inline') {
        code = `<!-- WhatsApp Button by i2Medier -->
<a href="${escapeHtml(link)}" target="_blank" rel="noopener"
   style="display:inline-flex;align-items:center;gap:8px;background:#25d366;
          color:white;padding:12px 20px;border-radius:6px;text-decoration:none;
          font-family:sans-serif;font-size:14px;font-weight:700;
          box-shadow:0 2px 8px rgba(37,211,102,.35);transition:opacity .2s"
   onmouseover="this.style.opacity='.88'" onmouseout="this.style.opacity='1'">
  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
    <path d="${iconPath1}"></path>
    <path d="${iconPath2}"></path>
  </svg>
  Chat on WhatsApp
</a>`;
    } else {
        code = `<!-- WhatsApp Banner Widget by i2Medier -->
<div style="display:inline-flex;align-items:center;gap:12px;background:#111;
            border:1px solid rgba(37,211,102,.2);border-radius:10px;
            padding:12px 16px;font-family:sans-serif;max-width:300px">
  <div style="width:40px;height:40px;border-radius:50%;background:#25d366;
              display:flex;align-items:center;justify-content:center;
              flex-shrink:0;color:white">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
      <path d="${iconPath1}"></path>
      <path d="${iconPath2}"></path>
    </svg>
  </div>
  <div style="flex:1">
    <div style="font-size:12px;font-weight:700;color:white;margin-bottom:2px">
      Chat with us on WhatsApp
    </div>
    <div style="font-size:11px;color:rgba(255,255,255,.4)">
      Typically replies within minutes
    </div>
  </div>
  <a href="${escapeHtml(link)}" target="_blank" rel="noopener"
     style="background:#25d366;color:white;padding:7px 14px;border-radius:5px;
            text-decoration:none;font-size:12px;font-weight:700;white-space:nowrap">
    Chat Now
  </a>
</div>`;
    }

    block.textContent = code;
}

function copyPrimaryLink() {
    if (!currentLink) {
        toast('Generate a link first.');
        return;
    }

    navigator.clipboard.writeText(currentLink).then(() => {
        const label = document.querySelector('#copy-link-btn span:last-child');
        document.getElementById('copy-link-btn')?.classList.add('copied');
        if (label) {
            label.textContent = 'Copied!';
        }
        window.setTimeout(() => {
            document.getElementById('copy-link-btn')?.classList.remove('copied');
            if (label) {
                label.textContent = 'Copy Link';
            }
        }, 2200);
        toast('Link copied to clipboard');
    });
}

function copyVariant(variant, button) {
    const phoneRaw = getValue('phone-number').trim();

    if (!phoneRaw) {
        toast('Enter a phone number first.');
        return;
    }

    const phone = normalizePhone(getValue('country-code'), phoneRaw);
    const message = getValue('wa-message').trim();

    const url = variant === 'api'
        ? `https://api.whatsapp.com/send?phone=${phone}${message ? `&text=${encodeURIComponent(message)}` : ''}`
        : `https://wa.me/${phone}${message ? `?text=${encodeURIComponent(message)}` : ''}`;

    navigator.clipboard.writeText(url).then(() => {
        const original = button.textContent;
        button.textContent = 'Copied';
        window.setTimeout(() => {
            button.textContent = original;
        }, 2000);
        toast('Variant copied');
    });
}

function downloadQr() {
    if (!currentLink) {
        toast('Generate a link first.');
        return;
    }

    const url = `https://api.qrserver.com/v1/create-qr-code/?size=500x500&format=png&margin=10&data=${encodeURIComponent(currentLink)}`;
    const link = document.createElement('a');
    link.href = url;
    link.download = 'whatsapp-qr-i2medier.png';
    link.target = '_blank';
    link.click();
    toast('QR code opening for download');
}

function copyQrUrl() {
    if (!currentLink) {
        toast('Generate a link first.');
        return;
    }

    const url = `https://api.qrserver.com/v1/create-qr-code/?size=300x300&format=png&margin=10&data=${encodeURIComponent(currentLink)}`;
    navigator.clipboard.writeText(url).then(() => {
        toast('QR image URL copied');
    });
}

function copyEmbed() {
    const code = document.getElementById('embed-code-block')?.textContent ?? '';

    if (!code || code === '<!-- Select a style above -->') {
        toast('Generate a link first.');
        return;
    }

    navigator.clipboard.writeText(code).then(() => {
        const label = document.querySelector('#copy-embed-btn span:last-child');
        document.getElementById('copy-embed-btn')?.classList.add('copied');
        if (label) {
            label.textContent = 'Copied!';
        }
        window.setTimeout(() => {
            document.getElementById('copy-embed-btn')?.classList.remove('copied');
            if (label) {
                label.textContent = 'Copy HTML';
            }
        }, 2200);
        toast('Embed code copied to clipboard');
    });
}

function openBitly() {
    if (!currentLink) {
        toast('Generate a link first.');
        return;
    }

    window.open(
        `https://bitly.com/pages/landing/branded-short-domains-powered-by-bitly?full_url=${encodeURIComponent(currentLink)}`,
        '_blank',
    );
}

function saveCurrentLink() {
    if (!currentLink) {
        toast('Generate a link first.');
        return;
    }

    const phone = getValue('phone-number').trim();
    const country = getValue('country-code').trim();
    const label = getValue('display-label').trim() || 'WhatsApp Link';
    const message = getValue('wa-message').trim().slice(0, 60);
    const id = Date.now();

    savedLinks.unshift({
        id,
        label,
        phone: `+${country} ${phone}`,
        message,
        link: currentLink,
    });

    if (savedLinks.length > 20) {
        savedLinks = savedLinks.slice(0, 20);
    }

    persistSavedLinks();
    renderSavedList();
    toast(`"${label}" saved`);
}

function renderSavedList() {
    const list = document.getElementById('saved-list');

    if (!list) {
        return;
    }

    if (!savedLinks.length) {
        list.innerHTML = '<div class="saved-empty">No saved links yet</div>';
        return;
    }

    list.innerHTML = savedLinks.map((item) => `
        <div class="saved-item" data-saved-id="${item.id}">
            <div class="si-wa">${escapeHtml(item.label.charAt(0).toUpperCase())}</div>
            <div class="si-info">
                <div class="si-name">${escapeHtml(item.label)}</div>
                <div class="si-num">${escapeHtml(item.phone)}</div>
            </div>
            <button class="si-del" type="button" data-delete-id="${item.id}" aria-label="Delete saved link">
                <svg viewBox="0 0 24 24"><path d="M3 6h18"/><path d="M8 6V4h8v2"/><path d="m19 6-1 14H6L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/></svg>
            </button>
        </div>
    `).join('');

    list.querySelectorAll('[data-saved-id]').forEach((item) => {
        item.addEventListener('click', (event) => {
            if (event.target.closest('[data-delete-id]')) {
                return;
            }
            loadSavedLink(Number(item.dataset.savedId));
        });
    });

    list.querySelectorAll('[data-delete-id]').forEach((button) => {
        button.addEventListener('click', (event) => {
            event.stopPropagation();
            deleteSavedLink(Number(button.dataset.deleteId));
        });
    });
}

function loadSavedLink(id) {
    const item = savedLinks.find((entry) => entry.id === id);

    if (!item) {
        return;
    }

    const match = item.phone.match(/^\+(\d+)\s(.+)$/);

    if (match) {
        const countrySelect = document.getElementById('country-code');
        if (countrySelect) {
            countrySelect.value = match[1];
        }
        document.getElementById('phone-number').value = match[2];
    }

    document.getElementById('wa-message').value = item.message;
    document.getElementById('display-label').value = item.label;
    updateCharCount();
    generateLink();
    toast('Link loaded');
}

function deleteSavedLink(id) {
    savedLinks = savedLinks.filter((entry) => entry.id !== id);
    persistSavedLinks();
    renderSavedList();
    toast('Saved link removed');
}

function openWhatsApp() {
    if (!currentLink) {
        toast('Enter a phone number first.');
        return;
    }

    window.open(currentLink, '_blank');
}

function resetAll() {
    document.getElementById('phone-number').value = '';
    document.getElementById('wa-message').value = TEMPLATE_MESSAGES.general;
    document.getElementById('display-label').value = '';
    document.getElementById('agent-name').value = '';
    document.getElementById('utm-source').value = '';
    document.getElementById('utm-medium').value = '';
    document.getElementById('utm-campaign').value = '';
    document.getElementById('country-code').value = '234';
    document.querySelectorAll('.tpl-pill').forEach((pill) => pill.classList.remove('active'));
    document.querySelector('.tpl-pill[data-template="general"]')?.classList.add('active');
    document.getElementById('toggle-app')?.classList.add('on');
    document.getElementById('toggle-app')?.setAttribute('aria-pressed', 'true');
    document.getElementById('toggle-utm')?.classList.remove('on');
    document.getElementById('toggle-utm')?.setAttribute('aria-pressed', 'false');
    document.getElementById('utm-fields').hidden = true;
    updateCharCount();
    generateLink();
    toast('Reset complete');
}

function updateCharCount() {
    const text = getValue('wa-message');
    const count = text.length;
    const counter = document.getElementById('char-count');

    if (!counter) {
        return;
    }

    counter.textContent = `${count.toLocaleString()} / 4,096 characters`;
    counter.classList.toggle('warn', count > 3500);
}

function toast(message, duration = 3000) {
    const element = document.getElementById('toast');

    if (!element) {
        return;
    }

    element.textContent = message;
    element.classList.add('show');
    window.clearTimeout(element._toastTimer);
    element._toastTimer = window.setTimeout(() => {
        element.classList.remove('show');
    }, duration);
}

function loadSavedLinks() {
    try {
        return JSON.parse(window.localStorage.getItem(STORAGE_KEY) || '[]');
    } catch {
        return [];
    }
}

function persistSavedLinks() {
    window.localStorage.setItem(STORAGE_KEY, JSON.stringify(savedLinks));
}

function normalizePhone(countryCode, phoneRaw) {
    const local = phoneRaw.replace(/[\s\-()+]/g, '').replace(/^0+/, '');
    return `${countryCode}${local}`;
}

function truncate(text, limit) {
    return text.length > limit ? `${text.slice(0, limit)}...` : text;
}

function getValue(id) {
    return document.getElementById(id)?.value ?? '';
}

function setText(id, value) {
    const element = document.getElementById(id);
    if (element) {
        element.textContent = value;
    }
}

function escapeHtml(value) {
    return String(value || '')
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;');
}
