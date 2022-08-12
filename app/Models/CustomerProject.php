<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerProject extends Model
{
    use SoftDeletes;

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }
}
