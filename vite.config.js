import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/public.css',
                'resources/css/public/pages/lawyer.css',
                'resources/css/public/pages/cloud-architecture.css',
                'resources/css/public/pages/business-email-setup.css',
                'resources/css/public/pages/laravel-development.css',
                'resources/css/public/pages/wordpress-maintenance.css',
                'resources/css/public/pages/home.css',
                'resources/css/public/pages/portfolio.css',
                'resources/css/public/pages/case-study-meto7.css',
                'resources/css/public/pages/case-study-ntf.css',
                'resources/css/public/pages/services.css',
                'resources/css/public/pages/about.css',
                'resources/css/public/pages/who-we-help.css',
                'resources/css/public/pages/web-design-industry.css',
                'resources/css/public/pages/web-design.css',
                'resources/css/public/pages/wordpress-development.css',
                'resources/css/public/pages/search-optimization.css',
                'resources/css/public/pages/ui-ux-design.css',
                'resources/css/public/pages/mobile-app-development.css',
                'resources/css/public/pages/website-maintenance.css',
                'resources/css/public/pages/accounting-firm-web-design.css',
                'resources/css/public/pages/clinic-web-design.css',
                'resources/css/public/pages/real-estate-web-design.css',
                'resources/css/public/pages/contact.css',
                'resources/css/public/pages/blog-archive.css',
                'resources/css/public/pages/blog-single.css',
                'resources/js/app.js',
                'resources/css/filament/admin/theme.css',
                'resources/css/filament/client/theme.css',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
