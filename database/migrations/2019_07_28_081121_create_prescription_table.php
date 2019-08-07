<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescription', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('appointment_id')->unsigned();
            $table->integer('medicine_id')->unsigned();
            $table->integer('unit')->nullable();
            $table->string('type')->nullable();
            $table->string('dosage')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();

            $table->foreign('appointment_id')->references('id')->on('appointment')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('medicine_id')->references('id')->on('medicine')
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
        Schema::dropIfExists('prescription');
    }
}
