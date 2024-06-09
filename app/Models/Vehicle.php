<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'brand', 'model', 'plate_number', 'year', 'capacity', 'rental_price', 'image'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

