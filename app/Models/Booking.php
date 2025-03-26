<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $primaryKey = '_id';
    public $timestamps = false;

    protected $fillable = [
        'photo',
        'full_name_guest',
        'order_date',
        'check_in_date',
        'check_out_date',
        'special_request',
        'room_id',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', '_id');
    }
}
