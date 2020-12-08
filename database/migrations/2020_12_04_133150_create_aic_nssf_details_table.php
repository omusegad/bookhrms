<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAicNssfDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aic_nssf_details', function (Blueprint $table) {
            $table->id();
            $table->foreign('id')->references('id')->on('users');
            $table->float("amount");
            $table->enum('status', array('active', 'inactive'));
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
        Schema::dropIfExists('aic_nssf_details');
    }
}
