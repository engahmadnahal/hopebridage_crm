<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{

    public function saveData($user , $login_date , $ip){


        $this->user_id =$user;
        $this->login_date= $login_date;
        $this->ip=$ip;
        $this->save();
    }

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
}
