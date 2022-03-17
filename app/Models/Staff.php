<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'dob',
        'address',
        'phone',
        'email',
        'joining_date',
        'salary',
        'extra_note',
        'is_bus_incharge',
        'transport_id',
        'user_id',
        'added_by',
    ];
}
