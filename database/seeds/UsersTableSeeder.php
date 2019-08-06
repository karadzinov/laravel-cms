<?php

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $profiles = [new Profile(), new Profile()];
        $adminRole = Role::whereName('Admin')->first();
        $userRole = Role::whereName('User')->first();

        // Seed test admin
        $seededAdminEmail = 'admin@admin.com';
        $user = User::where('email', '=', $seededAdminEmail)->first();
        $adminEmails = ['admin@admin.com', 'admin2@admin.com'];
        if ($user === null) {
            for($i=0; $i<2; $i++){
                
                $user = User::create([
                    'name'                           => $faker->userName,
                    'first_name'                     => $faker->firstName,
                    'last_name'                      => $faker->lastName,
                    'email'                          => $adminEmails[$i],
                    'password'                       => Hash::make('password'),
                    'token'                          => str_random(64),
                    'activated'                      => true,
                    'signup_confirmation_ip_address' => $faker->ipv4,
                    'admin_ip_address'               => $faker->ipv4,
                ]);

                $user->profile()->save($profiles[$i]);
                $user->attachRole($adminRole);
                $user->save();
            }
        }

        // Seed test user
        $user = User::where('email', '=', 'user@user.com')->first();
        if ($user === null) {
            $user = User::create([
                'name'                           => $faker->userName,
                'first_name'                     => $faker->firstName,
                'last_name'                      => $faker->lastName,
                'email'                          => 'user@user.com',
                'password'                       => Hash::make('password'),
                'token'                          => str_random(64),
                'activated'                      => true,
                'signup_ip_address'              => $faker->ipv4,
                'signup_confirmation_ip_address' => $faker->ipv4,
            ]);

            $user->profile()->save(new Profile());
            $user->attachRole($userRole);
            $user->save();
        }

        // Seed test users
        // $user = factory(App\Models\Profile::class, 5)->create();
        // $users = User::All();
        // foreach ($users as $user) {
        //     if (!($user->isAdmin()) && !($user->isUnverified())) {
        //         $user->attachRole($userRole);
        //     }
        // }
    }
}
