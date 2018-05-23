<?php

use Faker\Generator as Faker;

$factory->define(App\BuildingType::class, function (Faker $faker) {
    return [
        'resource_id' => function () {
            return factory(App\Resource::class)->create()->id;
        },
        'gold_cost'             => $faker->numberBetween(0, 20),
        'wood_cost'             => $faker->numberBetween(0, 100),
        'stone_cost'            => $faker->numberBetween(0, 120),
        'metal_cost'            => $faker->numberBetween(0, 20),
        'cost_base'             => 1.10,
        'cost_modifier'         => 1.00,
        'production'            => [10, 20, 30, 40, 50][rand(0, 4)],
        'production_base'       => 1.10,
        'production_modifier'   => 1.00,
        'energy'                => [10, 20, 30, 40, 50][rand(0, 4)],
        'energy_base'           => 1.10,
        'energy_modifier'       => 1.00,
        'construction'          => [10, 20, 30, 40, 50][rand(0, 4)],
        'construction_base'     => 1.50,
        'construction_modifier' => 1.00,
    ];
});
