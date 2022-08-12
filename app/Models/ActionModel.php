<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActionModel extends Model
{
    protected $table = 'actions';
    public function actions()
    {
        return $this->hasMany(ActionModel::class, "parent_id");
    }

//    public function countActionsMenu()
//    {
//        return $this->hasOne(ActionModel::class, "menu_parent_id")
//            ->select(["id", "menu_parent_id", \DB::raw("count(*) as actionsNo")])
//            ->where("is_menu", 1)->where("is_active", 1)->orderBy("menu_order", "asc")
//            ->groupBy("menu_parent_id", "id","menu_order");
//    }
//
//    public function countActions()
//    {
//        return $this->hasOne(ActionModel::class, "parent_id")
//            ->select(["id", "parent_id", \DB::raw("count(*) as actionsNo")])
//            ->where("is_menu", 1)->where("is_active", 1)->orderBy("menu_order", "asc")
//            ->groupBy("menu_parent_id");
//    }

    public function actionsMenu()
    {
        return $this->hasMany(ActionModel::class, "menu_parent_id");
    }

    public function routes()
    {
        return $this->hasMany(ActionRouteModel::class, "action_id");
    }

    public function route()
    {
        return $this->hasOne(ActionRouteModel::class, "action_id")->orderBy("id", "asc")->limit(1);
    }

    public function roles()
    {
        return $this->belongsToMany(RoleModel::class, "role_actions", "action_id", "role_id");
    }

    public static function getMenu($user_id)
    {
        return self::with(["routes", "actionsMenu.routes", "countActionsMenu", "actionsMenu.countActionsMenu" => function ($q) {
            $q->where("is_menu", 1)
                ->where("is_active", 1)
                ->orderBy("menu_order", "asc");
        }, "roles.users" => function ($q) use ($user_id) {
            $q->where("id", $user_id);
        }])
            ->whereNull("parent_id")
            ->where("is_menu", 1)
            ->where("is_active", 1)
            ->orderBy("menu_order", "asc")
            ->get();
    }
}

