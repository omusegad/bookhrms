<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('approvedBy')->index()->nullable();
            $table->string("job_group");
            $table->float("basic_salary");
            $table->float("transport_allowance");
            $table->float("hse_allowance");
            $table->float("airtime_allowance");
            $table->float("hospitality_allowance")->nullable();
            $table->float("gross_pay");
            $table->float("payee");
            $table->float("personalRelief");
            $table->float("incomeTax");
            $table->float("nssf");
            $table->float("nhif");
            $table->float('net_pay');
            $table->string('otherDeductions');
            $table->string('bankName');
            $table->string('bankBranch');
            $table->string('bankCode');
            $table->string('beneficiaryAccountNumber');
            $table->string('reference');
            $table->enum('approval_status', array('pending','approved','disapproved','processed'))->default('pending');
            $table->enum('status', array('active', 'inactive'))->default('active');
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
        Schema::dropIfExists('salaries');
    }
}
