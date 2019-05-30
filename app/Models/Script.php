<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Script extends Model
{
    protected $table = "scripts";
    protected $guarded = [];
    protected $dates = ['created_at'. 'updated_at'];
}
