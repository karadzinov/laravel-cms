<?php

namespace App\Scopes;

use App\Models\Language;
use Illuminate\Support\Facades\{App, Cache, Cookie};
use Illuminate\Database\Eloquent\{Builder, Model, Scope};

class CategoryTranslationScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        //in case someone deletes the language, the site will be unacessible for users that have the cookie set to that deleted language
        $languages = Cache::get('locales');

        $locale = Cookie::get('locale');
        if(!in_array($locale, $languages)){
            $locale = $languages[0];
            $minutes = 60 * 24 * 60;
            Cookie::queue(Cookie::make('locale', $locale, $minutes));
            App::setLocale($locale);
        }

        $builder->whereNull('language')->orWhere('language', '=', App::getLocale());
    }
}