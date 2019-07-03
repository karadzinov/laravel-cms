<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversation_user', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->bigInteger('conversation_id')->unsigned()->index(); //participant
           $table->bigInteger('user_id')->unsigned()->index();

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
        Schema::dropIfExists('conversation_user');
    }
}
