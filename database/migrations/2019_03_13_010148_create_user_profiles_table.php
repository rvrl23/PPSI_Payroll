<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_number');
            $table->string('profile_images');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('surname');
            $table->date('birthdate');
            $table->string('gender');
            $table->string('password');
            $table->string('position');
            $table->string('department');
            $table->string('designation');
            $table->string('address');
            $table->string('email');
            $table->string('contact');
            $table->softDeletes();
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
        Schema::dropIfExists('user_profiles');
    }
}
