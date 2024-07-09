<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseClassTeacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_class_id',
        'teacher_id',
    ];

    public function courseClass()
    {
        return $this->belongsTo(CourseClass::class, 'course_class_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
