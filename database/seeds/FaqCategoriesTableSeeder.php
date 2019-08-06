<?php

use Illuminate\Database\Seeder;

class FaqCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faq_categories = array(
          array('name' => 'General','icon' => 'question','created_at' => '2019-07-18 08:48:12','updated_at' => '2019-07-18 08:48:12'),
          array('name' => 'Second FAQ Category','icon' => 'wrench','created_at' => '2019-07-18 07:56:07','updated_at' => '2019-07-18 12:30:51'),
        );

        foreach($faq_categories as $category){
        	DB::table('faq_categories')->insert($category);
        }
    }
}
