<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';
    protected $keyType = 'uuid';
    public $incrementing = false;

    protected $fillable = [
        'slug',
        'title',
        'hero_title',
        'hero_subtitle',
        'content',
        'meta_title',
        'meta_description',
        'og_image',
        'canonical_url',
    ];

    public function scopeBySlug($query, $slug)
    {
        return $query->where('slug', $slug);
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
}
