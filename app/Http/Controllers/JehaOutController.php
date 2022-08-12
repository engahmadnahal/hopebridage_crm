<?php

namespace App\Http\Controllers;

use App\Models\Jeha;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JehaOutController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        parent::$data['title'] = ' ادارة الجهات الخارجية';
        parent::$data['route']='JehaOut';

    }

    public function index(){

        parent::getDataCounters();
        return view('constants.JehaOut',parent::$data);

    }

    public function store(Request $request){
        //  var_dump($request->all());die;
        if($request->ajax()){

            $val = Jeha::validateData($request);

            if ($val->fails())
                // return response(["status" => false, "errors" => $val->messages()], 422);
                return response( $val->errors(), 401);

            $name=$request->get('name');
            $status =$request->get('status');

            $obj=new JehaOut();
            $obj->saveData($name,$status);

            $message = trans("ar.created_successfully");
            return response(["status" => true, "message" => $message], 201);

        }


    }

    public function getAll(){

        return DataTables::of(JehaOut::all())
            ->editColumn('status',function ($query){
                if($query->status == 2)
                    return trans('ar.notactive');
                else
                    return trans('ar.active');
            })
            ->addColumn('action',function ($query){
                $link = '<a href="#edit_modal" data-toggle="modal" pull-link="' . url(parent::$data["route"].'/' . $query->id . '/edit') . '" class="btn btn-success btn-xs" id="edit_btn">تعديل</a>
                <a href="' . url(''.parent::$data["route"].'/delete/' . $query->id .'') . '" class="btn btn-danger btn-xs" id="delete_btn">حذف</a>';
                return $link;
            })

            ->make(true);

    }

    public function delete($id){
        $obj=JehaOut::find($id);
        if(isset($obj)){
            $obj->delete();
            return response(['status'=>true,'message'=>trans('ar.delete_successfully'),201]);
        }
        return response(["status"=>false,"message"=>trans('ar.unsuccessful_state'),401]);
    }

    public function edit($id){

        $obj=JehaOut::find($id);
        if(isset($obj)){

            return response(['status'=>true,'items'=>$obj]);
        }
        return response(["status"=>false,"message"=>trans('ar.unsuccessful_state'),401]);

    }

    public function update(Request $request,$id)
    {

        if ($request->ajax()) {
            $val = JehaOut::validateData($request);

            if ($val->fails())
                return response( $val->errors(), 401);
            // return response(["status" => false, "errors" => $val->messages()], 422);

            $name = $request->get('name');
            $status = $request->get('status');

            $obj = JehaOut::find($id);
            $obj->name = $name;
            $obj->status = $status;
            if ($obj->save()) {
                return response(["status" => true, "message" => trans("ar.update_successfully")], 201);
            } else return response(["status" => false, "errors" => "hello"]);
            //$obj->saveData($name,$status);
        }
    }
}
