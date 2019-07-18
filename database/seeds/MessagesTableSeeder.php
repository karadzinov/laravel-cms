<?php

use App\Models\User;
use App\Models\Conversation;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user= User::first();
        $conversations = Conversation::all();
        $messages = array(
          array('user_id' => '1','conversation_id' => '1','content' => 'First public message','created_at' => '2019-07-03 10:19:10','updated_at' => NULL),
          array('user_id' => '1','conversation_id' => '2','content' => 'First private message.','created_at' => '2019-07-03 10:19:10','updated_at' => NULL)
        );

        foreach($messages as $message){
        	DB::table('messages')->insert($message);
        }
    }
}
