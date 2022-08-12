<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Jeha;
use App\Models\Post;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DepartmentController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        parent::$data['title'] = ' ادارة الاقسام ';
        parent::$data['route']='Department';
        parent::$data["breadcrumb"]="اعدادات النظام";

//        parent::$data["breadcrumb"]="معاملاتي";

    }

    public function index($id){

        parent::getDataCounters();

            $jeha=Jeha::find($id);

            if(isset($jeha)){
                parent::$data['jeha_id']=$id;
                parent::$data['jeha_name']=$jeha->name;
            }

        $allJeha=Jeha::all();
        parent::$data["allJeha"]=$allJeha;
        parent::$data["myNewWared"]=Post::myNewWared();


        return view('constants.Department',parent::$data);

    }

    public function store(Request $request){
        if($request->ajax()){

            $val = Department::validateData($request);

            if ($val->fails())
                return response( $val->errors(), 401);

            $name=$request->get('name');
            $status =$request->get('status');
            $jeha_id=$request->get('jeha_id');

            $obj=new Department();
            $obj->saveData($name,$status,$jeha_id);

            $message = trans("ar.created_successfully");
            return response(["status" => true, "message" => $message], 201);

        }

    }

    public function getAll($id){

        parent::$data["breadcrumb"]="اعدادات النظام";
        parent::getDataCounters();

        $jeha=Jeha::find($id);

        if(isset($jeha))
        {
            parent::$data['jeha_id']=$id;
            parent::$data['jeha_name']=$jeha->name;


            return DataTables::of(Department::where('jeha_id',$id))
                ->editColumn('status',function ($query){
                    if($query->status == 2)
                        return trans('ar.notactive');
                    else
                        return trans('ar.active');
                })
                ->addColumn('action',function ($query){
                    $link ='<a href="#edit_modal" data-toggle="modal" pull-link="' . url(parent::$data["route"].'/' . $query->id . '/edit') . '" class="btn btn-success btn-xs" id="edit_btn">تعديل</a>'
                        .'<a href="' . url(''.parent::$data["route"].'/delete/' . $query->id .'') . '" class="btn btn-danger btn-xs" id="delete_btn">حذف</a>';
                    return $link;
                })

                ->make(true);
        }

    }

    public function delete($id){

        $obj=Department::find($id);
        if(isset($obj)){
            $obj->delete();
            return response(['status'=>true,'message'=>trans('ar.delete_successfully'),201]);
        }
        return response(["status"=>false,"message"=>trans('ar.unsuccessful_state'),401]);
    }

    public function edit($id){

        $obj=Department::find($id);
        if(isset($obj)){

            return response(['status'=>true,'items'=>$obj]);
        }
        return response(["status"=>false,"message"=>trans('ar.unsuccessful_state'),401]);

    }

    public function update(Request $request,$id)
    {
        if ($request->ajax()) {
            $val = Department::validateData($request);

            if ($val->fails())
                return response( $val->errors(), 401);

            $name = $request->get('name');
            $status = $request->get('status');

            $obj = Department::find($id);
            $obj->name = $name;
            $obj->status = $status;
            $obj->jeha_id = $request->get('select_jeha');
            if ($obj->save()) {
                return response(["status" => true, "message" => trans("ar.update_successfully")], 201);
            } else return response(["status" => false, "errors" => "hello"]);

        }
    }

    public function getDept($id){

        parent::$data["breadcrumb"]="اعدادات النظام";
        parent::getDataCounters();

        $depts=Department::where('jeha_id',$id)->get();
//        var_dump($depts);die;
        if(isset($depts))
            return response(['status'=>true,'message'=>'success','items'=>$depts]);

    }
}
