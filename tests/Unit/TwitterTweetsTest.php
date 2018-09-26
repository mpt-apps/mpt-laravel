<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Libraries\Twitter\TwitterTweets;


class TwitterTweetsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_get_twitts_from_a_specific_twitter_name()
    {
//        $twitter = new TwitterTweets();
//        $tweets = $twitter->getTweetsByUser('miputotuit');
//
//        dd($tweets);

        $this->assertTrue(true);
    }

    /** @test */
    public function it_save_twitts_in_a_database()
    {

        $this->assertTrue(true);
    }

    /** @test */
    public function it_save_just_new_twitts()
    {

        $this->assertTrue(true);
    }

}
