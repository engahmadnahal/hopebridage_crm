<?php

namespace App\Http\Controllers;

use App\Models\HouseType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HouseTypeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        parent::$data['title']='ادارة انواع المسكن';
        parent::$data["breadcrumb"]="الاعدادات";
        parent::$data["page_name"]='نوع مسكن';
        parent::$data["route"]='HouseType';
        parent::$data["perm"]=15;
    }

    public function index(){

        parent::getDataCounters();

        if(!in_array(14,parent::$data["allowedActions"]))
            return view('error.page-error-403');

        parent::getDataCounters();
        return view('constants.constant',parent::$data);

    }

    public function store(Request $request){
        if($request->ajax()){

            $val = HouseType::validateData($request);

            if ($val->fails())
                return response( $val->errors(), 401);

            $name=$request->get('name');
            $values=$request->get('values');
            $status =$request->get('status');

            $obj=new HouseType();
            $obj->saveData($name,$status,$values);

            $message = trans("ar.created_successfully");
            return response(["status" => true, "message" => $message], 201);

        }

    }

    public function getAll(){

        return DataTables::of(HouseType::all())
            ->editColumn('status',function ($query){
                if($query->status == 2)
                    return trans('ar.notactive');
                else
                    return trans('ar.active');
            })
            ->addColumn('action',function ($query){
                $link='';
                if(in_array(16,parent::$data["allowedActions"]))
                    $link =$link.'<a href="#edit_modal" data-toggle="modal" pull-link="' . url(parent::$data["route"].'/' . $query->id . '/edit') . '" class="btn btn-success btn-xs" id="edit_btn" title="تعديل"><i class="fa fa-edit"></i> </a>';
                if(in_array(17,parent::$data["allowedActions"]))
                    $link =$link.'<a href="' . url(''.parent::$data["route"].'/delete/' . $query->id .'') . '" class="btn btn-danger btn-xs" id="delete_btn" title="حذف"><i class="fa fa-trash"></i> </a>';
                return $link;
            })

            ->make(true);

    }

    public function delete($id){

        $obj=HouseType::find($id);
        if(isset($obj)){
            $obj->delete();
            return response(['status'=>true,'message'=>trans('ar.delete_successfully'),201]);
        }
        return response(["status"=>false,"message"=>trans('ar.unsuccessful_state'),401]);
    }

    public function edit($id){

        $obj=HouseType::find($id);
        if(isset($obj)){

            return response(['status'=>true,'items'=>$obj]);
        }
        return response(["status"=>false,"message"=>trans('ar.unsuccessful_state'),401]);

    }

    public function update(Request $request,$id)
    {

        if ($request->ajax()) {
            $val = HouseType::validateData($request);

            if ($val->fails())
                return response( $val->errors(), 401);

            $obj = HouseType::find($id);

            $name=$request->get('name');
            $values=$request->get('values');
            $status =$request->get('status');

            if($obj->saveData($name,$status,$values))
                return response(["status" => true, "message" => trans("ar.update_successfully")], 201);
            else return response(["status" => false, "errors" => "hello"]);

        }
    }

}
