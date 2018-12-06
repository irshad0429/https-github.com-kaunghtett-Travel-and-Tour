<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_categories_id');
            $table->integer('locations_id');
            $table->integer('tour_leaders_id');
            $table->string('name');
            $table->text('short_description');
            $table->text('service');
            $table->string('duration');
            $table->string('image');
            $table->string('price');
            $table->string('lat');
            $table->string('long');
            $table->integer('p_status');
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
        Schema::dropIfExists('tour_packages');
    }
}
