<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Articulo;
use Faker\Generator as Faker;

$factory->define(Articulo::class, function (Faker $faker) {

    return [
        'codigoUnico' => $faker->word,
        'descripcion' => $faker->word,
        'imagen' => $faker->word,
        'cantidad' => $faker->randomDigitNotNull,
        'precioVenta' => $faker->word,
        'stockMinimo' => $faker->word,
        'stockMaximo' => $faker->word,
        'tipoArticulo_id' => $faker->randomDigitNotNull,
        'marca_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
