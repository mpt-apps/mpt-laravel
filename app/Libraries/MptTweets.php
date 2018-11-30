<?php
namespace App\Libraries;


use App\Influencer;
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


    public function updateTweets(){

        $influencers = Influencer::where('active', 1)->get();

        foreach ($influencers as $influencer) {
            dump('Twitter User: '. $influencer['name'].' -- Screen Name: '.$influencer['twitter_screen_name']);
            $this->storeTweetsByUser($influencer['twitter_screen_name']);
        }
    }


    public function storeTweetsByUser($screen_name)
    {
        $tweets = $this->twitter->getTweetsByUser($screen_name);

        if (count($tweets) > 0) {
            foreach ($tweets as $tweet) {
                if ($new = $this->elasticsearch->saveTweet($tweet)) {
                    dump($new['_id']);
                }
            }
        }
    }



}