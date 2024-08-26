<?php

namespace App\Providers;

use App\Models\EmailConfiguration;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
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

        if (Schema::hasTable('email_configurations')) {
            $emailSetting = EmailConfiguration::first();
    
            Config::set('mail.mailers.smtp.username', $emailSetting->username ?? '');
            Config::set('mail.mailers.smtp.password', $emailSetting->password ?? '');
            Config::set('mail.mailers.smtp.port', $emailSetting->port ?? '');
            Config::set('mail.mailers.smtp.host', $emailSetting->host ?? '');
            Config::set('mail.mailers.smtp.encryption', $emailSetting->encryption ?? '');
        }
    }
}
