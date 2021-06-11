<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('main_heading')->nullable();
            $table->string('newsletter')->nullable();
            $table->string('submit_button')->nullable();
            $table->string('copyrights')->nullable();
            $table->string('page_name')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_author')->nullable();
            $table->string('favicon_image')->nullable();
            $table->string('timezone')->default('UTC');
            $table->text('meta_description')->nullable();
            $table->bigInteger('views')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_settings');
    }
}
