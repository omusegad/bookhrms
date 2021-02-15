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
            $table->id();
            $table->string('employeeID');
            $table->unsignedInteger('aic_jobgroups_id')->index();
            $table->unsignedInteger('aic_regions_id')->index();
            $table->unsignedInteger('aic_dccs_id')->index();
            $table->unsignedInteger('aic_lccs_id')->index();
            $table->string('fname');
            $table->string('lName');
            $table->String('education');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('created_by')->nullable();
            $table->string('otherNames')->nullable();
            $table->string('nationalID')->nullable();
            $table->string('father_name')->nullable();
			$table->string('mother_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('probation_period')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('emergencyPhoneNumber')->nullable();
            $table->string('altPhoneNumber')->nullable();
            $table->text('avatar')->nullable();
            $table->text('nhifNo')->nullable();
            $table->text('nssfNo')->nullable();
            $table->enum('gender', array('female', 'male'))->nullable();
            $table->enum('marital_status', array('married', 'single', 'divorced','separated','widowed'))->nullable();
            $table->date('joining_date')->nullable();
            $table->date('confirmation_date')->nullable();
            $table->date('department')->nullable();
            $table->string('current_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('home_county')->nullable();
            $table->string('joining_position')->nullable();
            $table->string('spouse_fname')->nullable();
            $table->string('spouse_lname')->nullable();
            $table->string('spouse_otherNames')->nullable();
            $table->string('spouse_phoneNumber')->nullable();
            $table->string('spouse_altphoneNumber')->nullable();
            $table->string('spouse_nationalId')->nullable();
            $table->string('next_of_kin_fname')->nullable();
            $table->string('next_of_kin_lname')->nullable();
            $table->string('next_of_kin_otherNames')->nullable();
            $table->string('next_of_kin_phoneNumber')->nullable();
            $table->string('next_of_kin_altPhoneNumber')->nullable();
            $table->string('next_of_kin_nationId')->nullable();
            $table->enum('employee_type', array('FIELD', 'HQ'));
            $table->enum('employee_status', array('active', 'suspended', 'fired'))->default('active');
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
        $table->text('experience')->nullable();

    }
}
