import FALLBACK_SERVICES from './onboarding-services';
import '../footer';
import '../header';


    const SERVICES = resolveServices();
    const PRESET = resolvePreset();

    let currentStep = 1;
    const totalSteps = 5;
    const selectedServices = new Set();
    const selectedAddons = {};
    const addonQuantities = {};
    const selectedPlatforms = {};
    let termsAccepted = false;
    let timeline = '';
    let source = '';
    let domainPreference = '';
    let hostingPreference = '';
    let selectedPages = new Set();

    const fallbackUrl = document.body.dataset.onboardingFallbackUrl || '/';
    const submitUrl = document.body.dataset.onboardingSubmitUrl || window.location.pathname;
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    const honeypotField = document.querySelector('input[name="company_website"]');
    const honeypotTimeField = document.querySelector('input[name="form_started_at"]');

    const ICONS = {
        wordpress: `<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M8.5 8.5c1 4.5 3 7.5 3.5 7.5s2.5-3 3.5-7.5"></path><path d="M7.5 10h9"></path></svg>`,
        globe: `<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M3 12h18"></path><path d="M12 3a14 14 0 0 1 0 18"></path><path d="M12 3a14 14 0 0 0 0 18"></path></svg>`,
        mobile: `<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="7" y="3" width="10" height="18" rx="2"></rect><path d="M11 17h2"></path></svg>`,
        palette: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3a9 9 0 1 0 0 18h1a2 2 0 0 0 0-4h-1a2 2 0 0 1 0-4h4a4 4 0 0 0 0-8Z"></path><circle cx="7.5" cy="10.5" r="1"></circle><circle cx="9.5" cy="7.5" r="1"></circle><circle cx="13.5" cy="7.5" r="1"></circle></svg>`,
        layers: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 4 7 4-7 4-7-4 7-4Z"></path><path d="m5 12 7 4 7-4"></path><path d="m5 16 7 4 7-4"></path></svg>`,
        shield: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 5 6v6c0 5 3.4 7.9 7 9 3.6-1.1 7-4 7-9V6l-7-3Z"></path><path d="m9.5 12 1.8 1.8 3.7-3.8"></path></svg>`,
        mail: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16v10H4z"></path><path d="m4 8 8 6 8-6"></path></svg>`,
        search: `<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="6"></circle><path d="m20 20-4.2-4.2"></path></svg>`,
        cloud: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 18a4 4 0 1 1 .8-7.9A5.5 5.5 0 0 1 18 12a3 3 0 0 1-.5 6H7Z"></path></svg>`,
        saas: `<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 10h18"></path><path d="M8 15h3M13 15h3"></path><circle cx="7" cy="7.5" r=".8" fill="currentColor" stroke="none"></circle><circle cx="10" cy="7.5" r=".8" fill="currentColor" stroke="none"></circle></svg>`,
        rocket: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3c3 1.2 5.3 3.5 6.5 6.5L13 15l-4 1 1-4-5.5-5.5C5.7 3.5 8 1.2 11 0z"></path><path d="M13 15l2 2"></path><path d="M8 16l-2 5 5-2"></path></svg>`,
        'calendar-short': `<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"></rect><path d="M8 3v4M16 3v4M3 10h18"></path></svg>`,
        'calendar-long': `<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"></rect><path d="M8 3v4M16 3v4M3 10h18"></path><path d="M8 14h3M13 14h3M8 17h8"></path></svg>`,
        wave: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M2 14c2.5 0 2.5-4 5-4s2.5 4 5 4 2.5-4 5-4 2.5 4 5 4"></path><path d="M2 18c2.5 0 2.5-4 5-4s2.5 4 5 4 2.5-4 5-4 2.5 4 5 4"></path></svg>`,
        'check-circle': `<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="m8.5 12 2.3 2.3 4.7-4.8"></path></svg>`,
        cart: `<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="20" r="1.5"></circle><circle cx="17" cy="20" r="1.5"></circle><path d="M3 4h2l2.2 10.2a1 1 0 0 0 1 .8H18a1 1 0 0 0 1-.8L21 7H7"></path></svg>`,
        chat: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 18h9l5 3V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2Z"></path><path d="M8 10h8M8 14h5"></path></svg>`,
        lock: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 10V7a4 4 0 1 1 8 0v3"></path><rect x="5" y="10" width="14" height="11" rx="2"></rect><path d="M12 14v3"></path></svg>`,
        spark: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3v6M12 15v6M3 12h6M15 12h6"></path><path d="m6 6 2 2M16 16l2 2M18 6l-2 2M8 16l-2 2"></path></svg>`,
        repeat: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M17 2l4 4-4 4"></path><path d="M3 11V9a3 3 0 0 1 3-3h15"></path><path d="M7 22l-4-4 4-4"></path><path d="M21 13v2a3 3 0 0 1-3 3H3"></path></svg>`
    };

    const OPTIONAL_PAGES = [
        {id:'portfolio',    label:'Portfolio',      icon:'image'},
        {id:'team',         label:'Our Team',       icon:'users'},
        {id:'testimonials', label:'Testimonials',   icon:'star'},
        {id:'faq',          label:'FAQ',            icon:'help'},
        {id:'pricing',      label:'Pricing Page',   icon:'cash'},
        {id:'gallery',      label:'Gallery',        icon:'camera'},
        {id:'events',       label:'Events',         icon:'calendar'},
        {id:'careers',      label:'Careers',        icon:'briefcase'},
        {id:'privacy',      label:'Privacy Policy', icon:'lock'},
        {id:'login',        label:'Login / Portal', icon:'key'},
    ];

    function iconSvg(name) {
        return ICONS[name] || ICONS.spark;
    }

    function resolveServices() {
        const raw = document.body?.dataset?.onboardingCatalog;

        if (!raw) {
            return FALLBACK_SERVICES;
        }

        try {
            const parsed = JSON.parse(raw);

            if (Array.isArray(parsed) && parsed.length > 0) {
                return parsed;
            }
        } catch (error) {
            console.warn('Failed to parse onboarding catalog payload, falling back to bundled data.', error);
        }

        return FALLBACK_SERVICES;
    }

    function resolvePreset() {
        const raw = document.body?.dataset?.onboardingPreset;

        if (!raw) {
            return { services: [], platform: '', addons: [], source_page: '', source_label: '', locked: false };
        }

        try {
            const parsed = JSON.parse(raw);

            return {
                services: Array.isArray(parsed?.services) ? parsed.services : [],
                platform: typeof parsed?.platform === 'string' ? parsed.platform : '',
                addons: Array.isArray(parsed?.addons) ? parsed.addons : [],
                source_page: typeof parsed?.source_page === 'string' ? parsed.source_page : '',
                source_label: typeof parsed?.source_label === 'string' ? parsed.source_label : '',
            locked:       parsed?.locked === true,
            };
        } catch (error) {
            console.warn('Failed to parse onboarding preset payload.', error);
            return { services: [], platform: '', addons: [], source_page: '', source_label: '', locked: false };
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        applyPresetSelections();
        renderServiceGrid();
        updateQuoteSidebar();

        ['f-name','f-business','f-email','f-phone','f-country'].forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.addEventListener('blur', () => {
                    el.classList.remove('error');
                    const errId = 'err-' + id.replace('f-', '');
                    const err = document.getElementById(errId);
                    if (err) err.classList.remove('visible');
                });
            }
        });

        if (window.innerWidth <= 900) {
            document.getElementById('quote-sidebar')?.classList.add('collapsed');
        }

        renderPresetHint();
    });

    function applyPresetSelections() {
        PRESET.services.forEach(serviceId => {
            const service = getServiceConfig(serviceId);

            if (!service) {
                return;
            }

            selectedServices.add(serviceId);
            selectedAddons[serviceId] = new Set();
            addonQuantities[serviceId] = {};

            if (serviceId === 'ecommerce') {
                selectedPlatforms[serviceId] = PRESET.platform || '';
            }
        });

        PRESET.addons.forEach(addonId => {
            for (const serviceId of selectedServices) {
                const addon = getAddon(serviceId, addonId);

                if (!addon) {
                    continue;
                }

                if (!selectedAddons[serviceId]) selectedAddons[serviceId] = new Set();
                selectedAddons[serviceId].add(addonId);

                if (addon.quantity) {
                    addonQuantities[serviceId][addonId] = Math.max(1, getAddonQuantity(serviceId, addonId) || 1);
                }

                break;
            }
        });
    }

    function renderPresetHint() {
        if (!PRESET.services.length) {
            return;
        }

        const notice = document.getElementById('svc-preset-notice');

        if (!notice) {
            return;
        }

        const selectedNames = PRESET.services
            .map(serviceId => getServiceDisplayName(serviceId))
            .filter(Boolean);

        const namesHtml = selectedNames.map(n => `<strong>${esc(n)}</strong>`).join(', ');

        if (PRESET.locked) {
            const sourceHtml = PRESET.source_label ? ` from our <strong>${esc(PRESET.source_label)}</strong> page` : '';
            notice.innerHTML = `You're getting ${namesHtml}${sourceHtml}. `
                + `Customise your add-ons below — the service itself is fixed for this package.`;
            notice.classList.add('visible', 'locked');
        } else {
            const sourceHtml = PRESET.source_label ? ` based on your interest in our <strong>${esc(PRESET.source_label)}</strong>` : '';
            notice.innerHTML = `We've pre-selected ${namesHtml}${sourceHtml}. `
                + `These are highlighted below — tick or untick any service to adjust your quote before continuing.`;
            notice.classList.add('visible');
        }
    }

    function renderServiceGrid() {
        const grid = document.getElementById('service-grid');
        if (!grid) return;
        grid.innerHTML = SERVICES.map(s => {
            const isSelected = selectedServices.has(s.id);
            const isLocked   = PRESET.locked && isSelected;
            const isDisabled = PRESET.locked && !isSelected;
            const safeId = esc(s.id);
            let cls = 'svc-card';
            if (isSelected) cls += ' selected';
            if (isLocked)   cls += ' locked';
            if (isDisabled) cls += ' disabled';
            return `
            <div class="${cls}" id="svc-${safeId}" data-id="${safeId}"${isDisabled ? ' aria-disabled="true"' : ''}>
              <div class="svc-card-check" id="chk-${safeId}">${isLocked ? iconSvg('lock') : isSelected ? '✓' : ''}</div>
              <div class="svc-card-ico">${iconSvg(s.icon)}</div>
              <div class="svc-card-name">${esc(s.name)}</div>
              <p class="svc-card-desc">${esc(s.desc)}</p>
              <div class="svc-card-price">${esc(s.priceLabel)}</div>
              <div class="svc-card-type"><span class="type-icon" aria-hidden="true">${iconSvg(s.type === 'monthly' ? 'repeat' : 'spark')}</span>${s.type === 'monthly' ? 'Monthly' : 'One-time'}</div>
            </div>
            `;
        }).join('');
        grid.querySelectorAll('.svc-card').forEach(el =>
            el.addEventListener('click', () => toggleService(el.dataset.id))
        );
    }

    function toggleService(id) {
        if (PRESET.locked) {
            // locked mode: the pre-selected service cannot be changed
            return;
        }

        const card = document.getElementById('svc-' + id);
        const chk = document.getElementById('chk-' + id);

        if (selectedServices.has(id)) {
            selectedServices.delete(id);
            card?.classList.remove('selected');
            if (chk) chk.textContent = '';
            delete selectedAddons[id];
            delete addonQuantities[id];
            delete selectedPlatforms[id];
            if (id === 'webdesign') selectedPages.clear();
        } else {
            selectedServices.add(id);
            card?.classList.add('selected');
            if (chk) chk.textContent = '✓';
            selectedAddons[id] = new Set();
            addonQuantities[id] = {};
            if (id === 'ecommerce') selectedPlatforms[id] = '';
        }

        updateQuoteSidebar();
    }

    function renderAddons() {
        const container = document.getElementById('addons-container');
        if (!container) return;

        if (selectedServices.size === 0) {
            container.innerHTML = `<div class="no-services-msg"><div class="nsm-ico">${iconSvg('spark')}</div><p>You haven't selected any services yet.<br><button onclick="goToStep(2)" style="background:none;border:none;cursor:pointer;color:var(--gold);font-weight:600;font-size:.875rem;font-family:var(--sans)">← Go back and select a service</button></p></div>`;
            return;
        }

        container.innerHTML = [...selectedServices].map(sid => {
            const svc = SERVICES.find(s => s.id === sid);
            if (!svc) return '';
            const platformMarkup = svc.platforms?.length ? `
              <div class="platform-section">
                <div class="platform-heading">
                  <div class="platform-title">Choose your direction</div>
                  <div class="platform-subtitle">Pricing and add-ons below will follow the selected direction.</div>
                </div>
                <div class="platform-grid">
                  ${svc.platforms.map(platform => `
                    <button type="button" class="platform-card ${selectedPlatforms[sid] === platform.id ? 'selected' : ''}" onclick="selectPlatform('${sid}','${platform.id}', event)">
                      <span class="platform-card-name">${platform.name}</span>
                      <span class="platform-card-desc">${platform.desc}</span>
                      <span class="platform-card-price">${platform.priceLabel}</span>
                    </button>
                  `).join('')}
                </div>
                ${selectedPlatforms[sid] ? '' : `<div class="platform-hint visible">Please choose a direction for your ${svc.name}.</div>`}
              </div>
            ` : '';
            const addons = getServiceAddons(sid).filter(addon =>
                !(sid === 'wordpress' && addon.id === 'wp-ecommerce' && selectedServices.has('ecommerce')) &&
                !(sid === 'webdesign' && addon.id === 'wd-extra-pages')
            );

            const pagePickerMarkup = sid === 'webdesign' ? renderWebsitePagePicker() : '';

            return `
              <div class="addons-section">
                <div class="addon-section-head">
                  <div class="ash-ico">${iconSvg(svc.icon)}</div>
                  <div>
                    <div class="ash-name">${svc.name}</div>
                    <div class="ash-base">Base: ${getServicePriceLabel(sid)}</div>
                  </div>
                </div>
                ${platformMarkup}
                ${pagePickerMarkup}
                <div class="addon-grid">
                  ${addons.map(a => `
                    <div class="addon-card ${isAddonSelected(sid, a.id) ? 'selected' : ''}" id="addon-${a.id}" onclick="toggleAddon('${sid}','${a.id}')">
                      <div class="addon-checkbox" id="addonchk-${a.id}">${isAddonSelected(sid, a.id) ? '✓' : ''}</div>
                      <div class="addon-body">
                        <div class="addon-name">${a.name}</div>
                        <div class="addon-desc">${a.desc}</div>
                        <div class="addon-price">${renderAddonPrice(sid, a)}</div>
                        ${a.quantity ? `
                          <div class="addon-quantity-wrap" onclick="event.stopPropagation()">
                            <span class="addon-quantity-label">How many extra pages?</span>
                            <div class="addon-quantity-controls">
                              <button class="addon-qty-btn" type="button" onclick="adjustAddonQuantity('${sid}','${a.id}',-1,event)">−</button>
                              <input class="addon-qty-input" type="number" min="0" step="1" inputmode="numeric" value="${getAddonQuantity(sid, a.id)}" oninput="setAddonQuantity('${sid}','${a.id}', this.value, event)" onclick="event.stopPropagation()">
                              <button class="addon-qty-btn" type="button" onclick="adjustAddonQuantity('${sid}','${a.id}',1,event)">+</button>
                            </div>
                          </div>
                        ` : ''}
                      </div>
                    </div>
                  `).join('')}
                </div>
              </div>
            `;
        }).join('');

        attachPagePickerListeners();
    }

    function toggleAddon(serviceId, addonId) {
        const addon = getAddon(serviceId, addonId);
        if (!addon) return;

        if (addon.quantity) {
            if (selectedAddons[serviceId]?.has(addonId)) {
                selectedAddons[serviceId].delete(addonId);
                if (addonQuantities[serviceId]) delete addonQuantities[serviceId][addonId];
            } else {
                if (!selectedAddons[serviceId]) selectedAddons[serviceId] = new Set();
                if (!addonQuantities[serviceId]) addonQuantities[serviceId] = {};
                selectedAddons[serviceId].add(addonId);
                addonQuantities[serviceId][addonId] = Math.max(1, getAddonQuantity(serviceId, addonId) || 1);
            }

            renderAddons();
            updateQuoteSidebar();
            return;
        }

        if (!selectedAddons[serviceId]) selectedAddons[serviceId] = new Set();

        const card = document.getElementById('addon-' + addonId);
        const chk = document.getElementById('addonchk-' + addonId);

        if (selectedAddons[serviceId].has(addonId)) {
            selectedAddons[serviceId].delete(addonId);
            card?.classList.remove('selected');
            if (chk) chk.textContent = '';
        } else {
            selectedAddons[serviceId].add(addonId);
            card?.classList.add('selected');
            if (chk) chk.textContent = '✓';
        }

        updateQuoteSidebar();
    }

    function isAddonSelected(serviceId, addonId) { return selectedAddons[serviceId]?.has(addonId) ?? false; }
    function getAddon(serviceId, addonId) { return getServiceAddons(serviceId).find(x => x.id === addonId) ?? null; }
    function getAddonQuantity(serviceId, addonId) { return addonQuantities[serviceId]?.[addonId] ?? 0; }
    function getAddonTotal(addon, serviceId) { return addon.quantity ? addon.price * getAddonQuantity(serviceId, addon.id) : addon.price; }
    function getServiceConfig(serviceId) { return SERVICES.find(x => x.id === serviceId) ?? null; }
    function getSelectedPlatform(serviceId) { return selectedPlatforms[serviceId] || ''; }

    function getPlatformConfig(serviceId) {
        const service = getServiceConfig(serviceId);
        if (!service?.platforms) return null;
        return service.platforms.find(platform => platform.id === getSelectedPlatform(serviceId)) ?? null;
    }

    function getServiceAddons(serviceId) {
        const service = getServiceConfig(serviceId);
        if (!service) return [];
        const platform = getPlatformConfig(serviceId);
        if (platform) return platform.addons || [];
        return service.addons || [];
    }

    function getServiceBasePrice(serviceId) {
        const platform = getPlatformConfig(serviceId);
        if (platform) return platform.price;
        return getServiceConfig(serviceId)?.price ?? 0;
    }

    function getServicePriceLabel(serviceId) {
        const platform = getPlatformConfig(serviceId);
        if (platform) return platform.priceLabel;
        return getServiceConfig(serviceId)?.priceLabel ?? '';
    }

    function getServiceDisplayName(serviceId) {
        const service = getServiceConfig(serviceId);
        if (!service) return '';
        const platform = getPlatformConfig(serviceId);
        return platform ? `${service.name} (${platform.name})` : service.name;
    }

    function selectPlatform(serviceId, platformId, event) {
        event.stopPropagation();
        selectedPlatforms[serviceId] = platformId;
        selectedAddons[serviceId] = new Set();
        addonQuantities[serviceId] = {};
        renderAddons();
        updateQuoteSidebar();
    }

    function renderAddonPrice(serviceId, addon) {
        if (addon.quantity) {
            const quantity = getAddonQuantity(serviceId, addon.id);
            const total = quantity > 0 ? fmt(getAddonTotal(addon, serviceId)) : fmt(addon.price);
            const quantityText = quantity > 0 ? ` • ${quantity} ${quantity === 1 ? addon.quantityLabel : addon.quantityLabel + 's'}` : '';
            return `+${fmt(addon.price)} / ${addon.quantityLabel}${quantityText ? `<span class="addon-quantity-summary">${quantityText} = ${total}</span>` : ''}`;
        }
        return `+${fmt(addon.price)}${addon.monthly ? '<span class="addon-monthly-badge">/mo</span>' : ''}`;
    }

    function adjustAddonQuantity(serviceId, addonId, delta, event) {
        event.stopPropagation();
        setAddonQuantity(serviceId, addonId, getAddonQuantity(serviceId, addonId) + delta);
    }

    function setAddonQuantity(serviceId, addonId, value, event = null) {
        if (event) event.stopPropagation();
        const addon = getAddon(serviceId, addonId);
        if (!addon || !addon.quantity) return;
        const parsed = Number.parseInt(value, 10);
        const quantity = Number.isNaN(parsed) ? 0 : Math.max(0, parsed);
        if (!selectedAddons[serviceId]) selectedAddons[serviceId] = new Set();
        if (!addonQuantities[serviceId]) addonQuantities[serviceId] = {};

        if (quantity <= 0) {
            selectedAddons[serviceId].delete(addonId);
            delete addonQuantities[serviceId][addonId];
        } else {
            selectedAddons[serviceId].add(addonId);
            addonQuantities[serviceId][addonId] = quantity;
        }

        renderAddons();
        updateQuoteSidebar();
    }

    function renderWebsitePagePicker() {
        const STANDARD_PAGES = [
            {icon:'home',  label:'Home'},
            {icon:'user',  label:'About Us'},
            {icon:'cog',   label:'Services'},
            {icon:'mail',  label:'Contact'},
        ];
        const count = selectedPages.size;
        const tallyText = count === 0
            ? 'No additional pages selected — only the standard 4 pages are included'
            : `${count} additional page${count > 1 ? 's' : ''} selected · +${fmt(count * 20000)}`;

        const pageChip = (icon, label, checked, pageId) => `
            <div class="page-check${checked ? ' checked' : ''}${pageId ? '' : ' is-standard'}"${pageId ? ` data-page-id="${pageId}"` : ''}>
              <div class="page-check-box">${checked ? '✓' : ''}</div>
              <span class="page-check-label">
                <span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-${icon}"></use></svg></span>
                ${label}
              </span>
            </div>`;

        return `
            <div class="page-picker-heading">Which pages do you need?</div>
            <p class="page-picker-sub">Home, About Us, Services and Contact are always included. Tick any additional pages — each adds ₦20,000 to your quote.</p>
            <div class="pages-grid">
                ${STANDARD_PAGES.map(p => pageChip(p.icon, p.label, true, null)).join('')}
                ${OPTIONAL_PAGES.map(p => pageChip(p.icon, p.label, selectedPages.has(p.id), p.id)).join('')}
            </div>
            <div class="page-picker-tally${count > 0 ? ' has-count' : ''}">${tallyText}</div>
        `;
    }

    function attachPagePickerListeners() {
        document.querySelectorAll('.page-check[data-page-id]').forEach(chip => {
            chip.addEventListener('click', () => togglePage(chip.dataset.pageId));
        });
    }

    function togglePage(pageId) {
        if (selectedPages.has(pageId)) {
            selectedPages.delete(pageId);
        } else {
            selectedPages.add(pageId);
        }
        const count = selectedPages.size;
        if (!selectedAddons['webdesign']) selectedAddons['webdesign'] = new Set();
        if (!addonQuantities['webdesign']) addonQuantities['webdesign'] = {};
        if (count > 0) {
            selectedAddons['webdesign'].add('wd-extra-pages');
            addonQuantities['webdesign']['wd-extra-pages'] = count;
        } else {
            selectedAddons['webdesign'].delete('wd-extra-pages');
            delete addonQuantities['webdesign']['wd-extra-pages'];
        }
        renderAddons();
        updateQuoteSidebar();
    }

    function updateQuoteSidebar() {
        const svcsEl = document.getElementById('qs-services-list');
        const addonsEl = document.getElementById('qs-addons-list');
        const onetimeEl = document.getElementById('qs-onetime');
        const monthlyEl = document.getElementById('qs-monthly');
        const monthlyRowEl = document.getElementById('qs-monthly-row');
        const totalEl = document.getElementById('qs-total');
        const mqEl = document.getElementById('mq-total-preview');

        let onetimeTotal = 0;
        let monthlyTotal = 0;

        if (selectedServices.size === 0) {
            if (svcsEl) svcsEl.innerHTML = `<div class="qs-empty" id="qs-empty-state"><span class="qs-empty-ico">${iconSvg('cart')}</span>Select services in Step 2 to see your quote build here in real time.</div>`;
            if (addonsEl) addonsEl.innerHTML = '';
        } else {
            let servicesHtml = '';
            [...selectedServices].forEach(sid => {
                const service = SERVICES.find(x => x.id === sid);
                if (!service) return;
                const basePrice = getServiceBasePrice(sid);
                const priceLabel = getServicePriceLabel(sid);
                const displayName = getServiceDisplayName(sid);
                if (service.type === 'monthly') monthlyTotal += basePrice;
                else onetimeTotal += basePrice;
                servicesHtml += `<div class="qs-svc-item"><div class="qs-svc-left"><span class="qs-svc-ico">${iconSvg(service.icon)}</span><span class="qs-svc-name">${displayName}</span></div><span class="qs-svc-price">${priceLabel}</span></div>`;
            });
            if (svcsEl) svcsEl.innerHTML = servicesHtml;

            let addonsHtml = '';
            let hasAddons = false;
            Object.entries(selectedAddons).forEach(([sid, addonSet]) => {
                const service = SERVICES.find(x => x.id === sid);
                if (!service) return;
                addonSet.forEach(aid => {
                    const addon = getAddon(sid, aid);
                    if (!addon) return;
                    hasAddons = true;
                    const addonTotal = getAddonTotal(addon, sid);
                    if (addon.monthly) monthlyTotal += addonTotal;
                    else onetimeTotal += addonTotal;
                    if (sid === 'webdesign' && aid === 'wd-extra-pages' && selectedPages.size > 0) {
                        const pageNames = [...selectedPages].map(pid => OPTIONAL_PAGES.find(p => p.id === pid)?.label ?? pid).join(', ');
                        addonsHtml += `<div class="qs-addon-item"><span class="qs-addon-name">+ Additional Pages<span class="qs-page-names">${pageNames}</span></span><span class="qs-addon-price">+${fmt(addonTotal)}${addon.monthly ? '/mo' : ''}</span></div>`;
                    } else {
                        addonsHtml += `<div class="qs-addon-item"><span class="qs-addon-name">+ ${addon.name}${addon.quantity ? ` x ${getAddonQuantity(sid, aid)}` : ''}</span><span class="qs-addon-price">+${fmt(addonTotal)}${addon.monthly ? '/mo' : ''}</span></div>`;
                    }
                });
            });
            if (addonsEl) addonsEl.innerHTML = hasAddons ? addonsHtml : '';
        }

        if (onetimeEl) onetimeEl.textContent = fmt(onetimeTotal);
        if (monthlyEl) monthlyEl.textContent = fmt(monthlyTotal) + '/mo';
        if (monthlyRowEl) monthlyRowEl.style.display = monthlyTotal > 0 ? 'flex' : 'none';
        const displayTotal = onetimeTotal + monthlyTotal;
        if (totalEl) totalEl.textContent = fmt(displayTotal) + (monthlyTotal > 0 ? '+/mo' : '');
        if (mqEl) mqEl.textContent = fmt(displayTotal);
    }

    function fmt(n) { return '₦' + n.toLocaleString('en-NG'); }
    function selectTimeline(el) { document.querySelectorAll('.timeline-card').forEach(c => c.classList.remove('selected')); el.classList.add('selected'); timeline = el.dataset.val; document.getElementById('err-timeline')?.classList.remove('visible'); }
    function selectSource(el) { document.querySelectorAll('#source-grid .source-btn').forEach(c => c.classList.remove('selected')); el.classList.add('selected'); source = el.dataset.val; }
    function selectDomainOption(el) { document.querySelectorAll('#domain-grid .source-btn').forEach(c => c.classList.remove('selected')); el.classList.add('selected'); domainPreference = el.dataset.val; document.getElementById('err-domain')?.classList.remove('visible'); }
    function selectHostingOption(el) { document.querySelectorAll('#hosting-grid .source-btn').forEach(c => c.classList.remove('selected')); el.classList.add('selected'); hostingPreference = el.dataset.val; document.getElementById('err-hosting')?.classList.remove('visible'); }
    function toggleTerms() { termsAccepted = !termsAccepted; const chk = document.getElementById('terms-check'); if (chk) { chk.textContent = termsAccepted ? '✓' : ''; chk.classList.toggle('checked', termsAccepted); } if (termsAccepted) document.getElementById('err-terms')?.classList.remove('visible'); }

    function goNext(fromStep) { if (!validateStep(fromStep)) return; if (fromStep === 2) renderAddons(); if (fromStep === 4) buildReview(); goToStep(fromStep + 1); }
    function goBack(fromStep) { goToStep(fromStep - 1); }

    function goToStep(n) {
        document.getElementById('step-' + currentStep)?.classList.remove('active');
        currentStep = n;
        document.getElementById('step-' + n)?.classList.add('active');
        updateStepIndicator();
        document.getElementById('form-panel')?.scrollIntoView({ behavior:'smooth', block:'start' });
    }

    function updateStepIndicator() {
        const pct = (currentStep / totalSteps) * 100;
        const fill = document.getElementById('progress-fill');
        if (fill) fill.style.width = pct + '%';
        const label = document.getElementById('nav-step-label');
        if (label) label.textContent = `Step ${currentStep} of ${totalSteps}`;

        for (let i = 1; i <= totalSteps; i++) {
            const item = document.querySelector(`.si-item[data-step="${i}"]`);
            const num = document.getElementById('si-num-' + i);
            if (!item || !num) continue;
            item.classList.remove('active', 'done');
            if (i < currentStep) {
                item.classList.add('done');
                num.textContent = '✓';
            } else if (i === currentStep) {
                item.classList.add('active');
                num.textContent = i;
            } else {
                num.textContent = i;
            }
        }
    }

    function validateStep(step) {
        let ok = true;
        if (step === 1) {
            ok = validateField('f-name', 'err-name', v => v.trim().length > 1) && ok;
            ok = validateField('f-business', 'err-business', v => v.trim().length > 1) && ok;
            ok = validateField('f-email', 'err-email', v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)) && ok;
            ok = validateField('f-phone', 'err-phone', v => v.trim().length > 6) && ok;
            ok = validateField('f-country', 'err-country', v => v !== '') && ok;
        }
        if (step === 2) {
            const hint = document.getElementById('svc-hint');
            if (selectedServices.size === 0) {
                hint?.classList.add('visible');
                ok = false;
            } else {
                hint?.classList.remove('visible');
            }
        }
        if (step === 4 && !timeline) {
            document.getElementById('err-timeline')?.classList.add('visible');
            ok = false;
        }
        if (step === 4 && !domainPreference) {
            document.getElementById('err-domain')?.classList.add('visible');
            ok = false;
        }
        if (step === 4 && !hostingPreference) {
            document.getElementById('err-hosting')?.classList.add('visible');
            ok = false;
        }
        if (step === 3 && selectedServices.has('ecommerce') && !getSelectedPlatform('ecommerce')) ok = false;
        return ok;
    }

    function clearSubmitError() {
        const error = document.getElementById('err-submit');
        if (!error) return;
        error.textContent = '';
        error.classList.remove('visible');
    }

    function showSubmitError(message) {
        const error = document.getElementById('err-submit');
        if (!error) return;
        error.textContent = message;
        error.classList.add('visible');
    }

    function validateField(fieldId, errId, test) {
        const el = document.getElementById(fieldId);
        const err = document.getElementById(errId);
        const val = el?.value ?? '';
        if (!el || !err) return true;
        if (!test(val)) {
            el.classList.add('error');
            err.classList.add('visible');
            el.focus();
            return false;
        }
        el.classList.remove('error');
        err.classList.remove('visible');
        return true;
    }

    function buildReview() {
        const contactData = document.getElementById('review-contact-data');
        if (contactData) {
            contactData.innerHTML = `
                <div class="rr-item"><span class="rr-label">Name</span><span class="rr-val">${esc(document.getElementById('f-name')?.value || '')}</span></div>
                <div class="rr-item"><span class="rr-label">Business</span><span class="rr-val">${esc(document.getElementById('f-business')?.value || '')}</span></div>
                <div class="rr-item"><span class="rr-label">Email</span><span class="rr-val">${esc(document.getElementById('f-email')?.value || '')}</span></div>
                <div class="rr-item"><span class="rr-label">Phone</span><span class="rr-val">${esc(document.getElementById('f-phone')?.value || '')}</span></div>
                <div class="rr-item"><span class="rr-label">Country</span><span class="rr-val">${esc(document.getElementById('f-country')?.value || '')}</span></div>
            `;
        }

        const svcsData = document.getElementById('review-services-data');
        let servicesHtml = '<div class="review-services">';
        let onetimeTotal = 0;
        let monthlyTotal = 0;
        [...selectedServices].forEach(sid => {
            const service = SERVICES.find(x => x.id === sid);
            if (!service) return;
            const basePrice = getServiceBasePrice(sid);
            const priceLabel = getServicePriceLabel(sid);
            const displayName = getServiceDisplayName(sid);
            if (service.type === 'monthly') monthlyTotal += basePrice;
            else onetimeTotal += basePrice;
            servicesHtml += `<div class="rs-item"><div class="rsi-left"><span class="rsi-ico">${iconSvg(service.icon)}</span><span class="rsi-name">${displayName}</span></div><span class="rsi-price">${priceLabel}</span></div>`;
            if (sid === 'webdesign') {
                const extraPageNames = [...selectedPages].map(pid => OPTIONAL_PAGES.find(p => p.id === pid)?.label ?? pid);
                const allPageNames = ['Home', 'About Us', 'Services', 'Contact', ...extraPageNames];
                servicesHtml += `<div class="rs-pages-row">Pages: ${allPageNames.join(' · ')}</div>`;
            }
        });
        servicesHtml += '</div>';

        let hasAddons = false;
        let addonsHtml = '<div class="review-addons">';
        Object.entries(selectedAddons).forEach(([sid, addonSet]) => {
            const service = SERVICES.find(x => x.id === sid);
            if (!service || addonSet.size === 0) return;
            addonSet.forEach(aid => {
                const addon = getAddon(sid, aid);
                if (!addon) return;
                hasAddons = true;
                const addonTotal = getAddonTotal(addon, sid);
                if (addon.monthly) monthlyTotal += addonTotal;
                else onetimeTotal += addonTotal;
                if (sid === 'webdesign' && aid === 'wd-extra-pages' && selectedPages.size > 0) {
                    const pageNames = [...selectedPages].map(pid => OPTIONAL_PAGES.find(p => p.id === pid)?.label ?? pid).join(', ');
                    addonsHtml += `<div class="ra-item"><span class="ra-name">+ Additional Pages<span class="ra-page-names">${pageNames}</span></span><span class="ra-price">+${fmt(addonTotal)}${addon.monthly ? '/mo' : ''}</span></div>`;
                } else {
                    addonsHtml += `<div class="ra-item"><span class="ra-name">+ ${addon.name}${addon.quantity ? ` x ${getAddonQuantity(sid, aid)}` : ''}</span><span class="ra-price">+${fmt(addonTotal)}${addon.monthly ? '/mo' : ''}</span></div>`;
                }
            });
        });
        addonsHtml += '</div>';
        if (svcsData) svcsData.innerHTML = servicesHtml + (hasAddons ? '<div style="margin-top:.5rem;font-size:.7rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--g400);margin-bottom:.35rem">Add-ons</div>' + addonsHtml : '');

        const briefData = document.getElementById('review-brief-data');
        const timelineLabels = {'asap':'As soon as possible','2-4weeks':'2–4 weeks','1-3months':'1–3 months','flexible':'Flexible'};
        const sourceLabels = {'google':'Google Search','referral':'Referral','social':'Social Media','returning':'Returning client','linkedin':'LinkedIn','other':'Other'};
        const domainLabels = {'own-domain':'I already have a domain','manage-domain':'I want i2Medier to procure and manage it','unsure-domain':'I’m not sure yet'};
        const hostingLabels = {'own-hosting':'I already have hosting','managed-hosting':'I want i2Medier Managed Hosting','unsure-hosting':'I’m not sure yet'};
        const msg = document.getElementById('f-message')?.value || '';
        if (briefData) {
            const budgetSelect = document.getElementById('f-budget');
            briefData.innerHTML = `
                <div class="rr-item"><span class="rr-label">Timeline</span><span class="rr-val">${timelineLabels[timeline] || timeline}</span></div>
                <div class="rr-item"><span class="rr-label">Budget</span><span class="rr-val">${budgetSelect ? budgetSelect.options[budgetSelect.selectedIndex].text : ''}</span></div>
                ${source ? `<div class="rr-item"><span class="rr-label">Found us via</span><span class="rr-val">${sourceLabels[source] || source}</span></div>` : ''}
                ${domainPreference ? `<div class="rr-item"><span class="rr-label">Domain</span><span class="rr-val">${domainLabels[domainPreference] || domainPreference}</span></div>` : ''}
                ${hostingPreference ? `<div class="rr-item"><span class="rr-label">Hosting</span><span class="rr-val">${hostingLabels[hostingPreference] || hostingPreference}</span></div>` : ''}
                ${msg ? `<div class="rr-item"><span class="rr-label">Message</span><span class="rr-val" style="max-width:300px;word-break:break-word;white-space:pre-wrap">${esc(msg.substring(0, 200))}${msg.length > 200 ? '…' : ''}</span></div>` : ''}
            `;
        }

        const totalBlock = document.getElementById('review-total-block');
        if (totalBlock) {
            totalBlock.innerHTML = `
                <div class="rt-row"><span class="rt-label">One-time total</span><span class="rt-val">${fmt(onetimeTotal)}</span></div>
                ${monthlyTotal > 0 ? `<div class="rt-row"><span class="rt-label">Monthly recurring</span><span class="rt-val">${fmt(monthlyTotal)}/mo</span></div>` : ''}
                <div class="rt-row rt-total-row"><span class="rt-label">Your estimate starts from</span><span class="rt-val">${fmt(onetimeTotal + monthlyTotal)}${monthlyTotal > 0 ? '+/mo' : ''}</span></div>
                <p class="rt-disclaimer">This is a starting estimate based on your selections. Your final, itemised quote will be confirmed within 24 hours of submission and may vary based on detailed scope discussion.</p>
            `;
        }
    }

    function buildSubmissionPayload() {
        return {
            company_website: honeypotField?.value || '',
            form_started_at: honeypotTimeField?.value || '',
            contact: {
                name: document.getElementById('f-name')?.value?.trim() || '',
                business: document.getElementById('f-business')?.value?.trim() || '',
                email: document.getElementById('f-email')?.value?.trim() || '',
                phone: document.getElementById('f-phone')?.value?.trim() || '',
                country: document.getElementById('f-country')?.value || '',
            },
            services: [...selectedServices].map(serviceId => ({
                id: serviceId,
                platform: getSelectedPlatform(serviceId) || null,
                pages: serviceId === 'webdesign' && selectedPages.size > 0
                    ? ['Home', 'About Us', 'Services', 'Contact', ...[...selectedPages].map(pid => OPTIONAL_PAGES.find(p => p.id === pid)?.label ?? pid)]
                    : undefined,
                addons: [...(selectedAddons[serviceId] || [])].map(addonId => ({
                    id: addonId,
                    quantity: getAddon(serviceId, addonId)?.quantity ? getAddonQuantity(serviceId, addonId) : 1,
                })),
            })),
            brief: {
                timeline,
                budget: document.getElementById('f-budget')?.value || '',
                source,
                domain_preference: domainPreference,
                hosting_preference: hostingPreference,
                message: document.getElementById('f-message')?.value?.trim() || '',
            },
            terms_accepted: termsAccepted,
            source_page: PRESET.source_page || '',
            source_label: PRESET.source_label || '',
        };
    }

    async function submitForm() {
        if (!termsAccepted) {
            document.getElementById('err-terms')?.classList.add('visible');
            return;
        }

        clearSubmitError();

        const btn = document.getElementById('btn-submit');
        if (!btn) return;
        btn.classList.add('loading');
        btn.disabled = true;

        try {
            const response = await fetch(submitUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    Accept: 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify(buildSubmissionPayload()),
            });

            const payload = await response.json().catch(() => ({}));

            if (!response.ok) {
                const validationMessage = payload?.errors
                    ? Object.values(payload.errors).flat().find(Boolean)
                    : null;

                throw new Error(validationMessage || payload?.message || 'We could not save your enquiry right now. Please try again.');
            }

            showSuccess(payload.reference || '');
        } catch (error) {
            showSubmitError(error?.message || 'We could not save your enquiry right now. Please try again.');
        } finally {
            btn.classList.remove('loading');
            btn.disabled = false;
        }
    }

    function showSuccess(reference = '') {
        document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
        const fill = document.getElementById('progress-fill');
        if (fill) fill.style.width = '100%';
        const label = document.getElementById('nav-step-label');
        if (label) label.textContent = 'Enquiry Sent!';
        const success = document.getElementById('step-success');
        if (success) success.style.display = 'block';
        const ref = reference || ('i2M-' + Date.now().toString().slice(-6));
        const refEl = document.getElementById('success-ref');
        if (refEl) refEl.textContent = 'REF: ' + ref;
        document.getElementById('form-panel')?.scrollIntoView({ behavior:'smooth', block:'start' });
    }

    function toggleMobileQuote() {
        document.getElementById('quote-sidebar')?.classList.toggle('collapsed');
    }

    function esc(str) {
        return String(str).replace(/[&<>"']/g, m => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m]));
    }

    function goBackToPrevious(event) {
        const referrer = document.referrer;
        if (referrer) {
            try {
                const previousUrl = new URL(referrer);
                if (previousUrl.origin === window.location.origin && previousUrl.pathname !== window.location.pathname) {
                    event.preventDefault();
                    window.location.href = previousUrl.href;
                    return false;
                }
            } catch {}
        }
        if (window.history.length > 1) {
            event.preventDefault();
            window.history.back();
            return false;
        }
        window.location.href = fallbackUrl;
        return false;
    }

    Object.assign(window, {
        toggleService,
        togglePage,
        goToStep,
        renderAddons,
        toggleAddon,
        adjustAddonQuantity,
        setAddonQuantity,
        selectPlatform,
        selectTimeline,
        selectSource,
        selectDomainOption,
        selectHostingOption,
        toggleTerms,
        goNext,
        goBack,
        submitForm,
        toggleMobileQuote,
        goBackToPrevious,
    });
