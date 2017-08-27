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
$factory->define(\App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(\App\Models\Store::class, function (Faker\Generator $faker) {
    return [
        'store_name' => $faker->name,
        'status' => 1,
        'location_id' => 100,
        'store_phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'online' =>1,
        'start_time' => time(),
        'end_time' => time(),
        'view_img' => $faker->imageUrl(125,125),
        'store_logo' => $faker->imageUrl(125,125),
        'banner' => '',
        'book_time' => '',
        'content' => $faker->paragraph(3)
    ];
});

$factory->define(\App\Models\Goods::class, function (Faker\Generator $faker) {
    return [
        'goods_name' => $faker->name,
        'attractive_title' => $faker->title,
        'store_id' => 2,
        'cate_id' => 1,
        'stcate_ids' => random_int(1,4),
        'goods_image' =>$faker->imageUrl(254,171),
        'goods_state' => 1,
        'goods_price' => $faker->randomFloat(2, 1, 1000),
        'market_price' => $faker->randomFloat(2, 1, 1000),
        'goods_click' => random_int(1,2000),
        'sale_num' => random_int(1,2000),
        'evaluation_count' => random_int(1,2000)
    ];
});
