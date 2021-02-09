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
    public function up(){
        Schema::create('payroll', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('approvedBy');
            $table->float("basic_salary");
            $table->float("gross_pay");
            $table->float("nssf");
            $table->float("nhif");
            $table->float("payee");
            $table->float('net_pay');
            $table->string('bankName');
            $table->string('bankBranch');
            $table->string('bankCode');
            $table->string('beneficiaryAccountNumber');
            $table->string('reference');
            $table->string('month');
            $table->string('year');
            $table->enum('status', array('rejected','processed'))->default('processed');
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
