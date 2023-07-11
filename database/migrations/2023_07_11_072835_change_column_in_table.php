<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property_details', function (Blueprint $table) {
            $table->string('property_title', 255)->after('id')->nullable();
            $table->text('locality')->after('currency')->nullable();
            $table->string('rera_number',100)->after('currency')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('property_details', function (Blueprint $table) {
            //
        });
    }
}
