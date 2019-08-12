<?php

use App\Models\Language;
use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $language = Language::where('active', '=', '1')->first()->code;
        
        $faqs = array(
          array('language'=>$language, 'question' => 'First Question','answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dapibus fringilla venenatis. Fusce vehicula leo in justo malesuada, sit amet dictum mauris tincidunt. Vivamus mollis, magna non tincidunt dictum, urna purus iaculis dui, quis bibendum mauris diam ac elit. Curabitur sed sem nec nunc posuere commodo. Donec sagittis diam non leo vulputate, aliquet molestie purus porttitor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus varius ante eget odio pharetra, et laoreet ex hendrerit. Sed ullamcorper lacinia turpis, id imperdiet nulla egestas in. Vivamus porttitor nisl in mollis interdum. Praesent euismod suscipit neque nec consequat. Etiam luctus id metus at molestie. Praesent pharetra dolor enim.

        Maecenas et pretium justo. Mauris pretium risus nisl, nec luctus lectus varius in. Donec congue odio leo, eu pharetra sem gravida a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sit amet dui fermentum nulla pharetra dapibus consectetur id nulla. Praesent laoreet, justo id lacinia porta, enim magna malesuada odio, in commodo lorem erat eu metus. Nunc vel nulla lorem. Suspendisse potenti. Vivamus efficitur risus tempor maximus molestie. Cras blandit pulvinar nulla, quis ornare turpis finibus id. Maecenas ultricies et felis ut pretium. Curabitur vitae mauris porta, fringilla tellus a, ultricies metus.','category_id' => '1','created_at' => '2019-07-17 08:45:10','updated_at' => '2019-07-18 12:31:26'),
          array('language'=>$language, 'question' => 'Second Question','answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dapibus fringilla venenatis. Fusce vehicula leo in justo malesuada, sit amet dictum mauris tincidunt. Vivamus mollis, magna non tincidunt dictum, urna purus iaculis dui, quis bibendum mauris diam ac elit. Curabitur sed sem nec nunc posuere commodo. Donec sagittis diam non leo vulputate, aliquet molestie purus porttitor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus varius ante eget odio pharetra, et laoreet ex hendrerit. Sed ullamcorper lacinia turpis, id imperdiet nulla egestas in. Vivamus porttitor nisl in mollis interdum. Praesent euismod suscipit neque nec consequat. Etiam luctus id metus at molestie. Praesent pharetra dolor enim.

        Maecenas et pretium justo. Mauris pretium risus nisl, nec luctus lectus varius in. Donec congue odio leo, eu pharetra sem gravida a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sit amet dui fermentum nulla pharetra dapibus consectetur id nulla. Praesent laoreet, justo id lacinia porta, enim magna malesuada odio, in commodo lorem erat eu metus. Nunc vel nulla lorem. Suspendisse potenti. Vivamus efficitur risus tempor maximus molestie. Cras blandit pulvinar nulla, quis ornare turpis finibus id. Maecenas ultricies et felis ut pretium. Curabitur vitae mauris porta, fringilla tellus a, ultricies metus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dapibus fringilla venenatis. Fusce vehicula leo in justo malesuada, sit amet dictum mauris tincidunt. Vivamus mollis, magna non tincidunt dictum, urna purus iaculis dui, quis bibendum mauris diam ac elit. Curabitur sed sem nec nunc posuere commodo. Donec sagittis diam non leo vulputate, aliquet molestie purus porttitor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus varius ante eget odio pharetra, et laoreet ex hendrerit. Sed ullamcorper lacinia turpis, id imperdiet nulla egestas in. Vivamus porttitor nisl in mollis interdum. Praesent euismod suscipit neque nec consequat. Etiam luctus id metus at molestie. Praesent pharetra dolor enim.

        Maecenas et pretium justo. Mauris pretium risus nisl, nec luctus lectus varius in. Donec congue odio leo, eu pharetra sem gravida a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sit amet dui fermentum nulla pharetra dapibus consectetur id nulla. Praesent laoreet, justo id lacinia porta, enim magna malesuada odio, in commodo lorem erat eu metus. Nunc vel nulla lorem. Suspendisse potenti. Vivamus efficitur risus tempor maximus molestie. Cras blandit pulvinar nulla, quis ornare turpis finibus id. Maecenas ultricies et felis ut pretium. Curabitur vitae mauris porta, fringilla tellus a, ultricies metus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dapibus fringilla venenatis. Fusce vehicula leo in justo malesuada, sit amet dictum mauris tincidunt. Vivamus mollis, magna non tincidunt dictum, urna purus iaculis dui, quis bibendum mauris diam ac elit. Curabitur sed sem nec nunc posuere commodo. Donec sagittis diam non leo vulputate, aliquet molestie purus porttitor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus varius ante eget odio pharetra, et laoreet ex hendrerit. Sed ullamcorper lacinia turpis, id imperdiet nulla egestas in. Vivamus porttitor nisl in mollis interdum. Praesent euismod suscipit neque nec consequat. Etiam luctus id metus at molestie. Praesent pharetra dolor enim.

        Maecenas et pretium justo. Mauris pretium risus nisl, nec luctus lectus varius in. Donec congue odio leo, eu pharetra sem gravida a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sit amet dui fermentum nulla pharetra dapibus consectetur id nulla. Praesent laoreet, justo id lacinia porta, enim magna malesuada odio, in commodo lorem erat eu metus. Nunc vel nulla lorem. Suspendisse potenti. Vivamus efficitur risus tempor maximus molestie. Cras blandit pulvinar nulla, quis ornare turpis finibus id. Maecenas ultricies et felis ut pretium. Curabitur vitae mauris porta, fringilla tellus a, ultricies metus.','category_id' => '2','created_at' => '2019-07-17 08:45:24','updated_at' => '2019-07-18 12:31:39')
        );

		foreach($faqs as $faq){
        	DB::table('faqs')->insert($faq);
		}
    }
}
