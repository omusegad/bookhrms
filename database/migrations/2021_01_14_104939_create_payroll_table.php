<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('approvedBy')->nullable();
            $table->string('employeeID');
            $table->float('basic_salary');
            $table->float('gross_pay');
            $table->float('nhifAmount');
            $table->float('nssfAmount');
            $table->float('payee');
            $table->float('total_salary');
            $table->float('net_salary');
            $table->enum('pay_status', array('pending','approved','disapproved','processed'))->default('pending');
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
        Schema::dropIfExists('payroll');
    }
}
