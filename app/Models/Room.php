<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $primaryKey = '_id';
    public $timestamps = false;

    protected $fillable = [
        'photos',
        'number',
        'type',
        'amenities',
        'price',
        'discount',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'room_id', '_id');
    }
}
