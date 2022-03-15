<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'gender',
        'dob',
        'religion',
        'cast',
        'blood_group',
        'address',
        'state',
        'city',
        'country',
        'phone',
        'email',
        'extra_note',
        'gr_no',
        'father_name',
        'father_phone',
        'father_occ',
        'mother_name',
        'mother_phone',
        'mother_occ',
        'student_pic',
        'transport_id',
        '__class_id',
        '__session_id',
        'user_id',
        'status',
    ];
}
