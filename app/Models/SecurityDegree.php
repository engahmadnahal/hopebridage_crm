<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SecurityDegree extends Model
{
    use SoftDeletes;

    public static function validateData($request)
    {
        $rules = [
            'name' => "required",
            'status' => "required",

        ];

        $msg = [
            'name.required'=> 'حقل الاسم مطلوب',
            'status.required'=> 'حقل الحالة مطلوب',
        ];

        return \Validator::make($request->all(), $rules,$msg);
    }

    public function saveData($name,$status){

        $this->name=$name;
        $this->status=$status;
        $this->save();
    }
}
