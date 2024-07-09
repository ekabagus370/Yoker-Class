<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'description',
        'image_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function courseClass()
    {
        return $this->hasMany(CourseClass::class, 'course_id');
    }

    // public function students()
    // {
    //     return $this->belongsToMany(User::class, 'course_users', 'course_id', 'student_id')
    //                 ->withTimestamps();
    // }

    // public function material()
    // {
    //     return $this->belongsTo(Material::class);
    // }
}
