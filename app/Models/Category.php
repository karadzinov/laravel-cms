<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use \Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    //
    use NodeTrait;
    
    //protected $guarded =[];
    
    protected $fillable = [
        'name', 'parent_id',
    ];
    
     public function childs() {
        return $this->hasMany('App\Models\CategoryB','parent_id','id') ;
    }
    
}
