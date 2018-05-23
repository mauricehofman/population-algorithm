<?php

use Faker\Generator as Faker;

$factory->define(App\Building::class, function (Faker $faker) {
    return [
        'name'  => $faker->company,
        'building_type_id' => function () {
            return factory(App\BuildingType::class)->create()->id;
        }
    ];
});
