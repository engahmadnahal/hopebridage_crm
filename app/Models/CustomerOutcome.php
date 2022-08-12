<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerOutcome extends Model
{
//    use SoftDeletes;
    protected $table = 'customer_outcomes';

    protected $fillable=['outcome_id','amount'];
}
