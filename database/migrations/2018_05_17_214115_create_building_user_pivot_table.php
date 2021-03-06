<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateBuildingUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_user', function (Blueprint $table) {
            $table->unsignedInteger('building_id')->index();
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('level')->default(1);

            $table->foreign('building_id')->references('id')->on('buildings');
            $table->foreign('user_id')->references('id')->on('users');
            $table->primary(['building_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('building_user');
    }
}
