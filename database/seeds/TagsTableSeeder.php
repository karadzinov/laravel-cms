<?php

use App\Models\Language;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $language = Language::where('active', '=', '1')->first()->code;
        
        $tags = array(
          array('language'=>$language,'name' => 'first tag','slug' => 'biskviti','created_at' => '2019-07-17 08:42:53','updated_at' => '2019-07-17 08:42:53'),
          array('language'=>$language,'id' => '4','name' => 'second tag','slug' => 'palacinke','created_at' => '2019-07-17 08:44:04','updated_at' => '2019-07-17 08:44:04')
        );

        foreach($tags as $tag){
        	DB::table('tags')->insert($tag);
        }
    }
}
