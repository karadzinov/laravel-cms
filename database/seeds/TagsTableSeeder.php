<?php

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
        $tags = array(
          array('name' => 'first tag','slug' => 'biskviti','created_at' => '2019-07-17 08:42:53','updated_at' => '2019-07-17 08:42:53'),
          array('id' => '4','name' => 'second tag','slug' => 'palacinke','created_at' => '2019-07-17 08:44:04','updated_at' => '2019-07-17 08:44:04')
        );

        foreach($tags as $tag){
        	DB::table('tags')->insert($tag);
        }
    }
}
