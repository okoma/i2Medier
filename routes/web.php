<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\BlogImageUploadController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PortalAssetController;
use App\Http\Controllers\PublicInvoiceController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ToolController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])->name('site.home');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/category/{category:slug}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/{category}/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/{post:slug}', function (\App\Models\BlogPost $post) {
    return redirect()->route('blog.show', [
        'category' => $post->category?->slug ?? 'uncategorized',
        'post' => $post,
    ], 301);
});
Route::get('/portfolio', [SiteController::class, 'portfolio'])->name('portfolio.index');
Route::get('/portfolio/{portfolioProject:slug}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('/services', [SiteController::class, 'services'])->name('site.services');
Route::get('/services/web-design', [SiteController::class, 'webDesign'])->name('site.services.web-design');
Route::get('/services/wordpress-development', [SiteController::class, 'wordpressDevelopment'])->name('site.services.wordpress-development');
Route::get('/services/laravel-development', [SiteController::class, 'laravelDevelopment'])->name('site.services.laravel-development');
Route::get('/services/mobile-app-development', [SiteController::class, 'mobileAppDevelopment'])->name('site.services.mobile-app-development');
Route::get('/services/search-optimization', [SiteController::class, 'searchOptimization'])->name('site.services.search-optimization');
Route::get('/services/ui-ux-design', [SiteController::class, 'uiUxDesign'])->name('site.services.ui-ux-design');
Route::get('/services/business-email-setup', [SiteController::class, 'businessEmailSetup'])->name('site.services.business-email-setup');
Route::get('/services/website-maintenance', [SiteController::class, 'websiteMaintenance'])->name('site.services.website-maintenance');
Route::get('/services/wordpress-maintenance', [SiteController::class, 'wordpressMaintenance'])->name('site.services.wordpress-maintenance');
Route::get('/services/cloud-architecture', [SiteController::class, 'cloudArchitecture'])->name('site.services.cloud-architecture');
Route::get('/services/saas-application', [SiteController::class, 'saasApplication'])->name('site.services.saas-application');
Route::get('/services/ecommerce-website', [SiteController::class, 'ecommerceWebsite'])->name('site.services.ecommerce-website');
Route::get('/who-we-help', [SiteController::class, 'whoWeHelp'])->name('site.who-we-help');
Route::get('/contact', [SiteController::class, 'contact'])->name('site.contact');
Route::get('/start', [SiteController::class, 'start'])->name('site.start');
Route::get('/services/web-design/law-firm-website-design', [SiteController::class, 'lawyerLanding'])->name('site.lawyer');
Route::get('/services/web-design/{industry}', [SiteController::class, 'webDesignIndustry'])
    ->where('industry', 'accounting-firm-website-design|clinic-website-design|real-estate-website-design|consulting-firm-website-design|construction-company-website-design|engineering-firm-website-design|architecture-firm-website-design|school-website-design|church-website-design|hotel-website-design|restaurant-website-design|beauty-wellness-website-design|fitness-website-design|cleaning-company-website-design|logistics-company-website-design|travel-agency-website-design|ecommerce-website-design|fashion-brand-website-design|event-planner-website-design|photography-website-design|personal-brand-website-design')
    ->name('site.services.web-design.industry');
Route::get('/about', [SiteController::class, 'about'])->name('site.about');
Route::get('/terms', [SiteController::class, 'terms'])->name('site.terms');
Route::get('/privacy', [SiteController::class, 'privacy'])->name('site.privacy');
Route::get('/tools', [ToolController::class, 'hub'])->name('tools.hub');
Route::get('/tools/free-seo-audit', [ToolController::class, 'seoAudit'])->name('tools.seo-audit');
Route::get('/tools/website-cost-calculator', [ToolController::class, 'costCalculator'])->name('tools.cost-calculator');
Route::get('/tools/business-name-generator', [ToolController::class, 'businessNameGenerator'])->name('tools.business-name-generator');
Route::post('/tools/business-name-generator/generate', [ToolController::class, 'businessNameGenerate'])->name('tools.business-name-generator.generate')->middleware('throttle:8,1');
Route::post('/tools/business-name-generator/variations', [ToolController::class, 'businessNameVariations'])->name('tools.business-name-generator.variations')->middleware('throttle:12,1');
Route::get('/tools/domain-name-generator', [ToolController::class, 'domainNameGenerator'])->name('tools.domain-name-generator');
Route::post('/tools/domain-name-generator/generate', [ToolController::class, 'domainNameGenerate'])->name('tools.domain-name-generator.generate')->middleware('throttle:8,1');
Route::get('/tools/website-brief-generator', [ToolController::class, 'websiteBriefGenerator'])->name('tools.website-brief-generator');
Route::get('/tools/whatsapp-link-generator', [ToolController::class, 'whatsappLinkGenerator'])->name('tools.whatsapp-link-generator');
Route::get('/tools/invoice-generator', [ToolController::class, 'invoiceGenerator'])->name('tools.invoice-generator');
Route::post('/tools/leads', [ToolController::class, 'storeLead'])->name('tools.leads.store');
Route::post('/tools/seo-audit/fetch-html', [ToolController::class, 'seoFetchHtml'])->name('tools.seo-audit.fetch-html')->middleware('throttle:15,1');
Route::post('/tools/seo-audit/psi', [ToolController::class, 'seoFetchPsi'])->name('tools.seo-audit.psi')->middleware('throttle:10,1');
Route::post('/tools/seo-audit/crux', [ToolController::class, 'seoFetchCrux'])->name('tools.seo-audit.crux')->middleware('throttle:10,1');
Route::post('/tools/seo-audit/recommend', [ToolController::class, 'seoRecommend'])->name('tools.seo-audit.recommend')->middleware('throttle:5,1');
Route::get('/pay/invoices/{token}', [PublicInvoiceController::class, 'show'])->name('public.invoices.show');
Route::get('/pay/invoices/{token}/paystack', [PublicInvoiceController::class, 'paystackRedirect'])->name('public.invoices.paystack.redirect');
Route::get('/pay/invoices/{token}/paystack/callback', [PublicInvoiceController::class, 'paystackCallback'])->name('public.invoices.paystack.callback');
Route::get('/login', fn () => redirect('/portal/login'))->name('login');
Route::get('/portal-assets/{file}', [PortalAssetController::class, 'show'])->name('portal.assets');

Route::middleware('auth')->prefix('admin/blog')->group(function (): void {
    Route::post('/upload-image', BlogImageUploadController::class)->name('blog.upload-image');
});

Route::middleware(['auth', 'signed'])->group(function (): void {
    Route::get('/blog/{post:slug}/preview', [BlogController::class, 'preview'])->name('blog.preview');
    Route::get('/portfolio/{portfolioProject:slug}/preview', [PortfolioController::class, 'preview'])->name('portfolio.preview');
});

Route::middleware('auth')->group(function (): void {
    Route::get('/billing/invoices/{invoice}/paystack', [BillingController::class, 'paystackRedirect'])
        ->name('billing.paystack.redirect');
    Route::get('/billing/invoices/{invoice}/paystack/callback', [BillingController::class, 'paystackCallback'])
        ->name('billing.paystack.callback');
    Route::post('/billing/invoices/{invoice}/resend-link', [BillingController::class, 'resendPaymentLink'])
        ->name('billing.invoices.resend-link');
});
