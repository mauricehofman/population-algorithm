<?php

use Faker\Generator as Faker;

$factory->define(App\Resource::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'gold' => 0
    ];
});
