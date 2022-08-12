<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrphanGuarantee extends Model
{
//    use SoftDeletes;
    protected $table = 'orphan_guarantees';

    protected $fillable=['guaranteed_source','guaranteed_amount','guaranteed_period'];
}
