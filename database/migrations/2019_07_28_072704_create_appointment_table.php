<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('consultant_id')->unsigned();
            $table->date('appointment_date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('diagnosed_with')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patient')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('consultant_id')->references('id')->on('consultant')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment');
    }
}
