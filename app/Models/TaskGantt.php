<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskGantt extends Model
{
    //
        protected $appends = ["open"];
 
    public function getOpenAttribute(){
        return true;
    }
}
