<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLanguageForTranslatableModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function(Blueprint $table)
        {
            $table->string('language', 15)->after('id');
        });

        Schema::table('settings', function(Blueprint $table)
        {
            $table->string('language', 15)->after('id');
        });

        Schema::table('posts', function(Blueprint $table)
        {
            $table->string('language', 15)->after('id');
        });

        Schema::table('pages', function(Blueprint $table)
        {
            $table->string('language', 15)->after('id');
        });

        Schema::table('testimonials', function(Blueprint $table)
        {
            $table->string('language', 15)->after('id');
        });

        Schema::table('about', function(Blueprint $table)
        {
            $table->string('language', 15)->after('id');
        });

        Schema::table('faqs', function(Blueprint $table)
        {
            $table->string('language', 15)->after('id');
        });

        Schema::table('faq_categories', function(Blueprint $table)
        {
            $table->string('language', 15)->after('id');
        });

        Schema::table('tags', function(Blueprint $table)
        {
            $table->string('language', 15)->after('id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('language');
        });

        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('language');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('language');
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('language');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn('language');
        });

        Schema::table('about', function (Blueprint $table) {
            $table->dropColumn('language');
        });

        Schema::table('faqs', function (Blueprint $table) {
            $table->dropColumn('language');
        });

        Schema::table('faq_categories', function (Blueprint $table) {
            $table->dropColumn('language');
        });

        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn('language');
        });
    }
}