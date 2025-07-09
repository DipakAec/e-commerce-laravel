<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Services extends Model
{
     protected $fillable = [
        'title',
        'slug',
        'icon',
        'banner',
        'description',
        'meta_title',
        'meta_description',
        'status',
        'position',
    ];

    /**
     * Automatically generate slug from title if not manually set.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });

        static::updating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });
    }

}
