<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Member::class, function (Faker\Generator $faker) {
    return [
        'admin' => $faker->boolean(),
        'department_id' => $faker->numberBetween(600,699),
        'name' => $faker->name(),
        'phone' => $faker->numberBetween(1000000000,9999999999),
        'carrier' => $faker->domainName(),
        'rank' => $faker->randomElement(['Firefighter','Captain','Chief']),
        'rip_runs' => $faker->boolean(),
        'notifications' => $faker->boolean(),
        'password' => bcrypt('password')
    ];
});
