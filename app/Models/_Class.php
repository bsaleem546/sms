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

    public function admission()
    {
        return $this->hasOne(Admission::class, '__class_id');
    }

    public function subject()
    {
        return $this->hasOne(Subject::class, '__class_id');
    }
}
