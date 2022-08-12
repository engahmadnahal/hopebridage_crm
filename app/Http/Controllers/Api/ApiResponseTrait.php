<?php 


namespace App\Http\Controllers\Api;



trait ApiResponseTrait{



    public function apiResponse($data = null , $error = null , $code = 200)
    {
        $array = [

            'data' => $data ,
            'status' => in_array($code ,$this->successCode())? true : false , // if $code in this array , return his value
            'error' => $error
        ];
        return response($array, $code);

    }


    public function successCode()
    {
        return [
            200,201,202
        ];
    }

}
