(function () {
    const banner = document.getElementById('cookie-banner');

    if (!banner) {
        return;
    }

    const STORAGE_KEY = 'i2m_cookie_consent';
    const analyticsOn = banner.dataset.analyticsOn === 'true';
    const gaId = banner.dataset.measurementId || '';
    const bannerEnabled = banner.dataset.bannerEnabled === 'true';

    function getConsent() {
        try {
            return localStorage.getItem(STORAGE_KEY);
        } catch {
            return null;
        }
    }

    function setConsent(value) {
        try {
            localStorage.setItem(STORAGE_KEY, value);
        } catch {}
    }

    function loadGA() {
        if (!analyticsOn || !gaId) return;
        if (document.getElementById('ga-script')) return;

        const script = document.createElement('script');
        script.id = 'ga-script';
        script.async = true;
        script.src = 'https://www.googletagmanager.com/gtag/js?id=' + gaId;
        document.head.appendChild(script);

        window.dataLayer = window.dataLayer || [];
        function gtag() { window.dataLayer.push(arguments); }
        window.gtag = gtag;
        gtag('js', new Date());
        gtag('config', gaId, { anonymize_ip: true });
    }

    function hideBanner() {
        banner.classList.remove('cookie-banner--visible');
        setTimeout(function () {
            banner.hidden = true;
        }, 320);
    }

    function showBanner() {
        banner.hidden = false;
        void banner.offsetHeight;
        banner.classList.add('cookie-banner--visible');
    }

    const prior = getConsent();

    if (prior === 'accepted') {
        loadGA();
    } else if (!bannerEnabled) {
        return;
    } else if (prior !== 'rejected') {
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(showBanner, 800);
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        const acceptBtn = document.getElementById('cookie-accept');
        const rejectBtn = document.getElementById('cookie-reject');

        if (acceptBtn) {
            acceptBtn.addEventListener('click', function () {
                setConsent('accepted');
                loadGA();
                hideBanner();
            });
        }

        if (rejectBtn) {
            rejectBtn.addEventListener('click', function () {
                setConsent('rejected');
                hideBanner();
            });
        }
    });
})();
