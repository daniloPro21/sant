<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
use App\Profile;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'role' => 'pateint',
        'phone' => $faker->phoneNumber,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});


$factory->define(Appointment::class, function (Faker $faker) {
    return [
        'motif' => $faker->paragraph(4),
        'from' =>  $faker->name,
        'to' => 1,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'heure' => $faker->time,
        'jour' => 'lundi', // password
        'status' => 0,
    ];
});


$factory->define(Profile::class, function (Faker $faker) {
    $user_id = rand(1, 3);
    return [
        'description' => $faker->paragraph(3),
        'programme' => "lundi, Mercredi, Jeudi, Vendredi",
        'heure_ou' => $faker->time(),
        'heure_fm' => $faker->time(),
        'specialite' => 'Medecin generale',
        'avatar' => 'http://www.hotavatars.com/wp-content/uploads/2019/01/I80W1Q0.png',
        'status' => 'Marier',
        'ville' => $faker->city,
        'quatier' => $faker->name,
        'hopital' => $faker->city,
        'user_id' => 9
    ];
});
