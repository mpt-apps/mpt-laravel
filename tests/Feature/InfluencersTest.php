<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Libraries\Twitter\TwitterUsers;
use App\Libraries\Twitter\TwitterTweets;
use App\Libraries\Elastic\ElasticTweets;

class InfluencersTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_list_influencers()
    {
        $this->signIn();

        $influencer = create('App\Influencer');

        $this->get('/admin/influencers/list')
            ->assertSee($influencer->twitter_screen_name);
    }

    /** @test */
    public function an_unauthenticated_user_cannot_list_influencers()
    {
        $this->withExceptionHandling();

        $this->get('/admin/influencers')
            ->assertRedirect('/login');
    }


    /** @test  */
    public function an_authenticated_user_can_store_new_influencer_if_it_exist_on_twitter_using_form()
    {
        $this->signIn();

        // Succes saving new twitter influencer
        $response = $this->post('/admin/influencers', array('screen_name' => 'miputotuit'));
        $this->get($response->headers->get('Location').'/list')
            ->assertSee("miputotuit");

        // Error if the influencer exist in mpt db
        $response = $this->post('/admin/influencers', array('screen_name' => 'miputotuit'));
        $this->get($response->headers->get('Location'))
            ->assertSee("Error saving a new influencer");

        // Eror if user does not exist in twitter
        $response = $this->post('/admin/influencers', array('screen_name' => 'miputotuitzzzzzzzzzzzzzzxx'));
        $this->get($response->headers->get('Location'))
            ->assertSee("Error - User not found !!!");
    }


    /** @test  */
    public function an_authenticated_user_can_list_tweets_from_a_influencer_selected()
    {
        $this->signIn();
        $influencer = create('App\Influencer');

        $twitter = new TwitterTweets();
        $tweets = $twitter->getTweetsByUser($influencer->twitter_screen_name);

        $etweets = new ElasticTweets();
        $etweets->deleteIndex('twitter');

        $etweets->storeTweets($tweets);

        sleep(2);

        $this->get('/admin/influencers/'.$influencer->id.'/tweets/list')
            ->assertSee($tweets[0]->id);
    }



}
