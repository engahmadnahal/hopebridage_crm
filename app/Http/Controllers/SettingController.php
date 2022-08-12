<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function index(){

        if(!in_array(86,parent::$data["allowedActions"]))
            return view('error.page-error-403');

        parent::$data["title"]="تعديل اعدادات النظام";
        parent::$data["route"]="setting";
        parent::getDataCounters();


        $setting = Setting::find(1);
        parent::$data['data']=$setting;
        return view('constants.setting',parent::$data);
    }

    public function store(Request $request)
    {
        if(!in_array(86,parent::$data["allowedActions"]))
            return view('error.page-error-403');

        $val = Setting::validateData($request);
        if ($val->fails())
            // return response(["status" => false, "errors" => $val->messages()], 422);
            return response( $val->errors(), 401);

        $data['name'] = $request->get('name');
        $data['sys_name'] = $request['sys_name'];
        $data['address'] = $request['address'];
        $data['mobile'] = $request['mobile'];
        $data['phone'] = $request['phone'];
        $data['site'] = $request['site'];
        $data['email'] = $request['email'];

        $file = $request->file('file');
        if (isset($file)) {

        $extension = $file->getClientOriginalExtension();
        $imageName = time();
        $image_name = $imageName . '.' . $extension;

        $file->move('uploads/news', $image_name);
        $file1 = base_path() . '/../public_html/uploads/news/' . $image_name;
        Image::make($file1)->resize(100, 75)->save(base_path('/../public_html/uploads/news/sub/' . $image_name));
        $data['img_name'] = $image_name;
         }
        $obj = Setting::find(1);
        if($obj->saveData($data))

               return response(['status'=>true,'message'=>trans('ar.created_successfully'),'data'=>$data]);

        return response(['status'=>false,'message'=>trans('ar.unsuccessful_state'),'data'=>$data]);


    }
}
