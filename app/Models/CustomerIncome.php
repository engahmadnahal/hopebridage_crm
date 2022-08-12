<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerIncome extends Model
{
//    use SoftDeletes;
    protected $table = 'customer_incomes';

    protected $fillable=['income_source','income_type','income_amount','income_side'];
}
