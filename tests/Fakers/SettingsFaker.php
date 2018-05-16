<?php

namespace Okipa\LaravelSettingsManagement\Test\Fakers;

use Okipa\LaravelSettingsManagement\Test\Models\Settings;

trait SettingsFaker
{
    public function createSettings()
    {
        return app(Settings::class)->create($this->generateFakeSettingsData());
    }

    public function generateFakeSettingsData()
    {
        return [
            'email'        => $this->faker->email,
            'phone_number' => $this->faker->e164PhoneNumber,
        ];
    }
}
