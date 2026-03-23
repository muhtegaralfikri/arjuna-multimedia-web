<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $keyType = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'whatsapp_number',
        'phone_number',
        'email',
        'address',
        'google_maps_link',
        'google_maps_embed',
        'operating_hours',
        'instagram_url',
        'facebook_url',
        'tiktok_url',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public static function getContact()
    {
        return self::first();
    }

    public function getWhatsappNumberAttribute($value)
    {
        // Format: 628xxxxxxxx
        return str_replace(['+', ' ', '-'], '', $value);
    }

    public function getWhatsappLinkAttribute()
    {
        $number = $this->whatsapp_number;
        $message = urlencode('Halo Arjuna Net, saya tertarik dengan paket internet Anda. Mohon informasinya.');
        return "https://wa.me/{$number}?text={$message}";
    }

    public function getWhatsappLinkForPackageAttribute($packageName)
    {
        $number = $this->whatsapp_number;
        $message = urlencode("Halo Arjuna Net, saya tertarik dengan paket {$packageName}. Apakah area saya sudah tercover?");
        return "https://wa.me/{$number}?text={$message}";
    }
}
