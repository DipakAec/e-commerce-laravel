<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
    ];
}
