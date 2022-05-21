<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
            'admission_id',
            'student_id',
            'class_id',
            'session_id',
            'exam_type',
            'total_marks',
            'obtained_marks',
            'percentage',
            'grade',
            'status',
    ];
}
