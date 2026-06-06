/* ══════════════════════════════
   MAP
══════════════════════════════ */
const PH_LAT = 4.8156, PH_LNG = 7.0498;

const map = L.map('contact-map', {
  center: [PH_LAT, PH_LNG],
  zoom: 14,
  zoomControl: true,
  scrollWheelZoom: false,
  attributionControl: true,
});

// Dark CartoDB tiles
L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
  attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> © <a href="https://carto.com/">CARTO</a>',
  subdomains: 'abcd',
  maxZoom: 19,
}).addTo(map);

// Custom gold marker
const goldIcon = L.divIcon({
  className: '',
  html: `<div style="
    width:42px;height:42px;border-radius:50% 50% 50% 0;
    background:linear-gradient(135deg,#c8a96e,#e8d5b0);
    border:3px solid #fff;
    box-shadow:0 4px 16px rgba(200,169,110,.6),0 0 0 4px rgba(200,169,110,.2);
    display:flex;align-items:center;justify-content:center;
    font-size:1.1rem;
    transform:rotate(-45deg);
    cursor:pointer;
  "><svg viewBox='0 0 24 24' style='width:16px;height:16px;transform:rotate(45deg);fill:none;stroke:#0d0d0d;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round'><path d='M4 21V7l8-4 8 4v14'></path><path d='M9 21v-4h6v4'></path><path d='M8 10h.01'></path><path d='M12 10h.01'></path><path d='M16 10h.01'></path><path d='M8 14h.01'></path><path d='M12 14h.01'></path><path d='M16 14h.01'></path></svg></div>`,
  iconSize: [42, 42],
  iconAnchor: [21, 42],
  popupAnchor: [0, -46],
});

const marker = L.marker([PH_LAT, PH_LNG], { icon: goldIcon }).addTo(map);

marker.bindPopup(`
  <div style="min-width:190px">
    <div style="font-family:'Playfair Display',serif;font-size:.95rem;font-weight:700;color:#fff;margin-bottom:.3rem">i2Medier Konceptz</div>
    <div style="font-size:.75rem;color:rgba(255,255,255,.55);line-height:1.7;margin-bottom:.65rem">
      15 Rumuola Road, GRA Phase 2<br/>
      Port Harcourt, Rivers State<br/>
      Nigeria
    </div>
    <a href="https://maps.google.com/?q=Port+Harcourt+Nigeria" target="_blank"
       style="display:inline-flex;align-items:center;gap:.3rem;font-size:.72rem;font-weight:700;
              color:#c8a96e;text-decoration:none;text-transform:uppercase;letter-spacing:.08em">
      Get Directions →
    </a>
  </div>
`).openPopup();

// Map attribution style override
document.querySelector('.leaflet-control-attribution').style.cssText += 'background:rgba(0,0,0,.5);color:rgba(255,255,255,.3);font-size:10px';

/* ══════════════════════════════
   DEPARTMENT SELECTOR
══════════════════════════════ */
let selectedDept = 'letstalk@i2medier.com';
window.selectDept = function selectDept(card) {
  document.querySelectorAll('.dept-card').forEach(c => c.classList.remove('selected'));
  card.classList.add('selected');
  selectedDept = card.dataset.val;
}

/* ══════════════════════════════
   OFFICE HOURS & TIME
══════════════════════════════ */
function updateLocalTime() {
  const now = new Date();
  // Convert to WAT (UTC+1)
  const watOffset = 1 * 60;
  const utc = now.getTime() + now.getTimezoneOffset() * 60000;
  const wat = new Date(utc + watOffset * 60000);
  const h = wat.getHours(), m = wat.getMinutes();
  const hh = h % 12 || 12, ampm = h >= 12 ? 'PM' : 'AM';
  const mm = String(m).padStart(2,'0');
  document.getElementById('local-time').textContent = `${hh}:${mm} ${ampm} WAT`;

  // Highlight today's row
  const days = ['sun','mon','tue','wed','thu','fri','sat'];
  const todayIdx = wat.getDay();
  days.forEach((d, i) => {
    const el = document.getElementById('hr-' + d);
    if (!el) return;
    el.querySelector('.hr-day').classList.toggle('hr-today', i === todayIdx);
  });
}
updateLocalTime();
setInterval(updateLocalTime, 60000);

/* ══════════════════════════════
   FORM SUBMISSION
══════════════════════════════ */
window.submitForm = function submitForm(e) {
  e.preventDefault();
  const form = document.getElementById('contact-form-el');
  const name = document.getElementById('f-name').value.trim();
  const company = document.getElementById('f-company').value.trim();
  const email = document.getElementById('f-email').value.trim();
  const phone = document.getElementById('f-phone').value.trim();
  const subject = document.getElementById('f-subject').value.trim();
  const msg = document.getElementById('f-message').value.trim();
  let ok = true;

  clearFieldErrors();

  if (!name) { setFieldError('f-name', 'Please enter your full name.'); ok = false; }
  if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { setFieldError('f-email', 'Please enter a valid email address.'); ok = false; }
  if (!msg) { setFieldError('f-message', 'Please tell us what you need help with.'); ok = false; }

  if (!ok) { toast('Please fill in all required fields.'); return; }

  const btn = document.getElementById('submit-btn');
  btn.classList.add('loading'); btn.disabled = true;
  const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

  fetch(form.dataset.endpoint, {
    method: 'POST',
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': csrfToken || '',
      'X-Requested-With': 'XMLHttpRequest',
    },
    body: JSON.stringify({
      department_email: selectedDept,
      name,
      company,
      email,
      phone,
      subject,
      message: msg,
      source_page: window.location.pathname,
    }),
  })
    .then(async response => {
      const data = await response.json().catch(() => ({}));

      if (!response.ok) {
        if (response.status === 422 && data.errors) {
          applyServerErrors(data.errors);
          throw new Error(data.message || 'Please check the highlighted fields and try again.');
        }

        throw new Error(data.message || 'Unable to send your message right now.');
      }

      return data;
    })
    .then(data => {
      btn.classList.remove('loading');
      btn.disabled = false;
      form.style.display = 'none';
      const success = document.getElementById('form-success');
      success.style.display = 'block';
      document.getElementById('fs-ref').textContent = 'REF: ' + (data.ticket_number || 'TKT-PENDING');
      toast('Message sent! We\'ll reply within 24 hours ✓');
    })
    .catch(error => {
      btn.classList.remove('loading');
      btn.disabled = false;
      toast(error.message || 'Something went wrong. Please try again.');
    });
}

function clearFieldErrors() {
  ['f-name', 'f-company', 'f-email', 'f-phone', 'f-subject', 'f-message'].forEach(id => {
    const input = document.getElementById(id);
    const error = document.getElementById(`${id}-error`);

    if (input) {
      input.classList.remove('error');
      input.removeAttribute('aria-invalid');
    }

    if (error) {
      error.textContent = '';
    }
  });
}

function setFieldError(id, message) {
  const input = document.getElementById(id);
  const error = document.getElementById(`${id}-error`);

  if (input) {
    input.classList.add('error');
    input.setAttribute('aria-invalid', 'true');
  }

  if (error) {
    error.textContent = message;
  }
}

function applyServerErrors(errors) {
  const fieldMap = {
    name: 'f-name',
    company: 'f-company',
    email: 'f-email',
    phone: 'f-phone',
    subject: 'f-subject',
    message: 'f-message',
  };

  clearFieldErrors();

  Object.entries(errors).forEach(([key, messages]) => {
    const fieldId = fieldMap[key];

    if (!fieldId) {
      return;
    }

    setFieldError(fieldId, Array.isArray(messages) ? messages[0] : messages);
  });
}

/* ══════════════════════════════
   COPY TO CLIPBOARD
══════════════════════════════ */
window.copyText = function copyText(text, btn) {
  navigator.clipboard.writeText(text).then(() => {
    const orig = btn.textContent;
    btn.textContent = 'Copied!'; btn.classList.add('copied');
    setTimeout(() => { btn.textContent = orig; btn.classList.remove('copied'); }, 2500);
    toast('"' + text + '" copied ✓');
  });
}

/* ══════════════════════════════
   FAQ ACCORDION
══════════════════════════════ */
document.querySelectorAll('.faq-q').forEach(btn => {
  btn.addEventListener('click', () => {
    const id = btn.getAttribute('aria-controls');
    const a  = document.getElementById(id);
    const isOpen = btn.getAttribute('aria-expanded') === 'true';
    document.querySelectorAll('.faq-q').forEach(b => {
      b.setAttribute('aria-expanded','false');
      const el = document.getElementById(b.getAttribute('aria-controls'));
      if (el) el.classList.remove('open');
    });
    if (!isOpen) { btn.setAttribute('aria-expanded','true'); a.classList.add('open'); }
  });
});

/* ══════════════════════════════
   SCROLL REVEAL
══════════════════════════════ */
const revealObs = new IntersectionObserver(entries => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      const siblings = [...e.target.parentElement.children].filter(c => c.classList.contains('reveal'));
      e.target.style.transitionDelay = (siblings.indexOf(e.target) * 0.09) + 's';
      e.target.classList.add('visible');
      revealObs.unobserve(e.target);
    }
  });
}, { threshold: 0.06 });
document.querySelectorAll('.reveal').forEach(el => revealObs.observe(el));

/* ══════════════════════════════
   TOAST
══════════════════════════════ */
function toast(msg, dur = 3500) {
  const el = document.getElementById('toast');
  el.textContent = msg; el.classList.add('show');
  setTimeout(() => el.classList.remove('show'), dur);
}
