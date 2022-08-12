<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerNeed extends Model
{
//    use SoftDeletes;
    protected $table = 'customer_needs';
    public $timestamps=false;

    protected $fillable=['need','description','count'];
}
