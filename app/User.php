<?php

namespace App;

use App\Models\Department;
use App\Models\Jeha;
use App\Models\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function validateData($request)
    {
        $rules = [
            'name' => "required",
            'status' => "required",
            'username' => "required|unique:users",
            'password' => "required|min:6|confirmed"
        ];

        $msg = [
            'name.required'=> ' الاسم مطلوب',
            'status.required'=> ' الحالة مطلوبة',
            'username.required'=> ' اسم المستخدم مطلوب',
            'username.unique'=> 'يوجد اسم مستخدم بهذا الاسم',
            'password.required'=> 'كلمة المرور مطلوبة',
            'password.min'=> 'اختر كلمة مرور تتكون من 6 احرف على الاقل ',
            'password.confirmed'=> 'كلمة المرور غير متطابقة ',
        ];

        return \Validator::make($request->all(), $rules,$msg);
    }

    public static function validateDataUpdate($request,$obj="")
    {
        $rules = [
            'name' => "required",
            'status' => "required",
            'username' => "required|unique:users,username,".($obj ? $obj->id :""),
        ];

        $msg = [
            'name.required'=> ' الاسم مطلوب',
            'status.required'=> ' الحالة مطلوبة',
            'username.required'=> ' اسم المستخدم مطلوب',
            'username.unique'=> 'يوجد اسم مستخدم بهذا الاسم',
        ];

        return \Validator::make($request->all(), $rules,$msg);
    }

    public function saveData($name,$username,$status,$pass,$email,$role){

        $this->name=$name;
        $this->username=$username;
        $this->is_active=$status;
        if($pass<>"")
            $this->password=bcrypt($pass);
        $this->email=$email;
        $this->role_id=$role;

        $this->save();

        return $this;
    }

    public function role()
    {
        return $this->belongsTo(Role::class, "role_id");
    }

    public function getUserActions()
    {
        return self::with(["role.actions" => function ($q) {
            $q->where("parent_id", "<", 1)->where("is_menu", 1)->where("is_active", 1)->orderBy("menu_order", "asc");
        }, "role.actions.actions" => function ($q) {
            $q->where("is_menu", 1)->where("is_active", 1)->orderBy("menu_order", "asc");
        }, "role.actions.routes"])->where("id", $this->id)->first();
    }



    public function myAllowedActions()
    {
     //   return self::with(["role.actions"])->pluck("id")->toArray();
      //  return self::with(["role"])->pluck("id")->toArray();

        return self::with(['role.actions' => function ($q) {
            $q->where('role_id',$this->role_id);
    }])->get();//pluck("action_id")->toArray();


    }
    public function getAllowedActions()
    {
        return self::with(["actions" => function ($q) {
            $q->select(["id as action_id", "name"]);
        }])->where("id", $this->id)->pluck("action_id")->toArray();
    }

    public static function updateLoginInfo($id, $last_login, $last_ip)
    {
        return self::where('id', $id)
            ->update([
                'last_login' => $last_login,
                'last_ip' => $last_ip
            ]);
    }


}
