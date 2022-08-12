<?php

namespace App\Http\Controllers;

use App\Models\ProjectSponser;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProjectSponserController extends AdminController
{
    //
    public function __construct()
    {
        parent::__construct();


        parent::$data['title'] = ' ادارة ممولين المشاريع';
        parent::$data['route']='ProjectSponser';
        parent::$data["breadcrumb"]="الاعدادات";
    }

    public function index(){

        parent::getDataCounters();

        if(!in_array(10,parent::$data["allowedActions"]))
            return view('error.page-error-403');

        parent::getDataCounters();
        return view('constants.projectsponser',parent::$data);

    }

    public function store(Request $request){
        //  var_dump($request->all());die;
        if($request->ajax()){

            $val = ProjectSponser::validateData($request);

            if ($val->fails())
                return response( $val->errors(), 401);

            $name=$request->get('name');
            $mobile=$request->get('mobile');
            $address=$request->get('address');
            $status =$request->get('status');

            $obj=new ProjectSponser();
            $obj->saveData($name,$status,$address,$mobile);

            $message = trans("ar.created_successfully");
            return response(["status" => true, "message" => $message], 201);

        }


    }

    public function getAll(){

      //  parent::$data["allowedActions"] = auth()->user()->role->actions->pluck("id")->toArray();

        return DataTables::of(ProjectSponser::all())
            ->editColumn('status',function ($query){
                if($query->status == 2)
                    return trans('ar.notactive');
                else
                    return trans('ar.active');
            })
            ->addColumn('action',function ($query){
                $link='';
                if(in_array(12,parent::$data["allowedActions"]))
                    $link =$link.'<a href="#edit_modal" data-toggle="modal" pull-link="' . url(parent::$data["route"].'/' . $query->id . '/edit') . '" class="btn btn-success btn-xs" id="edit_btn">تعديل</a>';
                if(in_array(13,parent::$data["allowedActions"]))
                    $link =$link.'<a href="' . url(''.parent::$data["route"].'/delete/' . $query->id .'') . '" class="btn btn-danger btn-xs" id="delete_btn">حذف</a>';
                return $link;
            })

            ->make(true);

    }

    public function delete($id){

        $obj=ProjectSponser::find($id);
        if(isset($obj)){
            $obj->delete();
            return response(['status'=>true,'message'=>trans('ar.delete_successfully'),201]);
        }
        return response(["status"=>false,"message"=>trans('ar.unsuccessful_state'),401]);
    }

    public function edit($id){

        $obj=ProjectSponser::find($id);
        if(isset($obj)){

            return response(['status'=>true,'items'=>$obj]);
        }
        return response(["status"=>false,"message"=>trans('ar.unsuccessful_state'),401]);

    }

    public function update(Request $request,$id)
    {

        if ($request->ajax()) {
            $val = ProjectSponser::validateData($request);

            if ($val->fails())
                return response( $val->errors(), 401);

            $obj = ProjectSponser::find($id);

            $name=$request->get('name');
            $mobile=$request->get('mobile');
            $address=$request->get('address');
            $status =$request->get('status');

            if($obj->saveData($name,$status,$address,$mobile))
                  return response(["status" => true, "message" => trans("ar.update_successfully")], 201);
             else return response(["status" => false, "errors" => "hello"]);

        }
    }
}
