<?php

if (! function_exists('settings')) {
    function settings()
    {
        $settingsInstance = app(config('settings.model'))->first();
        if (! $settingsInstance) {
            $settingsInstance = app(config('settings.model'))->create([]);
        }

        return $settingsInstance;
    }
}
