<?php

use Faker\Generator as Faker;

$factory->define(App\Building::class, function (Faker $faker) {
    return [
        'name'                  => $faker->company,
        'gold_cost'             => $faker->numberBetween(0, 20),
        'food_cost'             => $faker->numberBetween(0, 5),
        'wood_cost'             => $faker->numberBetween(0, 100),
        'stone_cost'            => $faker->numberBetween(0, 120),
        'metal_cost'            => $faker->numberBetween(0, 20),
        'cost_modifier'         => 1.00,
        'production'            => [10, 20, 30, 40, 50][rand(0, 4)],
        'production_base'       => 1.10,
        'production_modifier'   => 1.00,
        'energy'                => [10, 20, 30, 40, 50][rand(0, 4)],
        'energy_base'           => 1.10,
        'construction'          => [10, 20, 30, 40, 50][rand(0, 4)],
        'construction_base'     => 1.50,
        'construction_modifier' => 1.00,
    ];
});
