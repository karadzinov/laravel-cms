<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('category_id');
            $table->string('title');
            $table->text('subtitle', 500);
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('location')->nullable();
            $table->text('main_text');
            $table->enum('workflow', ['redjected', 'pending', 'posted'])
                  ->default('pending');
            $table->string('slug');    

            $table->timestamps();

            $table->foreign('category_id')->references('id')
                    ->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
}
