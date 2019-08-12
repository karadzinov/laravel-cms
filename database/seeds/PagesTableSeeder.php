<?php

use App\Models\Language;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $language = Language::where('active', '=', '1')->first()->code;
        
        $pages = array(
          array('language'=>$language, 'title' => 'First Page','subtitle' => 'Subtitle for First Page','main_text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum, nisi quis dignissim fringilla, ipsum risus egestas diam, ut vestibulum neque purus at enim. Nam lacinia, metus eu sollicitudin aliquet, ante lectus porttitor eros, id elementum sapien nisl eget sapien. Nulla quis ante ipsum. Nam iaculis eros a enim sagittis, in vulputate felis auctor. In rutrum lorem nunc, non cursus nisl molestie quis. Vivamus viverra turpis vel massa cursus ullamcorper. In consectetur arcu consequat luctus interdum. Etiam eu tincidunt mi. Suspendisse erat purus, pulvinar vel lorem id, suscipit tincidunt odio. Cras eleifend dui nec quam blandit dignissim.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum, nisi quis dignissim fringilla, ipsum risus egestas diam, ut vestibulum neque purus at enim. Nam lacinia, metus eu sollicitudin aliquet, ante lectus porttitor eros, id elementum sapien nisl eget sapien. Nulla quis ante ipsum. Nam iaculis eros a enim sagittis, in vulputate felis auctor. In rutrum lorem nunc, non cursus nisl molestie quis. Vivamus viverra turpis vel massa cursus ullamcorper. In consectetur arcu consequat luctus interdum. Etiam eu tincidunt mi. Suspendisse erat purus, pulvinar vel lorem id, suscipit tincidunt odio. Cras eleifend dui nec quam blandit dignissim.</p>','slug' => 'first-page','created_at' => '2019-07-10 13:59:17','updated_at' => '2019-07-18 12:25:53')
        );

        foreach($pages as $page){
        	DB::table('pages')->insert($page);
        }

    }
}
