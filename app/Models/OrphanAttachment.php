<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrphanAttachment extends Model
{

    protected $fillable = ['orphan_id', 'name', 'title'];

    public $timestamps = false;
    protected $table='orphan_attachments';

}
