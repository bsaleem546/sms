<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staffs';

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
        'id_proof',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transport()
    {
        return $this->belongsTo(Transport::class, 'transport_id');
    }

}
