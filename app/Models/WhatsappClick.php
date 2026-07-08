<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class WhatsappClick extends Model
{
    use HasFactory;

    protected $table = 'whatsapp_clicks';
    protected $keyType = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'source',
        'package_id',
        'target_number',
        'landing_path',
        'ip_address',
        'user_agent',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
