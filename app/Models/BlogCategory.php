<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;
    protected $table = 'blog_category';
    protected $fillable = ['name','slug','meta_tag','status'];

    public function getBlog(){
        return $this->hasMany(Blog::class,'b_cat_id','id');
    }
}
