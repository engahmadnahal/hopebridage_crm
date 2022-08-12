<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\State;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RegionController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        parent::$data['title']='ادارة المناطق';
        parent::$data["breadcrumb"]="الاعدادات";
        parent::$data["page_name"]='منطقة';
        parent::$data["route"]='Region';
        parent::$data["perm"]=15;
    }

    public function index(){

        parent::getDataCounters();

        if(!in_array(14,parent::$data["allowedActions"]))
            return view('error.page-error-403');
        parent::$data['States']=State::where('status',1)->get();

        return view('constants.region',parent::$data);

    }

    public function store(Request $request){
        if($request->ajax()){

            $val = Region::validateData($request);

            if ($val->fails())
                return response( $val->errors(), 401);

            $name=$request->get('name');
            $values=$request->get('values');
            $state=$request->get('state_id');
            $status =$request->get('status');

            $obj=new Region();
            $obj->saveData($name,$status,$state,$values);

            $message = trans("ar.created_successfully");
            return response(["status" => true, "message" => $message], 201);

        }

    }

    public function getAll(){

        return DataTables::of(Region::with('state'))
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

        $obj=Region::find($id);
        if(isset($obj)){
            $obj->delete();
            return response(['status'=>true,'message'=>trans('ar.delete_successfully'),201]);
        }
        return response(["status"=>false,"message"=>trans('ar.unsuccessful_state'),401]);
    }

    public function edit($id){

        $obj=Region::find($id);
        if(isset($obj)){

            return response(['status'=>true,'items'=>$obj]);
        }
        return response(["status"=>false,"message"=>trans('ar.unsuccessful_state'),401]);

    }

    public function update(Request $request,$id)
    {

        if ($request->ajax()) {
            $val = Region::validateData($request);

            if ($val->fails())
                return response( $val->errors(), 401);

            $obj = Region::find($id);

            $name=$request->get('name');
            $values=$request->get('values');
            $state=$request->get('state_id');
            $status =$request->get('status');

            if($obj->saveData($name,$status,$state,$values))
                return response(["status" => true, "message" => trans("ar.update_successfully")], 201);
            else return response(["status" => false, "errors" => "hello"]);

        }
    }

    public function getRegion($id){
        $regions = Region::where('state_id',$id)->get();

        return response(["status"=>true,"message"=>"successful","items"=>$regions]);
    }

}
