<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        $this->call(ThemesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call([
            ConversationTableSeeder::class,
            ConversationUserTableSeeder::class,
            MessagesTableSeeder::class,
            CategoriesTableSeeder::class,
            FaqCategoriesTableSeeder::class,
            FaqsTableSeeder::class,
            ImagesTableSeeder::class,
            PagesTableSeeder::class,
            PostsTableSeeder::class,
            TagsTableSeeder::class,
            PostTagTableSeeder::class,
            ScriptsTableSeeder::class,
            SettingsTableSeeder::class,
            AboutTableSeeder::class,
        ]);

        Model::reguard();
    }
}
