<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'logo',
        'email',
        'phone_number',
        'address',
        'zip_code',
        'city',
        'country',
        'facebook',
        'twitter',
        'linkedin',
        'google_plus',
        'google_analytics_script',
    ];
}
