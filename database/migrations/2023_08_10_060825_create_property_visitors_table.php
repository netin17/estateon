<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_visitors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedBigInteger('property_id');
            $table->timestamp('visited_at')->nullable();
            $table->timestamps();
    
            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('property_visitors');
    }
}
