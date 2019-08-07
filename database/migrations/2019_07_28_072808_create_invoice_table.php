<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('appointment_id')->unsigned();
            $table->integer('usg')->nullable();
            $table->integer('drip')->nullable();
            $table->integer('lab')->nullable();
            $table->integer('other')->nullable();
            $table->string('remarks')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();

            $table->foreign('appointment_id')->references('id')->on('appointment')
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
        Schema::dropIfExists('invoice');
    }
}
