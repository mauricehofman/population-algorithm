<?php

use Faker\Generator as Faker;

$factory->define(App\Resource::class, function (Faker $faker) {
    return [
        'name' => ['gold', 'wood', 'food', 'metal', 'stone'][rand(0,4)]
    ];
});
