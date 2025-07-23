<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('language');

            $table->string('name')->nullable()->default('null');
            $table->string('title')->nullable()->default('null');
            $table->string('description')->nullable()->default('null');
            $table->string('keywords')->nullable()->default('null');
            $table->string('logo')->nullable()->default('null');
            $table->string('fave_logo')->nullable()->default('null');
            $table->longText('theme_config')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
