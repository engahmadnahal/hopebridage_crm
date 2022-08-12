<?php

namespace App\Http\Controllers;

use App\Models\PostJeha;
use App\Models\PostUser;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {

        parent::__construct();

    }

    public function setAuth()
    {
        $user = \Auth::user();
        $this->user=$user;

//        if (!\Request::ajax() && $user)
//            self::$data["menuActions"] = ActionModel::getMenu($user->id);

       // if ($user) {
            $user->load(["role.actions"]);
            parent::$data["allowedActions"] = $user->role->actions->pluck("id")->toArray();
            parent::$data["g_user_id"]=$user->id;
            parent::$data["g_department"]=$user->department_id;
            parent::$data["g_is_maneger"]=$user->is_maneger;
            // parent::$data["allowedActions"] = $user1->getAllowedActions();
            // dd(parent::$data["allowedActions"]);DIE;
            parent::$data["actionListAuth"] = $user->getUserActions();
            parent::$data["login_user"] = $user;
          //  dd(parent::$data);die;
      //  }
    }

//    public function myOnDoing()
//    {
//        if( parent::$data["g_is_maneger"] == 1)
//            return PostJeha::all()->where('status_id', '2')->where('jeha_id',self::$data["g_department"])->count();
//        else
//            return PostUser::all()->where('status_id', '2')->where('user_id', self::$data["g_user_id"])->count();
//    }
}
