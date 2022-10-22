<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['course_id','invoice_id','cat_id','course_price','discount','customer_id','order_status','total_amount','bkash_transaction','payment_type'];


    public function course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }
    public function getCourseCategory(){
        return $this->belongsTo(CourseCategory::class,'cat_id','id');
    }
    public function userInfo(){
        return $this->belongsTo(User::class,'customer_id','id');
    }
    
    protected function courseList($userId){
        return $this->where('customer_id',$userId)->get();
    }
}
