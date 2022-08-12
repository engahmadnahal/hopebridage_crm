<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Family extends Model
{
    use SoftDeletes;
    protected $fillable = [ 'name' ,'dob' ,'jender_id' ,'card_no' ,'relation' ,'qualification_id' ,'social_id' ,'health_id' ,'job' ,'salary' ,'user_id','is_yatem'];

    protected $dates = ['dob'];
    public function jender(){
      return  $this->belongsTo(Jender::class,'jender_id');
    }

    public function health(){
      return  $this->belongsTo(Health::class,'health_id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
    public function rel(){
        return  $this->belongsTo(RelationType::class,'relation');
    }

    public function qualification(){
        return  $this->belongsTo(Qualification::class);
    }


    public function social(){
        return  $this->belongsTo(SocialStatus::class);
    }

}
