<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'file',
        'point',
        'due_date',
        'topic_id',
        'course_class_id',
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function courseClass()
    {
        return $this->belongsTo(CourseClass::class);
    }

    public function submmissions()
    {
        return $this->hasMany(Submission::class, 'assignment_id');
    }
}
