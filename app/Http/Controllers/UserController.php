<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Family;
use App\Models\Jeha;
use App\Models\Post;
use App\Models\PostType;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\DataTables\UserDataTable;


class UserController extends AdminController
{
    public function __construct()
    {
        parent::__construct();

        parent::$data['title']='ادارة المستخدمين';
        parent::$data['route']='User';
    }

    public function index(){

        parent::$data['title']='اضافة مستخدم جديد';
        parent::getDataCounters();
        parent::$data['perm']=10;
        parent::$data['page_name']='مستخدم';
        parent::$data['roles']=Role::where('status','1')->get();

        return view("user.user",parent::$data);
    }

    public function testUser(UserDataTable $dataTable){
        parent::getDataCounters();
        return $dataTable->render('user.users',parent::$data);
    }

    public function store(Request $request){

        $val = User::validateData($request);
        if($val->fails())
            return response( $val->errors(), 401);

        $name=$request->get('name');
        $username=$request->get('username');
        $status=$request->get('status');
        $pass=$request->get('password');
        $email=$request->get('email');
        $role=$request->get('role');

        $obj=new User();
        $sa=$obj->saveData($name,$username,$status,$pass,$email,$role);

        $message = trans("ar.created_successfully");
        return response(['status'=>true,'message'=>$message,201,'data'=>$sa]);

    }

    public function getAll(){
         //   parent::$data['jeha_name']=$jeha->name;
            return DataTables::of(User::with('Role'))
                ->editColumn('is_active',function ($query){
                    if($query->is_active == 2)
                        return trans('ar.notactive');
                    else
                        return trans('ar.active');
                })
                ->addColumn('action',function ($query){
                    $link='';
                    if(in_array(8,parent::$data["allowedActions"]))
                    $link =$link.'<a href="#edit_modal" data-toggle="modal" pull-link="' . url(parent::$data["route"].'/' . $query->id . '/edit') . '" class="btn btn-default btn-xs" title="تعديل المستخدم" id="edit_btn"><i class="fa fa-edit"> </i></a>';
                    if(in_array(9,parent::$data["allowedActions"]))
                        $link =$link.'<a href="' . url(''.parent::$data["route"].'/delete/' . $query->id .'') . '" class="btn btn-danger btn-xs" title="حذف المستخدم" id="delete_btn"><i class="fa fa-trash"> </i></a>';
                    return $link;
                })
                ->make(true);
        }

        public function getJehaUsers($id){
            $jeha = Jeha::find($id);
            if(isset($jeha)){
                $users = User::where('jeha_id',$id)
                     ->where('is_maneger',NULL) // لا تعرض المدراء
                     ->get();
                return response(["status"=>true , "message"=>"success","items"=>$users]);
            }

        }

        public function logout(){

            auth()->guard()->logout();
            return redirect('/');
        }

    public function delete($id){

        if(!in_array(9,parent::$data["allowedActions"]))
            return view('error.page-error-403');

        $user = User::find($id);

        if(isset($user)){
            $user->update([
                'is_active' => 2
            ]);
//            $families = Family::where('user_id',$id)->get();
//            if($families){
//                \DB::table('families')->where('user_id', $id)->update(['user_id' => '2']);
//            }
//
//            \DB::table('user_logins')->where('user_id', $id)->delete();
//            $user->delete();
            return response(["status"=>true,"message"=>trans('ar.delete_successfully'),200]);
        }
    }

    public function edit($id){
        $user = User::find($id);
        if(isset($user))
            return response(["status"=>true,"message"=>"true","items"=>$user]);
        else
            return response(["status"=>false,"message"=>trans('ar.unsuccessful_state')]);
    }

    public function update(Request $request){

        $obj=User::find($request->get('id_up'));
        $val = User::validateDataUpdate($request,$obj);
        if($val->fails())
            return response(['status'=>false,'message'=>$val->errors(),401]);


        $name=$request->get('name');
        $username=$request->get('username');
        $status=$request->get('status');
        $pass=$request->get('password');
        $email=$request->get('email');
        $role=$request->get('role');

        $sa=$obj->saveData($name,$username,$status,$pass,$email,$role);

        $message = trans("ar.created_successfully");
        return response(['status'=>true,'message'=>$message,201]);

    }


}
