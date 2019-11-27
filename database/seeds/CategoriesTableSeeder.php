<?php

use Illuminate\Database\Seeder;
use App\Models\{Category, Language};

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $language = Language::where('active', '=', '1')->first()->code;
        $withoutLanguage = null;
        
        $postCategoryFields = array('language'=>$withoutLanguage, 'name' => 'posts','_lft' => '1','_rgt' => '2','parent_id' => NULL,'image' => 'biskviti.jpg','description' => 'First Category Description','link' => NULL,'slug' => 'category-1','created_at' => '2019-07-17 08:40:40','updated_at' => '2019-07-18 12:22:25');
        $productCategoryFields = array('language'=>$withoutLanguage, 'name' => 'products','_lft' => '1','_rgt' => '2','parent_id' => NULL,'image' => 'biskviti.jpg','description' => 'First Category Description','link' => NULL,'slug' => 'category-1','created_at' => '2019-07-17 08:40:40','updated_at' => '2019-07-18 12:22:25');


        $post = Category::create($postCategoryFields);
        $product = Category::create($productCategoryFields);
       
        $exemplePostCategory = array('language'=>$language, 'name' => 'Exemple Post Category that should be edited','parent_id' => $post->id,'image' => 'biskviti.jpg','description' => 'First Post Category Description that should be changed on your way','link' => NULL,'slug' => 'exemple-post-category-that-should-be-edited','created_at' => '2019-07-17 08:40:40','updated_at' => '2019-07-18 12:22:25');
        $exempleProductCategory = array('language'=>$language, 'name' => 'Exemple Product Category that should be edited','parent_id' => $product->id,'image' => 'biskviti.jpg','description' => 'First Product Category Description that should be changed on your way','link' => NULL,'slug' => 'exemple-product-category-that-should-be-edited','created_at' => '2019-07-17 08:40:40','updated_at' => '2019-07-18 12:22:25');
        $postExemple = Category::create($exemplePostCategory);
        $productExemple = Category::create($exempleProductCategory);


    }
}
