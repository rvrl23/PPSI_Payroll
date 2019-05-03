<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('renderedhours');
            $table->string('allowance')->nullable();
            $table->string('basic');
            $table->string('overtime')->nullable();
            $table->string('nworking_holiday');
            $table->string('regular_holiday');
            $table->string('vacation')->default('0');
            $table->string('sick')->default('0');
            $table->string('otherearnings')->default('0');
            // gross deduction
            $table->string('late')->nullable();
            $table->string('undertime')->nullable();
            $table->string('absent')->nullable();
            $table->string('sss');
            $table->string('hdmf');
            $table->string('philhealth');
            $table->string('holdingtax');
            $table->string('otherdeduction')->default('0');
            // para sa print
            $table->string('deduction');
            $table->string('netpay');
            $table->string('gross');
            $table->date('cut_off');
            $table->softDeletes();
            $table->timestamps();
            $table->string('idnumber');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payrolls');
    }
}
