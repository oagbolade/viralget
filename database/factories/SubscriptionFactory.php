<?php

use Faker\Generator as Faker;

$factory->define(App\UserDetails::class, function (Faker $faker) {
    static $number = 1;

    return [
        'user_id' => $number++,
        'name' => $faker->name,
        'company_name' => $faker->company,
        'phone' => $faker->tollFreePhoneNumber,
        'address' => $faker->streetAddress,
    ];
});
