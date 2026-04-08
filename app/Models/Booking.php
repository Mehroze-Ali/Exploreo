<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'travelers',
        'start_date',
        'special_requests',
        'package_id',
        'status',
    ];
}
