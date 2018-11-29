<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Libraries\MptTweets;
use App\Libraries\Elastic\ElasticTweets;
use App\Libraries\Twitter\TwitterTweets;

class TweetsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function mpt_store_last_tweet_from_a_influencer()
    {
        $twitter = new TwitterTweets();
        $tweets = $twitter->getTweetsByUser();
        $tweet = $tweets[0];

        $etweets = new ElasticTweets(
            getElasticsearchTestHosts()
        );
        $etweets->deleteIndex('twitter');
        $etweets->saveTweet($tweet);

        $etweet = $etweets->getTweetById($tweet->id_str);

        $this->assertEquals($tweet->created_at, $etweet['created_at']);
    }



    /** @test */
    public function mpt_get_tweets_by_user()
    {
        $etweets = new ElasticTweets(
            getElasticsearchTestHosts()
        );
        $etweets->deleteIndex('twitter');

        $twitter = new TwitterTweets();
        $tweets1 = $twitter->getTweetsByUser();
        $tweets2 = $twitter->getTweetsByUser('AlvaroUribeVel');

        $etweets->storeTweets($tweets1);
        $etweets->storeTweets($tweets2);

        sleep(2);

        $tweets11 = $etweets->getTweetsByInfluencer([
            'screen_name'=> 'miputotuit'
        ]);

        $tweets22 = $etweets->getTweetsByInfluencer([
            'screen_name'=> 'AlvaroUribeVel'
        ]);

        $this->assertEquals(count($tweets1), count($tweets11));
        $this->assertEquals(count($tweets2), count($tweets22));
    }

    /** @test */
    public function mpt_store_tweets_from_a_influencer()
    {
        $elasticsearchTweetsManager = new ElasticTweets(
            getElasticsearchTestHosts()
        );
        $elasticsearchTweetsManager->deleteIndex('twitter');

        $tweets = $elasticsearchTweetsManager->getAll();

        $this->assertCount(0, $tweets);


        $mptTweetsManager = new MptTweets($elasticsearchTweetsManager);

        $mptTweetsManager->storeTweetsByUser('miputotuit');


        sleep(2);

        $tweets = $elasticsearchTweetsManager->getAll();

        $this->assertTrue(count($tweets) > 0);

    }




}
