<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $fillable = ['cat_id','title','slug','short_details','cover_image','description','meta_title','meta_description','meta_tags','price','discount_price','status'];

    public function getCourseCategory(){
        return $this->belongsTo(CourseCategory::class,'cat_id','id');
    }
    public function getLesson(){
        return $this->hasMany(CourseLesson::class,'course_id','id');
    }
    protected function findBySlug($slug){
        return $this->where('slug',$slug)->first();
    }
}
