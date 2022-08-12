<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrphanIncome extends Model
{
//    use SoftDeletes;
    protected $table = 'orphan_incomes';

    protected $fillable=['income_source','income_amount','income_side'];
}