<?php

namespace App\Http\Controllers;

use App\Models\ActionModel;
use App\Models\Post;
use App\Models\Role;
use Illuminate\Http\Request;
use App;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        parent::$data['active_menu'] = 'role_view';
        parent::$data['route'] = 'Roles';
        parent::$data['name'] = trans("الصلاحيات");
        parent::$data["allowed"] = ["view" => 1, "add" => 2, "edit" => 3, "status" => 4, "delete" => 5];
    }

    public function index()
    {
        parent::getDataCounters();
        parent::$data['roles'] = Role::where("status",1)->get();
        parent::$data['title'] = trans("إدارة الصلاحيات");
        parent::$data["breadcrumbs"][trans("cp.list")] = "";
        return view('user.roles', parent::$data);
    }

    public function getAll(){

        return DataTables::of(Role::all()->where('status',1))
            ->editColumn('status',function ($query){
                if($query->status == 2)
                    return trans('ar.notactive');
                else
                    return trans('ar.active');
            })
            ->addColumn('action',function ($query){
               $link='';
               if(in_array(3,parent::$data["allowedActions"]))
                    $link = $link.'<a href="' . url('Roles/update/'. $query->id . '') . '" class="btn btn-default btn-xs">  تعديل </a>';
               if(in_array(5,parent::$data["allowedActions"]))
                    $link = $link.'<a href="' . url(''.parent::$data["route"].'/delete/' . $query->id .'') . '" class="btn btn-danger btn-xs" id="delete_btn">حذف</a>';
                return $link;
            })

            ->make(true);

    }

    public function changeStatus($id)
    {
//        if (\Request::ajax()) {
//            $role = RoleModel::find($id);
//            if (!$role) {
//                return response(["status" => false, "message" => trans("cp.role_not_found")], 200);
//            }
//
//            if (LookupModel::getKeyById($role->status) == "GENERAL_STATUS_INACTIVE") {
//                $role->status = LookupModel::getIdByKey("GENERAL_STATUS_ACTIVE");
//                $role->save();
//                return response(["status" => true, "message" => trans("cp.activated_successfully")], 200);
//            } else {
//                $role->status = LookupModel::getIdByKey("GENERAL_STATUS_INACTIVE");
//                $role->save();
//                return response(["status" => true, "message" => trans("cp.activated_successfully")], 200);
//            }
//        }
//        return redirect(parent::$data['cp_route_name'] . "/role");
    }

    public function create()
    {
        if(!in_array(2,parent::$data["allowedActions"]))
            return view('error.page-error-403');

        parent::getDataCounters();
        parent::$data['title'] = "اضافة صلاحية جدية";
        parent::$data['creator'] = \Auth::user("admin")->full_name;
        parent::$data['created_at'] = date("Y-m-d");
        parent::$data['actions'] = ActionModel::with("actions")->where("is_active", 1)->where("parent_id", NULL)->orderBy("menu_order", "asc")->get();
        parent::$data['roleActions'] = [];
        parent::$data['isRole'] = true;
        parent::$data['result'] = new Role();
        parent::$data['cp_route_name'] = 'Roles';
        parent::$data['route'] = 'Roles';


        if (\Session::has("success"))
            parent::$data["success"] = \Session::get("success");

        parent::$data["breadcrumbs"][trans("جديد")] = "";
        return view('user.roles_new', parent::$data);
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $val = Role::validateData($request);
            if ($val->fails()) {
                return response(["status" => false, "errors" => $val->messages()], 422);
            }
            $role = new Role();
            $role->name = trim($request->name);
            if (trim($request->status) == 1) {
                $role->status = 1;
            } else {
                $role->status = 2;
            }

            $role->save();
            // for saving actions
            $actions = $request->input("action");
            if ($actions && is_array($actions)) {
                $role->actions()->attach($actions);
            }
            $message = trans("cp.created_successfully");
            return response(["status" => true, "message" => $message, "role" => $role], 201);
        }
        return redirect("Roles/create");
    }

    public function edit($id)
    {
        if(!in_array(3,parent::$data["allowedActions"]))
            return view('error.page-error-403');

        $role = Role::with(["users", "actions"])->find($id);
        if (!$role)
            return redirect("Roles/create");

        parent::getDataCounters();
        parent::$data['title'] = trans("تعديل الصلاحيات");
        parent::$data['created_at'] = date_format(date_create($role->created_at), 'Y-m-d');
        parent::$data['actions'] = ActionModel::with("actions")->where("is_active", 1)->where("parent_id", NULL)->orderBy("menu_order", "asc")->get();
        parent::$data['result'] = $role;
        parent::$data['roleActions'] = $role->actions->pluck("id")->toArray();
        parent::$data['isRole'] = true;
        parent::$data['cp_route_name'] = 'Roles';

        if (\Session::has("success"))
            parent::$data["success"] = \Session::get("success");

       // parent::$data["breadcrumbs"][trans("اعدادات النظام")] = "";
        return view('user.roles_new', parent::$data);
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $val = Role::validateData($request, $id);
            if ($val->fails()) {
                return response(["status" => false, "errors" => $val->messages()], 422);
            }

            $role = Role::with(["actions"])->find($id);
            if (!$role)
                return redirect("Roles");

            $role->name = trim($request->name);
            if ($request->status == 1) {
                $role->status = 1;//LookupModel::getIdByKey("GENERAL_STATUS_ACTIVE");
            } else {
                $role->status = 2;//LookupModel::getIdByKey("GENERAL_STATUS_INACTIVE");
            }

            $role->save();
            // for saving actions
            $actions = $request->input("action");
            $current = $role->actions()->pluck('id')->toArray();
            if ($actions && is_array($actions)) {
                $attach = array_diff($actions, $current);
                $deattach = array_diff($current, $actions);
                if (count($deattach) > 0)
                    $role->actions()->detach($deattach);
                $role->actions()->attach($attach);
            } else {
                $role->actions()->detach($current);
            }

            $message = trans("ar.update_successfully");
            return response(["status" => true, "message" => $message, "role" => $role], 201);
        }
        return redirect(parent::$data["cp_route_name"] . "/" . parent::$data["route"]);
    }

    public function delete($id){
        $role = Role::find($id);
        if(isset($role)){
            $role->delete();
            return response(["status"=>true,"message"=>trans('ar.delete_successfully')]);
        }
        return response(["status"=>true,"message"=>trans('ar.unsuccessful_state'),403]);

    }

    public function usersCount($id)
    {
//        if (\Request::ajax()) {
//            $role = RoleModel::find($id);
//            if (!$role) {
//                return response(['status' => false, "message" => trans("cp.role_not_found")], 200);
//            }
//
//            return response(["status" => true, "usersCount" => $role->users()->count()], 200);
//        }
//        return redirect(parent::$data['cp_route_name'] . "/role");
    }

    public function validateInput(Request $request, $id = 0)
    {
//        if ($request->ajax()) {
//            $rules = [
//                'name' => "unique:role,name," . $id
//            ];
//
//            $val = \Validator::make($request->all(), $rules);
//            if ($val->fails()) {
//                return response(["status" => false, "message" => $val->messages()], 200);
//            }
//
//            return response(["status" => true], 200);
//        }
//
//        return redirect(parent::$data['cp_route_name'] . "/" . parent::$data["route"]);
    }
}
