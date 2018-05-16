# laravel-settings-management
An easy way to get access to your app settings from anywhere.

[![Source Code](https://img.shields.io/badge/source-okipa/laravel--settings--management-blue.svg)](https://github.com/Okipa/laravel-settings-management)
[![Latest Version](https://img.shields.io/github/release/okipa/laravel-settings-management.svg?style=flat-square)](https://github.com/Okipa/laravel-settings-management/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/okipa/laravel-settings-management.svg?style=flat-square)](https://packagist.org/packages/okipa/laravel-settings-management)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)
[![Build Status](https://scrutinizer-ci.com/g/Okipa/laravel-settings-management/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Okipa/laravel-settings-management/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/Okipa/laravel-settings-management/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Okipa/laravel-settings-management/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Okipa/laravel-settings-management/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Okipa/laravel-settings-management/?branch=master)

------------------------------------------------------------------------------------------------------------------------

## Before starting
The settings management only uses one Model instance, which mean that using a database table to store your settings will read and update only one line.  
Even if this package will work fine using database storage, using a [Laravel Model Json Storage](https://github.com/Okipa/laravel-model-json-storage) to do this can be a better option.

------------------------------------------------------------------------------------------------------------------------

## Installation

- Install the package with composer :
```bash
composer require okipa/laravel-settings-management
```

- Laravel 5.5+ uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.
If you don't use auto-discovery or if you use a Laravel 5.4- version, add the package service provider in the `register()` method from your `app/Providers/AppServiceProvider.php` :
```php
// laravel bootstrap table list
// https://github.com/Okipa/laravel-settings-management
$this->app->register(Okipa\LaravelSettingsManagement\SettingsManagementServiceProvider::class);
```

- Run the following command : `php artisan vendor:publish --tag=settingsManagement`.
This will publish these files to your project :
    - `app/Settings.php` : The Settings model.
    - `config/settings.php` : the settings management configuration file.
    - `database/migration/2018_05_16_145709_create_settings_table.php` : the settings management migration.
Customize them according to your needs.
**Note :** if you use the [Laravel Model Json Storage](https://github.com/Okipa/laravel-model-json-storage), you can delete the published `database/migration/2018_05_16_145709_create_settings_table.php` file.

- Run the Laravel migration command : `php artisan migrate`
 
- You may want to customize the `config/settings.php` configuration file values :
    - **model :** set the namespace of the model used for your app settings management.
   
**Notes :** 
- The model used for your app settings management should have all its values set as `nullable()` in its related migration. Indeed, an empty settings model instance is created when none is found in database.

------------------------------------------------------------------------------------------------------------------------

## Usage

Use the `settings()` helper as a model to access to your settings data from anywhere in your app :
```php
$email = settings()->email;
```

Update your settings data by using the `settings()` helper as well.
```php
settings()->update(['email' => 'john@doe.com']);

// or

settings()->setAttribute('email', 'john@doe.com')->save();

// or

settings()->email = john@doe.com;
settings()->save();
```
