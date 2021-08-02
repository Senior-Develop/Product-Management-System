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
            $table->increments("id");
            $table->string("serial_number")->nullable();
            $table->string("sn_module1")->nullable();
            $table->string("sn_module2")->nullable();
            $table->string("sn_module3")->nullable();
            $table->string("sn_module4")->nullable();
            $table->string("sn_module5")->nullable();
            $table->string("sn_module6")->nullable();
            $table->string("sn_module7")->nullable();
            $table->string("sn_module8")->nullable();
            $table->string("hw_release")->nullable();
            $table->string("sw_release")->nullable();
            $table->string("customer_id")->nullable();
            $table->string("location_id")->nullable();
            $table->string("configuration_id")->nullable();
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
