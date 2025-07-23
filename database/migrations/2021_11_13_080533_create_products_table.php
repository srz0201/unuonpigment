<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();

            $table->integer('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('language');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category');

            $table->string('title', 250);
            $table->string('description', 400)->nullable();

            $table->string('seo_title', 250);
            $table->string('seo_description', 400)->nullable();

            $table->string('image')->nullable();
            $table->string('banner')->nullable();
            $table->boolean('status')->default(0);
            $table->longText('body')->nullable();
            $table->string('slug');
            $table->string('catalog')->nullable();
            $table->string('video')->nullable();
            $table->string('view_count')->default(0);

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
