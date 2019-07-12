<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class ConversationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user= User::first();

        $conversations = [
        	[
        	    'user_id' => $user->id,
        	    'name' => 'PUBLIC',
        	    'public' => true,
        	    'created_at' => now(),
        	],
        	[
        	    'user_id' => $user->id,
        	    'name' => 'PRIVATE',
        	    'created_at' => now(),
        	],
        ];

        foreach($conversations as $conversation){
        	DB::table('conversations')->insert($conversation);
        }
    }
}
