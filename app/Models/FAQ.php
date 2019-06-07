<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table = 'faqs';
    protected $guarded = [];
    protected $dates = ['created_at'. 'updated_at'];
}
