<?php

namespace App\Libraries\Twitter;


//use Elasticsearch\ClientBuilder;

class TwitterTweets extends Twitter
{

    /**
     * @param string $screen_name
     * @return mixed
     */
    public function getTweetsByUser($screen_name='miputotuit')
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
