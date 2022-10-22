<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = ['b_cat_id','title','slug','short_details','cover_image','description','meta_title','meta_description','meta_tags',];

    public function getBlogCategory(){
        return $this->belongsTo(BlogCategory::class,'b_cat_id','id');
    }
    protected function findBySlug($slug){
        return $this->where('slug',$slug)->first();
    }
}
