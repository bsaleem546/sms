<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class _Class extends Model
{
    use HasFactory;

    protected $fillable = ['section_id', 'name'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

//    public function student()
//    {
//        return $this->hasOne(Student::class);
//    }
}
