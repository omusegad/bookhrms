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
            $table->string('fName');
            $table->string('lName');
            $table->string('otherNames')->nullable();
            $table->string('employeeID')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('phoneNumber');
            $table->string('emergency_contact', 30);
            $table->string('altPhoneNumber')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->text('profile_photo_path')->nullable();
            $table->text('nhifNo')->nullable();
            $table->text('nssfNo')->nullable();
            $table->string('aic_jobgroups_id');
            $table->enum('gender', array('female', 'male'));
            $table->enum('marital_status', array('married', 'single', 'divorced','separated','widowed'));
            $table->enum('employee_status', array('active', 'suspended', 'fired'));
            $table->date('joining_date');
            $table->string('present_residence');
			$table->string('permanent_residence')->nullable();
            $table->string('home_county')->nullable();
            $table->string('joining_position')->nullable();
            $table->string('spouse_fname');
            $table->string('spouse_lname');
            $table->string('spouse_otherNames')->nullable();
            $table->string('spouse_phoneNumber');
            $table->string('spouse_altphoneNumber')->nullable();
            $table->string('spouse_nationalId')->nullable();
            $table->string('next_of_kin_fname');
            $table->string('next_of_kin_lname');
            $table->string('next_of_kin_otherNames')->nullable();
            $table->string('next_of_kin_phoneNumber');
            $table->string('next_of_kin_altPhoneNumber')->nullable();
            $table->string('next_of_kin_nationId');
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
