<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HouseGeneralCondition extends Model
{
    use SoftDeletes;

    public static function validateData($request)
    {
        $rules = [
            'name' => "required",
        ];

        $msg = [
            'name.required'=> 'حقل الاسم مطلوب',
        ];

        return \Validator::make($request->all(), $rules,$msg);
    }

    public function saveData($name,$status,$values){

        $this->name=$name;
        $this->values=$values;
        $this->status=1;//$status;
        if($this->save())
            return true;
    }
}
