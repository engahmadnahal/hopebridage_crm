<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use SoftDeletes;

    public static function validateData($request)
    {
        $rules = [
            'name' => "required",
            'state_id' => "required",
        ];

        $msg = [
            'name.required'=> 'حقل الاسم مطلوب',
            'state_id.required'=> 'حقل المحافظة مطلوب',
        ];

        return \Validator::make($request->all(), $rules,$msg);
    }

    public function saveData($name,$status,$state,$values){

        $this->name=$name;
        $this->state_id=$state;
        $this->values=$values;
        $this->status=1;//$status;
        if($this->save())
            return true;
    }

    public function State(){
        return $this->belongsTo(State::class,'state_id');
    }
}
