<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('language');

            $table->string('title', 800)->nullable();
            $table->string('video')->nullable();
            $table->text('iframe')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('home')->default(0);
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
        Schema::dropIfExists('media');
    }
}
