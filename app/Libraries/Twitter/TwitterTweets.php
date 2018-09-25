<?php

namespace App\Libraries\Twitter;


use Elasticsearch\ClientBuilder;

class TwitterTweets extends Twitter
{

    public function getTweetsByUser($screen_name='miputotuit')
    {
        $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
        $query = array(
            'screen_name' => urlencode($screen_name),
            'tweet_mode' => 'extended'
        );
        $user = $this->getTwitterData('GET', $url, $query);

        $builder = ClientBuilder::create()
            ->setHosts([$_ENV["ELASTICSEARCH_HOST"]]);
        $client = $builder->build();
//        foreach ($user as $t) {
//            $params = [
//                'index' => 'tweets',
//                'type' => 'tweet',
//                  'id' => 'my_id',
//                'body' => $t
//            ];
//            $client->index($params);
//        }

//        $params = [
//            'index' => 'tweets',
//            'type' => 'tweet',
//            'id' => 'my_id'
//        ];
//
//        // Get doc at /my_index/my_type/my_id
//        $response = $client->get($params);
//        dd($response);

//        $params = [
//            'index' => 'tweets',
//            'type' => 'tweet',
//            'body' => [
//                'query' => [
//                    'match' => [
//                        'id' => 1038937903362203650
//                    ]
//                ]
//            ]
//        ];

        $params = [
            'index' => 'tweets',
            'type' => 'tweet',
            "from" => 0,
            "size" => 1,
            'body' => [
                'query' => [
                    'bool' => [
                        'must' => [
                            'match' => [ 'entities.user_mentions.screen_name' => 'AlvaroUribeVel' ]
                        ]
                    ]
                ]
            ]
        ];

        $results = $client->search($params);
        dd($results);

        return $user;
    }

}
