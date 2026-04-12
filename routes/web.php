<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PublicInvoiceController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{portfolioProject:slug}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('/services', [SiteController::class, 'services'])->name('site.services');
Route::get('/about', [SiteController::class, 'about'])->name('site.about');
Route::get('/terms', [SiteController::class, 'terms'])->name('site.terms');
Route::get('/privacy', [SiteController::class, 'privacy'])->name('site.privacy');
Route::get('/pay/invoices/{token}', [PublicInvoiceController::class, 'show'])->name('public.invoices.show');
Route::get('/pay/invoices/{token}/paystack', [PublicInvoiceController::class, 'paystackRedirect'])->name('public.invoices.paystack.redirect');
Route::get('/pay/invoices/{token}/paystack/callback', [PublicInvoiceController::class, 'paystackCallback'])->name('public.invoices.paystack.callback');

Route::middleware('auth')->group(function (): void {
    Route::get('/billing/invoices/{invoice}/paystack', [BillingController::class, 'paystackRedirect'])
        ->name('billing.paystack.redirect');
    Route::get('/billing/invoices/{invoice}/paystack/callback', [BillingController::class, 'paystackCallback'])
        ->name('billing.paystack.callback');
    Route::post('/billing/invoices/{invoice}/resend-link', [BillingController::class, 'resendPaymentLink'])
        ->name('billing.invoices.resend-link');
});
