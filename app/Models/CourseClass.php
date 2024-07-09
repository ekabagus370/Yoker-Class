<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image_url',
        'room',
        'code',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function courseClassTeacher()
    {
        return $this->hasMany(CourseClassTeacher::class, 'course_class_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'course_class_id');
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class, 'course_class_id');
    }

    public function topics()
    {
        return $this->hasMany(Topic::class, 'course_class_id');
    }

    public function materials()
    {
        return $this->hasMany(Material::class, 'course_class_id');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'course_class_id');
    }
}
