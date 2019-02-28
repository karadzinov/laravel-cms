<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    //
        protected $table = 'settings';
        
    //  
        protected $fillable = [
        'main_url',
        'title',
        'email',
        'address',
        'logo',
        'meta_description',
        'meta_image',
        'meta_title',
        'instagram',
        'twitter',
        'facebook',
        'linkedin',
        'ios_app',
        'android_app',
        'google_map'
        ];

}

