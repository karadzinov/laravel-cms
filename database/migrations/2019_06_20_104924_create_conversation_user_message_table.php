<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationUserMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversation_user_message', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('conversation_id')->unsigned()->index(); 
            $table->bigInteger('user_id')->unsigned()->index(); //message from
            $table->string('message');

            $table->timestamps();

            $table->foreign('conversation_id')->references('id')
                    ->on('conversations')->onDelete('cascade');
            $table->foreign('user_id')->references('id')
                    ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversation_user_message');
    }
}
