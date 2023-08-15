<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnsInPropertyDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property_details', function (Blueprint $table) {
            $table->mediumInteger('state_id')->unsigned()->nullable()->after('furnished');
            $table->mediumInteger('city_id')->unsigned()->nullable()->after('state_id');
            $table->string('property_status')->nullable()->after('city_id');
            $table->string('property_age')->nullable()->after('property_status');
            $table->string('possesion_by')->nullable()->after('property_age');
            $table->integer('numbers_of_floors')->nullable()->after('possesion_by');
            $table->string('user_type')->nullable()->after('numbers_of_floors');
            $table->integer('cover_parkings')->nullable()->after('user_type');
            $table->integer('open_parkings')->nullable()->after('cover_parkings');

            // Rename existing columns
            $table->renameColumn('size', 'carpet_area');
            $table->renameColumn('length', 'super_area');
            $table->renameColumn('width', 'build_up_area');
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
            $table->dropColumn(['state_id', 'city_id', 'property_status', 'property_age', 'possesion_by', 'numbers_of_floors', 'user_type', 'cover_parkings', 'open_parkings']);
            $table->renameColumn('carpet_area', 'size');
            $table->renameColumn('super_area', 'length');
            $table->renameColumn('build_up_area', 'width');
        });
    }
}
