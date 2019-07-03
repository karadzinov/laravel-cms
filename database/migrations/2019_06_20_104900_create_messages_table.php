<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index(); //message from
            $table->bigInteger('conversation_id')->unsigned()->index(); //message from
            $table->string('content');

            $table->timestamps();

            $table->foreign('user_id')->references('id')
                    ->on('users')->onDelete('cascade');
             $table->foreign('conversation_id')->references('id')
                    ->on('conversations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
