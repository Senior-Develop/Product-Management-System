<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments("id");
            $table->string("serial_number")->nullable();
            $table->string("contact_type")->nullable();
            $table->string("company_name")->nullable();
            $table->string("name")->nullable();
            $table->string("address")->nullable();
            $table->string("post_code")->nullable();
            $table->string("location")->nullable();
            $table->string("country")->nullable();
            $table->string("email")->nullable();
            $table->string("email_2")->nullable();
            $table->string("phone")->nullable();
            $table->string("phone_2")->nullable();
            $table->string("wgs84_lat")->nullable();
            $table->string("wgs84_lon")->nullable();
            $table->string("inverter_type")->nullable();
            $table->string("inverter_power")->nullable();
            $table->string("pv_power")->nullable();
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
        Schema::dropIfExists('locations');
    }
}
