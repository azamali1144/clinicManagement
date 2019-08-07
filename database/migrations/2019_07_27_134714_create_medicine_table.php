<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('company')->nullable();
            $table->string('formula')->nullable();
            $table->string('appearance')->nullable();
            $table->string('colour')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('price')->nullable();
            $table->string('delivered_by')->nullable();
            $table->string('taste')->nullable();
            $table->date('expiry_date')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('medicine');
    }
}
