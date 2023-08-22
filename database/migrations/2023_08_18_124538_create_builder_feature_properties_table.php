<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuilderFeaturePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('builder_feature_properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->nullable();
        $table->unsignedBigInteger('builder_id')->nullable();
        $table->unsignedMediumInteger('city_id')->nullable();
        $table->unsignedBigInteger('property_id')->nullable();
        $table->unsignedBigInteger('builder_card_id')->nullable();
        // Add other fields if necessary
        $table->string('status')->default('active');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('builder_id')->references('id')->on('builders')->onDelete('cascade');
        $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        $table->foreign('builder_card_id')->references('id')->on('builder_cards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('builder_feature_properties');
    }
}
