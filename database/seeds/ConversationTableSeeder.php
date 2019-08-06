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

        $conversations = array(
          array('user_id' => '1','name' => 'PUBLIC','public' => '1','created_at' => '2019-07-03 10:19:10','updated_at' => NULL),
          array('user_id' => '1','name' => 'Private Conversation','public' => '0','created_at' => '2019-07-03 10:19:10','updated_at' => NULL)
        );

        foreach($conversations as $conversation){
        	DB::table('conversations')->insert($conversation);
        }
    }
}
