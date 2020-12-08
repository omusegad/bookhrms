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
    public function up()
    {
        Schema::create('aic_leave_applications', function (Blueprint $table) {
            $table->id();
            $table->foreign('id')->references('id')->on('users');
			$table->integer('leave_category_id');
			$table->date('start_date');
			$table->date('end_date');
			$table->text('reason');
			$table->tinyInteger('publication_status')->default(0);
			$table->tinyInteger('deletion_status')->default(0);
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
