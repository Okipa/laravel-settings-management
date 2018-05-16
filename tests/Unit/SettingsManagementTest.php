<?php

namespace Okipa\LaravelSettingsManagement\Test\Unit;

use Okipa\LaravelSettingsManagement\Test\Fakers\SettingsFaker;
use Okipa\LaravelSettingsManagement\Test\Models\SettingsNotNullable;
use Okipa\LaravelSettingsManagement\Test\SettingsManagementTestCase;

class SettingsManagementTest extends SettingsManagementTestCase
{
    use SettingsFaker;

    /**
     * @expectedException \PDOException
     * @expectedExceptionMessage  Integrity constraint violation: 19 NOT NULL constraint failed:
     *                            settings_not_nullable.email
     */
    public function testCreateSettingsInstanceWithNotNullableDatabaseFields()
    {
        app('config')->set('settings.model', SettingsNotNullable::class);
        settings();
    }

    public function testGetSettingsWithInexistantInstanceInDatabase()
    {
        $this->assertNull(settings()->email);
        $this->assertNull(settings()->phone_number);
    }

    public function testGetSettingsWithExistantInstanceInDatabase()
    {
        $settings = $this->createSettings();
        $this->assertEquals($settings->email, settings()->email);
        $this->assertEquals($settings->phone_number, settings()->phone_number);
        $this->assertNull(settings()->zip_code);
    }

    public function testUpdateSettingsWithInexistantInstanceInDatabase()
    {
        $this->assertNull(settings()->email);
        $this->assertNull(settings()->phone_number);
        $data = $this->generateFakeSettingsData();
        settings()->update($data);
        $this->assertEquals($data['email'], settings()->email);
        $this->assertEquals($data['phone_number'], settings()->phone_number);
    }

    public function testUpdateSettingsWithExistantInstanceInDatabase()
    {
        $settings = $this->createSettings();
        $this->assertEquals($settings->email, settings()->email);
        $this->assertEquals($settings->phone_number, settings()->phone_number);
        $data = $this->generateFakeSettingsData();
        settings()->update($data);
        $this->assertEquals($data['email'], settings()->email);
        $this->assertEquals($data['phone_number'], settings()->phone_number);
    }
}
