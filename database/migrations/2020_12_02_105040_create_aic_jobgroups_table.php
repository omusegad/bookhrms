<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAicJobgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aic_jobgroups', function (Blueprint $table) {
            $table->id();
            $table->foreign('id')->references('id')->on('users');
            $table->integer('aic_lcc_id')->unsigned();
            $table->integer('aic_dccs_id')->unsigned();
            $table->enum('job_grade', array('unlicenced', 'licenced', 'ordained','intern','by_years'));
            $table->enum('level', array('certificate', 'diploma','degree','postgraduate','masters'));
            $table->json('jobGroup_salaryAmnt')->nullable();
            $table->float('basic_salary');
            $table->float('hse_allowance');
            $table->float('transport_allowance');
            $table->float('airtime');
            $table->float('nhifContAmount');
            $table->float('nssfContAmount');
            $table->string('kraPin');
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
        Schema::dropIfExists('aic_jobgroups');
    }
}
