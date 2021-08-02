<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments("id");
            $table->string("no")->nullable();
            $table->string("category")->nullable();
            $table->string("branch")->nullable();
            $table->string("contact_type")->nullable();
            $table->string("company_name")->nullable();
            $table->string("name_1")->nullable();
            $table->string("name_2")->nullable();
            $table->string("salutation")->nullable();
            $table->string("title")->nullable();
            $table->string("address")->nullable();
            $table->string("post_code")->nullable();
            $table->string("location")->nullable();
            $table->string("country")->nullable();
            $table->string("email")->nullable();
            $table->string("email_2")->nullable();
            $table->string("phone")->nullable();
            $table->string("phone_2")->nullable();
            $table->string("mobile")->nullable();
            $table->string("fax")->nullable();
            $table->string("website")->nullable();
            $table->string("skype")->nullable();
            $table->string("form_of_address")->nullable();
            $table->string("birthday")->nullable();
            $table->string("correspondence_channel")->nullable();
            $table->string("remarks")->nullable();
            $table->string("relationship_info")->nullable();
            $table->string("contact_person")->nullable();
            $table->string("language")->nullable();
            $table->string("vat_number")->nullable();
            $table->string("number_of_employees")->nullable();
            $table->string("commercial_register_no")->nullable();
            $table->string("vat_identification_number")->nullable();
            $table->string("lead")->nullable();
            $table->string("password")->nullable();
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
        Schema::dropIfExists('users');
    }
}
