<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLesson extends Model
{
    use HasFactory;
    protected $table = 'course_lesson';
    protected $fillable = ['course_id','lesson_name','video_lesson','duration','status'];


    public function course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }
}
