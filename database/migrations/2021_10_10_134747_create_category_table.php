<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('language');

            $table->string('name');
            $table->string('description', 400)->nullable();
            $table->string('seo_title');
            $table->string('seo_description', 400)->nullable();

            $table->longText('body')->nullable();
            $table->text('faq')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('image')->nullable();
            $table->string('slug')->unique();
            $table->integer('sort')->default(0);
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
        Schema::dropIfExists('category');
    }
}
