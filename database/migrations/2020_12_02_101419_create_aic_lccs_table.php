<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAicLccsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aic_lccs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('aic_dccs_id')->index();
            $table->string('lccName');
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
        Schema::dropIfExists('aic_lccs');
    }
}
