<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Influencer;
use App\Libraries\Elastic\ElasticTweets;

class TweetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Influencer $influencer)
    {
        return view('admin.tweets.index', compact('influencer'));
    }

    public function list(Influencer $influencer){
        $etweets = new ElasticTweets();
        $tweets = $etweets->getTweetsByInfluencer([
            'screen_name'=> $influencer->twitter_screen_name
        ]);

        return $tweets;
    }
}
