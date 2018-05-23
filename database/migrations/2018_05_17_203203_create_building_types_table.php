<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_types', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resource_id');
            // Leveling up cost
            $table->bigInteger('gold_cost');
            $table->bigInteger('wood_cost');
            $table->bigInteger('stone_cost');
            $table->bigInteger('metal_cost');
            $table->decimal('cost_base', 3, 2);
            $table->decimal('cost_modifier', 3, 2);
            // Production
            $table->bigInteger('production');
            $table->decimal('production_base', 3, 2);
            $table->decimal('production_modifier', 3, 2);
            // Energy consumption
            $table->bigInteger('energy');
            $table->decimal('energy_base', 3, 2);
            $table->decimal('energy_modifier', 3, 2);
            // Construction time
            $table->integer('construction');
            $table->decimal('construction_base', 3, 2);
            $table->decimal('construction_modifier', 3, 2);
            $table->timestamps();

            $table->foreign('resource_id')->references('id')->on('resources');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('building_types');
    }
}
