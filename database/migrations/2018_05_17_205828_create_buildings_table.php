<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->bigInteger('gold_cost');
            $table->bigInteger('food_cost');
            $table->bigInteger('wood_cost');
            $table->bigInteger('stone_cost');
            $table->bigInteger('metal_cost');
            $table->decimal('cost_modifier', 3, 2);
            $table->bigInteger('production'); // production per hour
            $table->decimal('production_base', 3, 2);
            $table->decimal('production_modifier', 3, 2);
            $table->bigInteger('energy');
            $table->decimal('energy_base', 3, 2);
            $table->integer('construction');
            $table->decimal('construction_base', 3, 2);
            $table->decimal('construction_modifier', 3, 2);
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
        Schema::dropIfExists('buildings');
    }
}
