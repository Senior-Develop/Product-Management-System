<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->increments("id");
            $table->string("product_configuration")->nullable();
            $table->string("number_cells")->nullable();
            $table->string("capacity_twice_guarantee")->nullable();
            $table->string("capacity_estimated")->nullable();
            $table->string("module_vertical")->nullable();
            $table->string("module_horizontal")->nullable();
            $table->string("voltage")->nullable();
            $table->string("permanent_charging_performance")->nullable();
            $table->string("permanent_discharging_performance")->nullable();
            $table->string("permanent_charging_power")->nullable();
            $table->string("permanent_discharging_power")->nullable();
            $table->string("length")->nullable();
            $table->string("broad")->nullable();
            $table->string("height")->nullable();
            $table->string("weight")->nullable();
            $table->string("capacity_new")->nullable();
            $table->string("total_modules")->nullable();
            $table->string("logic_board_total")->nullable();
            $table->string("additional_cover")->nullable();
            $table->string("current_nom")->nullable();
            $table->string("current_peak")->nullable();
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
        Schema::dropIfExists('configurations');
    }
}
