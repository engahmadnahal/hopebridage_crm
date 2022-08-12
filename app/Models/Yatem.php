<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Yatem extends Model
{
    use SoftDeletes;

    public static function validateData($request)
    {
        $rules = [
            'project_id' => "required",
        ];

        $msg = [
            'project_id.required'=> 'حقل المشروع مطلوب',
        ];

        return \Validator::make($request->all(), $rules,$msg);
    }

    public function saveData($child_id,$customer_id,$project_id,$salary,$currency,$start_dt,$end_dt,$bank,$note,$status)
    {

        $this->child_id=$child_id;
        $this->customer_id=$customer_id;
        $this->project_id=$project_id;
        $this->salary=$salary;
        $this->currency=$currency;
        $this->start_dt=$start_dt;
        $this->end_dt=$end_dt;
        $this->bank=$bank;
        $this->note=$note;
        $this->status=$status;
        $this->user_id=auth()->user()->id;

        if($this->save())
             return true;
    }


    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }

    public function customer(){
        return $this->belongsTo(Orphan::class,'customer_id');
    }

    public function Child(){
        return $this->belongsTo(OrphanFamily::class,'child_id');
    }

    public function getRegion()
    {
        return $this->belongsTo(Region::class, 'region_id');

    }
}
