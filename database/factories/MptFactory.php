<?php

use Faker\Generator as Faker;
use App\Libraries\Twitter\TwitterUsers;

$factory->define(App\Influencer::class, function (Faker $faker) {
    $tusers = new TwitterUsers();
    $data = $tusers->getRandomUser();
    return [
        'screen_name' => $data->screen_name,
        'name' => $data->name,
        'twitter_id' => $data->id_str,
        'twitter_screen_name' => $data->screen_name,
        'twitter_name' => $data->name,
        'twitter_description' => $data->description,
        'twitter_personal_url' => $data->url,
        'twitter_url' => 'https://twitter.com/'.$data->screen_name,
        'twitter_followers_count' => $data->followers_count,
        'twitter_friends_count' => $data->friends_count,
        'twitter_statuses_count' => $data->statuses_count,
        'twitter_image_normal_url' => $data->profile_image_url_https,
        'twitter_image_url' => str_replace("_normal","",$data->profile_image_url_https)
        ];
});
