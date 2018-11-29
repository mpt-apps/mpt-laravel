<?php
namespace App\Libraries;


use App\Libraries\Elastic\ElasticTweets;
use App\Libraries\Twitter\TwitterTweets;

class MptTweets
{
    protected $twitter;
    protected $elasticsearch;



    public function __construct(ElasticTweets $elasticsearch = null)
    {
        $this->twitter = new TwitterTweets();
        $this->elasticsearch = $elasticsearch ?: new ElasticTweets();
    }


    public function storeTweetsByUser($screen_name)
    {
        $tweets = $this->twitter->getTweetsByUser($screen_name);

        foreach ($tweets as $tweet) {
            $new = $this->elasticsearch->saveTweet($tweet);
        }
    }



}