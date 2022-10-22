<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;

    protected $table = 'course_category';
    protected $fillable = ['name','icon','slug','meta_tag','status'];

    public function getCourse(){
        return $this->hasMany(Course::class,'cat_id','id');
    }
}
