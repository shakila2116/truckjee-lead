<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Source extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('source', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('company_name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->smallInteger('type');
            $table->integer('lead_location_id')->unsigned();
            $table->timestamps();
        });
        Schema::create('truck_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });
        Schema::table('source',function ($table){
            $table->foreign('lead_location_id')->references('id')->on('location')->onUpdate('cascade')->onDelete('cascade');

        });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('source');
        Schema::dropIfExists('truck_models');
    }
}
