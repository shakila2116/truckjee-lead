<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LocationSourcePivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_source_pivot',function (Blueprint $table){
                    $table->integer('location_id')->unsigned();
                    $table->integer('source_id')->unsigned();
                    $table->integer('truck_type')->unsigned();
                });

        Schema::table('location_source_pivot',function ($table){
            $table->foreign('location_id')->references('id')->on('location')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('source_id')->references('id')->on('source')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('truck_type')->references('id')->on('truck_models')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_source_pivot');
    }
}
