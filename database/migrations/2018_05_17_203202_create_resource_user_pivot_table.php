<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateResourceUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_user', function (Blueprint $table) {
            $table->unsignedInteger('resource_id')->index();
            $table->unsignedInteger('user_id')->index();
            $table->bigInteger('amount')->default(500);

            $table->foreign('resource_id')->references('id')->on('resources');
            $table->foreign('user_id')->references('id')->on('users');

            $table->primary(['resource_id', 'user_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resource_user');
    }
}
