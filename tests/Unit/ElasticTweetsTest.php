<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Libraries\Elastic\ElasticTweets;
use App\Libraries\Twitter\TwitterTweets;

class ElasticTweetsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_returns_false_if_twitter_by_id_does_not_exist()
    {
        $tweetsManagerInElasticsearch = new ElasticTweets(
            getElasticsearchTestHosts()
        );

        $tweets = $tweetsManagerInElasticsearch->getTweetById('11111111');

        $this->assertFalse($tweets);
    }

    /** @test */
    public function it_create_a_new_index()
    {
        $tweetsManagerInElasticsearch = new ElasticTweets(
            getElasticsearchTestHosts()
        );
        $tweetsManagerInElasticsearch->deleteIndex('twitter');

        $response = $tweetsManagerInElasticsearch->createIndex();

        $this->assertEquals('twitter', $response['index']);

        $response = $tweetsManagerInElasticsearch->createIndex();

        $this->assertFalse($response);

    }
}
