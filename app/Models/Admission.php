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
        'is_trans',
        'transport_id',
        '__class_id',
        '__session_id',
        'user_id',
        'student_auth_id',
        'status',
    ];

    public function _class()
    {
        return $this->belongsTo(_Class::class, '__class_id');
    }

    public function transfer()
    {
        return $this->hasOne(Transfer::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function fees()
    {
        return $this->hasMany(Fees::class, 'admission_id');
    }

    public function studentAtd()
    {
        return $this->hasOne(StudentAttendence::class);
    }
}
