<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrphanNeed extends Model
{
//    use SoftDeletes;
    protected $table = 'orphan_needs';
    public $timestamps=false;

    protected $fillable=['need','description','count'];
}
