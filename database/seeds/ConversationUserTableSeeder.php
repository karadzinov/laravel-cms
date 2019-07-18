<?php

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
        $conversation_user = array(
          array('conversation_id' => '2','user_id' => '1','created_at' => NULL,'updated_at' => NULL),
          array('conversation_id' => '2','user_id' => '2','created_at' => NULL,'updated_at' => NULL)
        );

        foreach($conversation_user as $combination){
        	DB::table('conversation_user')->insert($combination);
        }
    }
}
