<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrphanSponser extends Model
{
//    use SoftDeletes;

    public function orphan(){
        return $this->belongsTo(Orphan::class,'orphan_id');
    }

    public function sponser(){
        return $this->belongsTo(ProjectSponser::class,'sponser_id');
    }
}
