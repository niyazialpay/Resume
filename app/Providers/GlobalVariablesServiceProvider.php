<?php

namespace App\Providers;

use App\Models\settings;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class GlobalVariablesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(){}

    /**
     * Bootstrap services.
     *
     * @param settings $settings
     * @return void
     */
    public function boot(settings $settings): void
    {
        $site_settings = $settings::getSiteSettings();
        View::share('global_settings', $site_settings);
        if($site_settings){
            Config::set('mail', [
                'driver' => 'smtp',
                'transport' => 'smtp',
                'host' => $site_settings->smtp_host,
                'port' => $site_settings->smtp_port,
                'encryption' => $site_settings->smtp_encryption,
                'username' => $site_settings->smtp_username,
                'password' => $site_settings->smtp_password,
            ]);
        }
    }
}
