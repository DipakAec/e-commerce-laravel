<?php
namespace App\Models\Seller;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Seller extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'mobile',
        'country',
        'state',
        'city',
        'pin',
        'product_type',
        'gstin',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    // Relationships (optional)
    public function country()
    {
        return $this->belongsTo(Country::class, 'country');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city');
    }
}

