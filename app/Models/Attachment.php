<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{

    protected $fillable = ['customer_id', 'name', 'title'];

    public $timestamps = false;
    protected $table='customer_attachments';

}
