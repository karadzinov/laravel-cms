<?php

use Illuminate\Database\Seeder;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post_tag = array(
          array('post_id' => '1','tag_id' => '1','created_at' => NULL,'updated_at' => NULL)
        );

        foreach($post_tag as $combination){
        	DB::table('post_tag')->insert($combination);
        }
    }
}
