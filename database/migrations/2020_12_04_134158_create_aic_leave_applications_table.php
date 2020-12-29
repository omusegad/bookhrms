<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAicLeaveApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('aic_leave_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('aic_leave_type_id')->index();
            $table->unsignedInteger('leave_approval_id')->index()->nullable();
			$table->date('start_date');
            $table->date('end_date');
            $table->integer('appliedDays');
            $table->integer('remainingDays')->nullable();
            $table->string('reason');
            $table->enum('leave_status', array('pending', 'approved','declined'))->default('pending');
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
        Schema::dropIfExists('aic_leave_applications');
    }
}
