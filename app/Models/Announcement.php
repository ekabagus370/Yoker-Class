<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'course_class_id',
    ];

    public function courseClass()
    {
        return $this->belongsTo(CourseClass::class);
    }
}
