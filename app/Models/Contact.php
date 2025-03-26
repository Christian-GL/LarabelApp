<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // protected $table = 'contacts';

    protected $primaryKey = '_id';

    public $timestamps = false;

    protected $fillable = [
        'publish_date',
        'full_name',
        'email',
        'phone_number',
        'comment',
        'archived',
    ];
}
