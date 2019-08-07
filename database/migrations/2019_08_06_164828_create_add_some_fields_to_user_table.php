<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddSomeFieldsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('dob')->nullable()->after('email');
            $table->string('gender')->nullable()->after('email');
            $table->string('cnic')->nullable()->after('email');
            $table->string('address')->nullable()->after('email');
            $table->boolean('status')->default(1)->after('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('dob');
            $table->dropColumn('gender');
            $table->dropColumn('cnic');
            $table->dropColumn('address');
            $table->dropColumn('status');
        });
    }
}
