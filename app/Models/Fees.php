<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    use HasFactory;

    protected $fillable = [
        'admission_id',
        '__session_id',
        'student_id',
        'fee_type',
        'fee_amount',
        'fee_discount',
        'due_date',
        'status',
    ];
}
