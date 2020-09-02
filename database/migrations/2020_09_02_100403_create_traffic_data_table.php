<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Carbon;

class CreateTrafficDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traffic_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip_address')->default('visits');
            $table->string('city');
            $table->string('country');
            $table->string('timezone');
            $table->string('timestamp');
            $table->string('month');
            $table->string('year');
            $table->string('last_page_visited');
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
        Schema::dropIfExists('traffic_data');
    }
}
