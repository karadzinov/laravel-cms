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
        $messages = [
        	[
                'user_id' => $user->id,
        	    'conversation_id' => $conversations->first()->id,
        	    'content' => 'First message',
        	    'created_at' => now(),
        	],
        	[
                'user_id' => $user->id,
        	    'conversation_id' => $conversations[1]->id,
        	    'content' => 'second message',
        	    'created_at' => now(),
        	],
        ];

        foreach($messages as $message){
        	DB::table('messages')->insert($message);
        }
    }
}
