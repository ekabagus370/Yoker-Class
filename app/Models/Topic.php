<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'course_class_id',
    ];

    public function materials()
    {
        return $this->hasMany(Material::class, 'topic_id');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'topic_id');
    }

    public function courseClass()
    {
        return $this->belongsTo(CourseClass::class, 'course_class_id');
    }
}
