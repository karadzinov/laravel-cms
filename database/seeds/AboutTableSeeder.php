<?php

use Illuminate\Database\Seeder;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$lorem = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora nisi expedita ducimus sunt numquam ad quam maxime amet nam vel molestiae odio repudiandae, eveniet quibusdam accusamus, doloribus ratione tenetur beatae.';

        $about = array(
        	'welcome_note' => $lorem,
        	'about' => $lorem,
        	'offer' => $lorem,
        	'why_us' => $lorem,
        	'image' => 'image.jpg',
        	'video' => 'https://www.youtube.com/watch?v=B7r7YY_EO0A'
        );

        
        DB::table('about')->insert($about);
    }
}
