<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('language');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('user');

            $table->string('title', 250);
            $table->string('description', 400)->nullable();
            $table->string('keywords')->nullable();
            $table->string('image_path')->nullable();
            $table->string('thumb_path')->nullable();
            $table->boolean('status')->default(0);
            $table->longText('body')->nullable();
            $table->string('slug');
            $table->string('url')->nullable();
            $table->string('view_count')->default(0);
            $table->string('score')->default(0);
            $table->string('release')->nullable();

            $table->string('seo_title', 250);
            $table->string('seo_description', 400)->nullable();

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
        Schema::dropIfExists('articles');
    }
}
