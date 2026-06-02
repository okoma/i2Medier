import { initCounters, initFaqButtons, initReveal } from './service-common';

initReveal('.maintenance-page .reveal', 0.08, 0.08);
initCounters('.maintenance-page .counter', 0.5, 1800);
initFaqButtons('.maintenance-page .faq-q');
