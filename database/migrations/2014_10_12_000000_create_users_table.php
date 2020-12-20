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
            $table->string('aic_jobgroups_id');
            $table->string('fname');
            $table->string('lName');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('created_by')->nullable();
            $table->string('otherNames')->nullable();
            $table->string('father_name')->nullable();
			$table->string('mother_name')->nullable();
            $table->string('employeeID')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('probation_period')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('emergencyPhoneNumber')->nullable();
            $table->string('altPhoneNumber')->nullable();
            $table->text('experience')->nullable();
            $table->text('avatar')->nullable();
            $table->text('nhifNo')->nullable();
            $table->text('nssfNo')->nullable();
            $table->enum('gender', array('female', 'male'));
            $table->enum('marital_status', array('married', 'single', 'divorced','separated','widowed'))->nullable();
            $table->date('joining_date');
            $table->date('confirmation_date')->nullable();
            $table->date('department')->nullable();
            $table->string('current_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('bankName')->nullable();
            $table->string('bankBranch')->nullable();
            $table->string('accountNumber')->nullable();
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
            $table->enum('employee_status', array('active', 'suspended', 'fired'))->default('active');
            $table->String('education_level')->nullable();
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
