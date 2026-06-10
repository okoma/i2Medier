<?php

namespace App\Providers;

use App\Support\SiteSettings;
use Filament\Facades\Filament;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('public.partials.footer', function ($view): void {
            $view->with(app(SiteSettings::class)->footerViewData());
        });

        VerifyEmail::createUrlUsing(function (object $notifiable): string {
            return Filament::getPanel('client')->getVerifyEmailUrl($notifiable);
        });
    }
}
