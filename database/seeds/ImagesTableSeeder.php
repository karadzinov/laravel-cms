<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = array(
          array('name' => 'sa-0-0-0.jpg','imageable_type' => 'App\\Models\\Page','imageable_id' => '2','created_at' => '2019-07-12 08:41:21','updated_at' => '2019-07-12 08:41:21'),
          array('name' => 'sa-1.jpg','imageable_type' => 'App\\Models\\Page','imageable_id' => '2','created_at' => '2019-07-12 08:41:21','updated_at' => '2019-07-12 08:41:21')
        );

        foreach($images as $image){
        	DB::table('images')->insert($image);
        }
    }
}
