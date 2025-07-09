<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
     protected $fillable = [
        'name',
        'position',
        'photo',
        'bio',
        'facebook',
        'twitter',
        'linkedin',
        'email',
        'status',
        'order',
    ];
}
