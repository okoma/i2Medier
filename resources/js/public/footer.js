const footerBusinessConfig = (() => {
    const badge = document.querySelector('.availability-badge');

    if (!badge) {
        return null;
    }

    try {
        return {
            timeZone: badge.dataset.businessTimezone || 'Africa/Lagos',
            hours: JSON.parse(badge.dataset.businessHours || '{}'),
            holidayEnabled: badge.dataset.holidayEnabled === 'true',
            holidayStatus: badge.dataset.holidayStatus || 'closed',
            holidayNotice: badge.dataset.holidayNotice || '',
        };
    } catch (error) {
        return {
            timeZone: 'Africa/Lagos',
            hours: {},
            holidayEnabled: false,
            holidayStatus: 'closed',
            holidayNotice: '',
        };
    }
})();

function getBusinessNow(timeZone) {
    const parts = new Intl.DateTimeFormat('en-GB', {
        timeZone,
        hour: 'numeric',
        minute: '2-digit',
        hour12: true,
        weekday: 'short',
        timeZoneName: 'short',
    }).formatToParts(new Date());

    const values = Object.fromEntries(parts.map((part) => [part.type, part.value]));
    const hour = parseInt(values.hour, 10) % 12;

    return {
        hour12: values.hour,
        minute: values.minute,
        dayPeriod: values.dayPeriod,
        weekday: values.weekday,
        hour24: values.dayPeriod === 'pm' ? hour + 12 : hour,
        minutesFromMidnight: ((values.dayPeriod === 'pm' ? hour + 12 : hour) * 60) + parseInt(values.minute, 10),
        timeZoneLabel: values.timeZoneName || 'WAT',
    };
}

function parseScheduleTime(value) {
    if (!value) {
        return null;
    }

    const match = String(value).trim().match(/^(\d{1,2}):(\d{2})\s*(AM|PM)$/i);

    if (!match) {
        return null;
    }

    let hours = parseInt(match[1], 10) % 12;
    const minutes = parseInt(match[2], 10);
    const meridiem = match[3].toUpperCase();

    if (meridiem === 'PM') {
        hours += 12;
    }

    return (hours * 60) + minutes;
}

function getNextOpening(hours, currentDayIndex, currentMinutes) {
    const dayKeys = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
    const dayLabels = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    for (let offset = 0; offset < 7; offset += 1) {
        const dayIndex = (currentDayIndex + offset) % 7;
        const dayKey = dayKeys[dayIndex];
        const config = hours?.[dayKey];

        if (!config?.enabled) {
            continue;
        }

        const openMinutes = parseScheduleTime(config.open);

        if (openMinutes === null) {
            continue;
        }

        if (offset === 0 && currentMinutes < openMinutes) {
            return {
                label: 'today',
                time: config.open,
            };
        }

        if (offset > 0) {
            return {
                label: dayLabels[dayIndex],
                time: config.open,
            };
        }
    }

    return null;
}

function getTomorrowOpening(hours, currentDayIndex) {
    const dayKeys = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
    const tomorrowIndex = (currentDayIndex + 1) % 7;
    const tomorrowKey = dayKeys[tomorrowIndex];
    const tomorrowConfig = hours?.[tomorrowKey];

    if (!tomorrowConfig?.enabled) {
        return null;
    }

    const openMinutes = parseScheduleTime(tomorrowConfig.open);

    if (openMinutes === null) {
        return null;
    }

    return {
        label: 'Tomorrow',
        time: tomorrowConfig.open,
    };
}

function updateFooterTime() {
    const config = footerBusinessConfig;
    const businessNow = getBusinessNow(config?.timeZone || 'Africa/Lagos');
    const timeEl = document.getElementById('wat-time');

    if (timeEl) {
        timeEl.textContent = `${businessNow.hour12}:${businessNow.minute} ${businessNow.dayPeriod.toUpperCase()} ${businessNow.timeZoneLabel}`;
    }

    const dayMap = {
        Mon: 1,
        Tue: 2,
        Wed: 3,
        Thu: 4,
        Fri: 5,
        Sat: 6,
        Sun: 0,
    };
    const dayKeys = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
    const currentDayIndex = dayMap[businessNow.weekday] ?? 0;
    const currentDayKey = dayKeys[currentDayIndex];
    const todayConfig = config?.hours?.[currentDayKey] || null;
    const openMinutes = parseScheduleTime(todayConfig?.open);
    const closeMinutes = parseScheduleTime(todayConfig?.close);
    const dot = document.getElementById('avail-dot');
    const text = document.getElementById('avail-text');

    if (!dot || !text) {
        return;
    }

    if (config?.holidayEnabled) {
        const notice = config.holidayNotice?.trim();

        if (config.holidayStatus === 'open') {
            dot.className = 'ab-dot online';
            text.innerHTML = notice
                ? `<strong>Open Now</strong> — ${notice}`
                : '<strong>Open Now</strong> — holiday support is active';
            return;
        }

        if (config.holidayStatus === 'limited') {
            dot.className = 'ab-dot away';
            text.innerHTML = notice
                ? `<strong>Closed Today</strong> — ${notice}`
                : '<strong>Closed Today</strong> — limited holiday hours apply today';
            return;
        }

        dot.className = 'ab-dot offline';
        text.innerHTML = notice
            ? `<strong>Closed Today</strong> — ${notice}`
            : '<strong>Closed Today</strong> — holiday closure is in effect';
        return;
    }

    if (todayConfig?.enabled && openMinutes !== null && closeMinutes !== null) {
        if (businessNow.minutesFromMidnight >= openMinutes && businessNow.minutesFromMidnight < closeMinutes) {
            dot.className = 'ab-dot online';
            text.innerHTML = `<strong>Open Now</strong> — Till ${todayConfig.close} Today`;
            return;
        }

        if (businessNow.minutesFromMidnight < openMinutes) {
            dot.className = 'ab-dot offline';
            text.innerHTML = `<strong>Closed Today</strong> — back Today at ${todayConfig.open}`;
            return;
        }
    }

    const tomorrowOpening = getTomorrowOpening(config?.hours || {}, currentDayIndex);

    if (tomorrowOpening) {
        dot.className = 'ab-dot offline';
        text.innerHTML = `<strong>Closed Today</strong> — back ${tomorrowOpening.label} at ${tomorrowOpening.time}`;
        return;
    }

    const nextOpening = getNextOpening(config?.hours || {}, currentDayIndex, businessNow.minutesFromMidnight);

    if (nextOpening) {
        dot.className = 'ab-dot offline';
        text.innerHTML = `<strong>Closed Today</strong> — back ${nextOpening.label} at ${nextOpening.time}`;
        return;
    }

    dot.className = 'ab-dot away';
    text.innerHTML = '<strong>Out of office</strong> — replies within 24 hours';
}

function animateFooterCounter(el) {
    if (el.dataset.animated === 'true') {
        return;
    }

    el.dataset.animated = 'true';

    const target = parseInt(el.dataset.target, 10);
    const dur = 1400;
    const step = target / (dur / 16);
    let cur = 0;

    const t = setInterval(() => {
        cur += step;

        if (cur >= target) {
            cur = target;
            clearInterval(t);
        }

        el.textContent = Math.floor(cur);
    }, 16);
}

function subscribeNewsletter(btn) {
    const input = btn.previousElementSibling;
    const email = input?.value?.trim();

    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        if (input) {
            input.style.borderColor = 'rgba(220,38,38,.5)';
            input.focus();
            setTimeout(() => {
                input.style.borderColor = '';
            }, 2500);
        }

        return;
    }

    const orig = btn.textContent;
    btn.textContent = '✓ Subscribed!';
    btn.style.background = '#16a34a';
    btn.disabled = true;
    input.value = '';

    setTimeout(() => {
        btn.textContent = orig;
        btn.style.background = '';
        btn.disabled = false;
    }, 4000);
}

function initFooterEnhancements() {
    if (window.__i2FooterInit) {
        return;
    }

    window.__i2FooterInit = true;

    updateFooterTime();
    window.setInterval(updateFooterTime, 60000);

    const counters = document.querySelectorAll('.footer-main .counter');

    if ('IntersectionObserver' in window) {
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                animateFooterCounter(entry.target);
                counterObserver.unobserve(entry.target);
            });
        }, { threshold: 0.2, rootMargin: '0px 0px -40px 0px' });

        counters.forEach((el) => counterObserver.observe(el));
    } else {
        counters.forEach((el) => animateFooterCounter(el));
    }

    const btt = document.getElementById('back-to-top');

    if (btt) {
        btt.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        window.addEventListener('scroll', () => {
            btt.classList.toggle('visible', window.scrollY > 400);
        }, { passive: true });
    }

    const subscribeButton = document.querySelector('[data-footer-subscribe]');

    if (subscribeButton) {
        subscribeButton.addEventListener('click', () => subscribeNewsletter(subscribeButton));
    }
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initFooterEnhancements, { once: true });
} else {
    initFooterEnhancements();
}
