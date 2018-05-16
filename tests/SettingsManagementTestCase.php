<?php

namespace Okipa\LaravelSettingsManagement\Test;

use Faker\Factory;
use Okipa\LaravelSettingsManagement\SettingsManagementServiceProvider;
use Okipa\LaravelSettingsManagement\Test\Models\Settings;
use Orchestra\Testbench\TestCase;

abstract class SettingsManagementTestCase extends TestCase
{
    protected $faker;

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
        $app['config']->set('settings.model', Settings::class);
    }

    /**
     * Setup the test environment.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->faker = Factory::create();
        $this->loadMigrationsFrom([
            '--database' => 'testing',
            '--realpath' => realpath(__DIR__.'/database/migrations'),
        ]);
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [SettingsManagementServiceProvider::class];
    }
}
