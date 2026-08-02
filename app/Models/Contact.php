<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    private static ?self $cachedContact = null;

    protected $table = 'contacts';
    protected $keyType = 'uuid';
    public $incrementing = false;

    protected $fillable = [
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
        return self::$cachedContact ??= \Illuminate\Support\Facades\Cache::remember('site_contact', 86400, function () {
            return self::first();
        });
    }

    public static function clearCache(): void
    {
        self::$cachedContact = null;
        \Illuminate\Support\Facades\Cache::forget('site_contact');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) \Illuminate\Support\Str::uuid();
            }
        });
    }

    public function getWhatsappNumberAttribute($value)
    {
        // Format: 628xxxxxxxx
        return str_replace(['+', ' ', '-'], '', $value);
    }

    public function getWhatsappLinkAttribute()
    {
        $number = $this->getWhatsappNumberForLink();
        $message = urlencode('Halo Arjuna Net, saya tertarik dengan paket internet Anda. Mohon informasinya.');
        return "https://wa.me/{$number}?text={$message}";
    }

    public function whatsappLinkForNumber(?string $phoneNumber): ?string
    {
        if (!$phoneNumber) {
            return null;
        }

        $number = $this->normalizeWhatsappNumber($phoneNumber);
        $message = urlencode('Halo Arjuna Net, saya tertarik dengan paket internet Anda. Mohon informasinya.');

        return "https://wa.me/{$number}?text={$message}";
    }

    public function whatsappLinkForPackage(string $packageName): string
    {
        $number = $this->getWhatsappNumberForLink();
        $message = urlencode("Halo Arjuna Net, saya tertarik dengan paket {$packageName}. Apakah area saya sudah tercover?");
        return "https://wa.me/{$number}?text={$message}";
    }

    public function whatsappLinkForMessage(string $message, ?string $phoneNumber = null): string
    {
        $number = $phoneNumber
            ? $this->normalizeWhatsappNumber($phoneNumber)
            : $this->getWhatsappNumberForLink();

        return "https://wa.me/{$number}?text=" . urlencode($message);
    }

    public function getSafeGoogleMapsEmbedAttribute(): ?string
    {
        $embed = trim((string) $this->google_maps_embed);

        if ($embed === '') {
            return null;
        }

        // Extract the src URL from the iframe — only allow Google Maps embed URLs
        if (!preg_match('/\bsrc="(https:\/\/www\.google\.com\/maps\/embed\?[^"]+)"/i', $embed, $matches)) {
            return null;
        }

        $src = htmlspecialchars($matches[1], ENT_QUOTES, 'UTF-8');

        // Reconstruct a clean iframe with only safe attributes — no untrusted HTML passes through
        return '<iframe src="' . $src . '" width="100%" height="100%" style="border:0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
    }

    private function getWhatsappNumberForLink(): string
    {
        return $this->normalizeWhatsappNumber($this->whatsapp_number);
    }

    private function normalizeWhatsappNumber(string $number): string
    {
        $number = str_replace(['+', ' ', '-'], '', $number);

        if (str_starts_with($number, '0')) {
            return '62' . substr($number, 1);
        }

        return $number;
    }
}
