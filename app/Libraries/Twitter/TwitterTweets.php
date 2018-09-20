<?php

namespace App\Libraries\Twitter;


class TwitterTweets extends Twitter
{

    public function getTwittsByUser($screen_name='miputotuit')
    {
        $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
        $query = array(
            'screen_name' => urlencode($screen_name),
            'tweet_mode' => 'extended'
        );
        $user = $this->getTwitterData('GET', $url, $query);
        return $user;
    }

}
