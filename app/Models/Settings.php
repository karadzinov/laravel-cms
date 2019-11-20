<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\ModelIsTranslatable;

class Settings extends Model
{
    use ModelIsTranslatable;
    
    protected $table = 'settings';

    /**
     * Fillable fields for a Profile.
     *
     * @var array
     */
    protected $fillable = [
        'main_url',
        'language',
        'currency_id',
        'title',
        'email',
        'address',
        'phone_number',
        'logo',
        'slogan',
        'meta_description',
        'meta_image',
        'meta_title',
        'instagram',
        'twitter',
        'facebook',
        'linkedin',
        'ios_app',
        'android_app',
        'google_map',
        'lat',
        'lng'
    ];

    public function currency(){
        
        return $this->belongsTo(Currency::class, 'currency_id', 'id');
    }

    public function getCurrencySymbolAttribute(){
        
        return $this->currency->symbol;
    }
}
