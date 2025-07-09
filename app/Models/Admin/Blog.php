<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'blog_category_id',
        'title',
        'slug',
        'thumbnail',
        'excerpt',
        'content',
        'meta_title',
        'meta_description',
        'status',
        'admin_id',
    ];
}

