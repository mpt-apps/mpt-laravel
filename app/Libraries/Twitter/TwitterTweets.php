<?php

namespace App\Libraries\Twitter;


//use Elasticsearch\ClientBuilder;

class TwitterTweets extends Twitter
{

    public function getTweetById($id)
    {
        $url = $this->api_url."statuses/show.json";

        $query = array(
            'id' => $id,
            'tweet_mode' => 'extended'
        );

        $tweet = $this->getData([
            'method' => 'GET',
            'url' => $url,
            'query' => $query
        ]);

        return $tweet;
    }


    public function getTweetsByUser($screen_name='miputotuit')
    {
        $url = $this->api_url."statuses/user_timeline.json";

        $query = array(
            'screen_name' => urlencode($screen_name),
            'tweet_mode' => 'extended'
        );

        $user = $this->getData([
            'method' => 'GET',
            'url' => $url,
            'query' => $query
        ]);

        return $user;
    }





}
