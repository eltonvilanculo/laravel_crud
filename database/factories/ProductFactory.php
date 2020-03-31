<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [

            'product_name'=>$faker->unique(true)->word,
            'product_desc'=>$faker->text,
            'product_image'=>'http://127.0.0.1:8000/storage/images/aio.jpg',


        //
    ];
});
