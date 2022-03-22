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

    public function _session()
    {
        return $this->belongsTo(_Session::class, '__session_id');
    }

    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
