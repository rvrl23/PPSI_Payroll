<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_number');
            $table->string('name');
            $table->string('designation');
            $table->date('date');
            $table->time('time_in');
            $table->time('time_out');
            $table->time('break_in');
            $table->time('break_out');
            $table->time('late');
            $table->time('undertime');
            $table->time('total_today');
            $table->string('status');
            $table->string('date_status');
            $table->string('grace_period');
            $table->time('last_time');
            $table->string('day');
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
        Schema::dropIfExists('attendances');
    }
}
