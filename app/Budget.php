<?php

namespace App;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable = ['project_id','item_line','unit','number_unit','unit_price'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
