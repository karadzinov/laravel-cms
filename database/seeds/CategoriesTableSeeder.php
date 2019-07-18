<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array(
          array('name' => 'Category 1','_lft' => '1','_rgt' => '2','parent_id' => NULL,'image' => 'biskviti.jpg','description' => 'First Category Description','link' => NULL,'slug' => 'category-1','created_at' => '2019-07-17 08:40:40','updated_at' => '2019-07-18 12:22:25')
        );

        foreach($categories as $category){
        	DB::table('categories')->insert($category);
        }
    }
}
