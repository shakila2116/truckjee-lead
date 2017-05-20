<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Location extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location',function (Blueprint $table){
            $table->increments('id');
            $table->string('formatted_address');
            $table->string('state');
            $table->string('district')->nullable();
            $table->string('locality')->nullable();
            $table->integer('created_by')->unsigned();
            $table->timestamps();
        });

        Schema::table('location',function ($table){
            $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location');
    }
}
