<?php

use Illuminate\Database\Seeder;
use App\Models\{Currency, Language};
use Illuminate\Support\Facades\Cache;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currency = Currency::where('name', '=', 'USD')->first()->id;
        $language = Language::where('active', '=', '1')->first()->code;
        Cache::forever('locales',[$language]);
        $settings = array(
          array(
            'currency_id' => $currency,
            'language' => $language,
            'main_url' => 'http://cms.test',
            'title' => 'CMS',
            'email' => 'cms@cms.com',
            'address' => 'Exemple Address',
            'phone_number' => '0012 34/567-891',
            'logo' => 'Logo_logo_lg.png',
            'slogan' => 'Company Slogan',
            'meta_description' => 'meta descrition',
            'meta_image' => 'metaImage',
            'meta_title' => 'meta title',
            'instagram' => 'www.instagram.com',
            'twitter' => 'ww.twitter.com',
            'facebook' => 'ww.facebook.com',
            'linkedin' => 'www.linkedin.com',
            'ios_app' => 'www.ios.com',
            'android_app' => 'www.android.com',
            'google_map' => NULL,
            'created_at' => '2019-07-17 08:39:01',
            'updated_at' => '2019-07-18 12:23:36',
            'lat' => '31.0460510000',
            'lng' => '34.8516120000')
        );

        foreach($settings as $setting){
        	DB::table('settings')->insert($setting);
        }
    }
}
