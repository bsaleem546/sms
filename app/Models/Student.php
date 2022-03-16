<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'admission_id',
        '__class_id',
        '__session_id',
        'roll_no',
        'name',
        'status',
    ];
}
