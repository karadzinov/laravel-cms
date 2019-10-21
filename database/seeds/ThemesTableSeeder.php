<?php

use App\Models\Theme;
use Illuminate\Database\Seeder;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $themes = [
            [
                'name'        => 'Theme 1',
                'active'      => 1,
                'root_folder' => 'theme-1',
            ],
            [
                'name'        => 'Theme 2',
                'root_folder' => 'theme-2',
            ],
        ];

        foreach($themes as $theme){
            Theme::create($theme);
        }
    }
}
