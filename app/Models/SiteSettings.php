<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    use HasFactory;

    protected $table = 'site_settings';
    protected $keyType = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'site_name',
        'site_url',
        'logo_url',
        'favicon_url',
        'brand_color_primary',
        'brand_color_secondary',
        'google_analytics_id',
        'gtm_id',
        'google_business_profile_url',
        'maintenance_mode',
    ];

    protected $casts = [
        'maintenance_mode' => 'boolean',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public static function getSettings()
    {
        return self::first();
    }
}
