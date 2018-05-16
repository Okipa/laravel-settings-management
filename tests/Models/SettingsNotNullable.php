<?php

namespace Okipa\LaravelSettingsManagement\Test\Models;

use Illuminate\Database\Eloquent\Model;

class SettingsNotNullable extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings_not_nullable';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'phone_number',
    ];
}
