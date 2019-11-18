<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('language', 15);
            $table->unsignedInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('slug')->index();
            $table->string('short_description');
            $table->text('description');
            $table->unsignedInteger('price');
            $table->unsignedSmallInteger('reduction')->nullable();

            $table->unsignedInteger('quantity')->nullable();
            $table->string('main_image');
            $table->string('video')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('delivery')->default(0);

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
