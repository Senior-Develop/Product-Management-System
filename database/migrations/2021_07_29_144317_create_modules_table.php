<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments("id");
            $table->string('sn_module')->nullable();
            $table->string('cell1')->nullable();
            $table->string('cell2')->nullable();
            $table->string('cell3')->nullable();
            $table->string('cell4')->nullable();
            $table->string('cell5')->nullable();
            $table->string('cell6')->nullable();
            $table->string('cell7')->nullable();
            $table->string('cell8')->nullable();
            $table->string('cell9')->nullable();
            $table->string('cell10')->nullable();
            $table->string('cell11')->nullable();
            $table->string('cell12')->nullable();
            $table->string('cell13')->nullable();
            $table->string('cell14')->nullable();
            $table->string('cell15')->nullable();
            $table->string('cell16')->nullable();
            $table->string('soh_module')->nullable();
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
        Schema::dropIfExists('modules');
    }
}
