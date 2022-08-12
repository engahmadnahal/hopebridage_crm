<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    //
    public function delete($id){
        $obj = Family::find($id);
        if(isset($obj)){

            $obj->delete();
            return response(["status"=>true,"message"=>trans('ar.delete_successfully')]);
        }
        return response(["status"=>false,"message"=>trans('ar.unsuccessful_state')]);

    }

    public function update(){

    }
}
