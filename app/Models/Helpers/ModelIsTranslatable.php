<?php

namespace App\Models\Helpers;

use App\Scopes\TranslationScope;


trait ModelIsTranslatable{
	/**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new TranslationScope);
    }
}