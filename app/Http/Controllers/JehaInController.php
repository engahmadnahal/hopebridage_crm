<?php

namespace App\Http\Controllers;

use App\Models\Jeha;
use App\Models\Post;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JehaInController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        parent::$data['title'] = ' ادارة الافرع والادارات الداخلية ';
        parent::$data['route']='Jeha';

    }

    public function addjehaIn(){
        if(!in_array(107,parent::$data["allowedActions"]))
            return view('error.page-error-403');

        parent::$data['title'] = ' ادارة الافرع والادارات الداخلية ';
//        parent::$data['route'] = 'route';
        parent::getDataCounters();
        parent::$data["main_tree"]=$this->treeView(NULL);

        return view('constants.JehaIn',parent::$data);

    }

    public function addjehaOut(){
        if(!in_array(111,parent::$data["allowedActions"]))
            return view('error.page-error-403');

        parent::$data['title'] = ' ادارة الجهات الخارجية ';
        parent::getDataCounters();

        return view('constants.JehaOut',parent::$data);

    }

    public function store(Request $request){
        //  var_dump($request->all());die;
        if($request->ajax()){

            if((!in_array(109,parent::$data["allowedActions"])) && (!in_array(117,parent::$data["allowedActions"])) )
                return response(["status"=>false,"message"=>trans('ar.not_allowed'),403]);

            $val = Jeha::validateData($request);

            if ($val->fails())
                // return response(["status" => false, "errors" => $val->messages()], 422);
                return response( $val->errors(), 401);

            $name=$request->get('name');
            $status =$request->get('status');
            $type =$request->get('type');
            $jeha_refereds=$request->jehas_refer;

            if(isset($jeha_refereds)) {


                $count = count($jeha_refereds);


                if ($count > 1){
                    return response(["status" => true, "message" => 'يجب تحديد ادارة واحدة فقط'], 401);
                }
                $parent_id = $jeha_refereds[0];
            }

            else
                $parent_id=NULL;

            $obj=new Jeha();
            $obj->saveData($name,$status,$type,$parent_id);

            $message = trans("ar.created_successfully");
            return response(["status" => true, "message" => $message], 201);

        }


    }

    public function getAllIn(){

    return DataTables::of(Jeha::all()->where('type',1))
        ->editColumn('status',function ($query){
            if($query->status == 2)
                return trans('ar.notactive');
            else
                return trans('ar.active');
        })
        ->addColumn('action',function ($query){
            $link='';

            if(in_array(110,parent::$data["allowedActions"]))

                $link = $link.'<a href="#edit_modal" data-toggle="modal" pull-link="' . url(parent::$data["route"].'/' . $query->id . '/edit') . '" class="btn btn-success btn-xs" id="edit_btn">تعديل</a>';
            if(in_array(127,parent::$data["allowedActions"]))

                $link = $link.'<a href="' . url(''.parent::$data["route"].'/delete/' . $query->id .'') . '" class="btn btn-danger btn-xs" id="delete_btn">حذف</a>';

            return $link;
        })

        ->make(true);

}

    public function getAllOut(){

        return DataTables::of(Jeha::all()->where('type',2))

            ->editColumn('status',function ($query){
                if($query->status == 2)
                    return trans('ar.notactive');
                else
                    return trans('ar.active');
            })
            ->addColumn('action',function ($query){
                $link='';
                if(in_array(118,parent::$data["allowedActions"]))
                $link = $link .'<a href="#edit_modal" data-toggle="modal" pull-link="' . url(parent::$data["route"].'/' . $query->id . '/edit') . '" class="btn btn-success btn-xs" id="edit_btn">تعديل</a>';

                if(in_array(128,parent::$data["allowedActions"]))
                    $link = $link .'<a href="' . url(''.parent::$data["route"].'/delete/' . $query->id .'') . '" class="btn btn-danger btn-xs" id="delete_btn">حذف</a>';

                return $link;
            })

            ->make(true);

    }

    public function delete($id){

        $obj=Jeha::find($id);
        if(isset($obj)){
            $obj->delete();
            return response(['status'=>true,'message'=>trans('ar.delete_successfully'),201]);
        }
        return response(["status"=>false,"message"=>trans('ar.unsuccessful_state'),401]);
    }

    public function edit($id){

        $obj=Jeha::find($id);
        if(isset($obj)){

            return response(['status'=>true,'items'=>$obj]);
        }
        return response(["status"=>false,"message"=>trans('ar.unsuccessful_state'),401]);

    }

    public function update(Request $request,$id)
    {

        if ($request->ajax()) {
            $val = Jeha::validateData($request);

            if ($val->fails())
                return response( $val->errors(), 401);
            // return response(["status" => false, "errors" => $val->messages()], 422);

            $name = $request->get('name');
            $status = $request->get('status');

            $obj = Jeha::find($id);
            $obj->name = $name;
            $obj->status = $status;
            if ($obj->save()) {
                return response(["status" => true, "message" => trans("ar.update_successfully")], 201);
            } else return response(["status" => false, "errors" => "hello"]);
            //$obj->saveData($name,$status);
        }
    }

    public function getJeha(){

        $obj_in =Jeha::where('type',1)->get();
        $obj_out=Jeha::where('type',2)->get();
        $obj_all=Jeha::all();

        if(isset($obj_all))
            return response(["status"=>true,"message"=>trans('ar.successful'),'items_in'=>$obj_in
                ,'items_out'=>$obj_out ,'items_all'=>$obj_all
            ]);

    }

    public function getJehaOut(){

        $obj=Jeha::where('type',2)->get();
        if(isset($obj))
            return response(["status"=>true,"message"=>trans('ar.successful'),'items'=>$obj
            ]);

    }

    public function getMainJeha(){
        $main_jeha =Jeha::where('type',1)
            ->where('parent_id',NULL)->get();

        if(isset($main_jeha))
            return response(["status"=>true,"message"=>trans('ar.successful'),'main_jeha'=>$main_jeha]);
    }

//    public function getJehaChild($id){
//        $childs =Jeha::where('parent_id',$id)->get();
//            foreach ($childs as $child ){
//           $mm[]=['id'=>$child->id , 'name'=>$child->name];
//             if(count($child->childs)){
//                $mm[]=$this->getChild($child);
//             }
//            }
//        return response(['status'=>true,'message'=>'success','items'=>$mm]);
////            foreach ($childs as $child ){
////                if(count($child->childs)){
////                    $childs[] = $this->getChild($child);
////                }
////            } return $childs;
//    }
//    public function getChild($child)
//    {
//        foreach ($child->childs as $ch) {
//            if (count($ch->childs)) {
//                $m[]=['id'=>$ch->id , 'name'=>$ch->name];
//                $m[] = $this->getChild($ch);
//            } else {
//                $m[]=['id'=>$ch->id , 'name'=>$ch->name];
//            }
//        }
// // var_dump($m);die;
//        return $m;
////        foreach ($child->childs as $ch) {
////            if (count($ch->childs)) {
////                $mychild[] = $this->getChild($ch);
////            } else { $mychild[] = $ch; }
////        }        return $mychild;
//    }
//
//

    public function getJehaChild($id){
        $Categorys = Jeha::where('parent_id',$id)->get();
        $tree='';
        foreach ($Categorys as $Category) {
            $tree .='<option value="'.$Category->id.'">'.$Category->name.'</option>';
            if(count($Category->childs)) {
                $tree .=$this->getchild($Category);
            }
        }

        return response(['status'=>true,'message'=>'success','items'=>$tree]);
    }
    public function getchild($Category){
        $html ='';
        foreach ($Category->childs as $arr) {
            if(count($arr->childs)){
                $html .='<option value="'.$arr->id.'"> -- '.$arr->name.'</option>';
                $html.= $this->getchild($arr);
            }else{
                $html .='<option value="'.$arr->id.'"> ---- '.$arr->name.'</option>';
            }

        }
        return $html;
    }


}
