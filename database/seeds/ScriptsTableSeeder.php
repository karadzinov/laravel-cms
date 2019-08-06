<?php

use Illuminate\Database\Seeder;

class ScriptsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scripts = array(
          array('name' => 'Exemple script','code' => '<script>
        alert(\'Greetings from admin exemple script!\');
        </script>','active' => '0','created_at' => '2019-07-18 12:44:16','updated_at' => '2019-07-18 12:44:16')
        );

        foreach($scripts as $script){
        	DB::table('scripts')->insert($script);
        }
    }
}
