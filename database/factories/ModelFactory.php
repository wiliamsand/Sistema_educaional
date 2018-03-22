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

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use SGA\Models\ClassInformation;
use SGA\Models\Subject;

$factory->define( \SGA\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'enrolment' => str_random(6)
    ];
});
$factory->define(\SGA\Models\UserProfile::class, function (Faker\Generator $faker) {
	return [
		'address' => $faker->address,
		'cep' => function() use($faker){
			$cep = preg_replace('/[^0-9]/','',$faker->postcode());
			return $cep;
		},
		'number' => rand(1,100),
		'complement' => "Teste",
		'city' => $faker->city,
		'neighborhood' => $faker->city,
		'state' => collect(\SGA\Models\State::$states)->random(),
	];
});
$factory->define(Subject::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->word,
	];
});

$factory->define(ClassInformation::class, function (Faker\Generator $faker) {
	return [
		'date_start' => $faker->date(),
		'date_end' => $faker->date(),
		'cycle' => rand(1,8),
		'subdivision' => rand(1,16),
		'semester' => rand(1,2),
		'year' => rand(2017,2030),
	];
});