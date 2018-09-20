<?php

use Faker\Generator as Faker;

$factory->define(App\Influencer::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'screen_name'  => $faker->word,
        'twitter_id' => $faker->word,
        'twitter_screen_name'  => $faker->word
    ];
});
