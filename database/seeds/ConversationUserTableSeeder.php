<?php

use App\Models\User;
use App\Models\Conversation;
use Illuminate\Database\Seeder;

class ConversationUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $conversations = Conversation::all();
        $public = $conversations->where('public', '=', true)->first();
        $private = $conversations->where('public', '!=', true)->first();

        $conversations = [
        	[
        	    'user_id' => $users->first()->id,
        	    'conversation_id' => $public->id,
        	    'created_at' => now(),
        	],
        	[
        	    'user_id' => $users[1]->id,
        	    'conversation_id' => $public->id,
        	    'created_at' => now(),
        	],
        	[
        	    'user_id' => $users->first()->id,
        	    'conversation_id' => $private->id,
        	    'created_at' => now(),
        	],
        	[
        	    'user_id' => $users[1]->id,
        	    'conversation_id' => $private->id,
        	    'created_at' => now(),
        	],
        ];

        foreach($conversations as $conversation){
        	DB::table('conversation_user')->insert($conversation);
        }
    }
}
