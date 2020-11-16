<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Detalle;
use Faker\Generator as Faker;

$factory->define(Detalle::class, function (Faker $faker) {

    return [
        'articulo_id' => $faker->randomDigitNotNull,
        'cantidad' => $faker->randomDigitNotNull,
        'precioCompra' => $faker->randomDigitNotNull,
        'subtotal' => $faker->randomDigitNotNull,
        'compra_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
