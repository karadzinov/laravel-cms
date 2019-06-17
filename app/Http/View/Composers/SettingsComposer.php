<?php

namespace App\Http\View\Composers;

use App\Models\Settings;
use Illuminate\View\View;

class SettingsComposer
{
    protected $settings;

    public function __construct()
    {
        $settings = Settings::first();
        (!$settings) ? $settings = optional($settings) : null;
        $this->settings = $settings;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('settings', $this->settings);
    }
}