<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
            LanguagesTableSeeder::class,
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
            ScriptsTableSeeder::class,
            SettingsTableSeeder::class,
            AboutTableSeeder::class,
            CurrenciesTableSeeder::class,
            ProductsTableSeeder::class,
        ]);

        Model::reguard();
    }
}
