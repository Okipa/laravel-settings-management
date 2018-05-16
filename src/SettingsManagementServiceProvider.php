<?php

namespace Okipa\LaravelSettingsManagement;

use Illuminate\Support\ServiceProvider;

class SettingsManagementServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/settings.php'                                             => config_path('settings.php'),
            __DIR__ . '/../app/Settings.php'                                                => app_path('Settings.php'),
            __DIR__ . '/../database/migrations/2018_05_16_145709_create_settings_table.php' => database_path('migrations/2018_05_16_145709_create_settings_table.php'),
        ], 'settingsManagement');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/settings.php', 'settings'
        );
    }
}
