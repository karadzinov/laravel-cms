<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('name')->unique();
            $table->string('script');
            $table->string('native');
            $table->string('regional')->nullable();
            $table->string('active')->default(false);
            $table->boolean('folder')->default(0); //checks if folder with name of language code exists

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('languages');
    }
}
