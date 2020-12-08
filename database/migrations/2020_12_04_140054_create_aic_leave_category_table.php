<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAicLeaveCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aic_leave_category', function (Blueprint $table) {
            $table->id();
            $table->foreign('id')->references('id')->on('users');
            $table->string('leave_category');
            $table->text('leave_category_description');
            $table->tinyInteger('publication_status');
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
        Schema::dropIfExists('aic_leave_category');
    }
}
