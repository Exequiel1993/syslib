<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Informe;
use Faker\Generator as Faker;

$factory->define(Informe::class, function (Faker $faker) {

    return [
        'empresa' => $faker->word,
        'direccion' => $faker->word,
        'telefono' => $faker->word,
        'imagen' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
