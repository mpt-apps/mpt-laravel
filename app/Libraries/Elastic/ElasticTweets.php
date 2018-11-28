<?php

namespace App\Libraries\Elastic;


class ElasticTweets extends Elastic
{
    protected $elastic_info;

    /**
     * ElasticTweets constructor.
     */
    function __construct()
    {
        parent::__construct();

        $this->elastic_info = [
            'index' => 'twitter',
            'type' => 'tweets'
        ];
    }

    /**
     * @param $tweets
     */
    public function storeTweets($tweets)
    {
        foreach($tweets as $tweet) {
            $this->saveTweet($tweet);
        }

    }

    /**
     * @param $body
     * @param string $id
     */
    public function saveTweet($body, $id ='')
    {
        $params = [
            'index' => $this->elastic_info['index'],
            'type' => $this->elastic_info['type'],
            'id' => $body->id_str,
            'body' => $body
        ];
        if (trim($id) != '') {
            $params['id'] = $id;
        }
        return $this->client->index($params);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getTweet($id)
    {
        $params = [
            'index' => $this->elastic_info['index'],
            'type' => $this->elastic_info['type'],
            'id' => $id
        ];
        $response = $this->client->get($params);
        return $response['_source'];
    }

    /**
     * @param $seacrh
     * @return array
     */
    public function getTweetsByInfluencer($seacrh)
    {
        $field = '';
        $search_value = '';
        if (isset($seacrh['screen_name']) && trim($seacrh['screen_name']) != '') {
            $field = 'user.screen_name';
            $search_value = trim($seacrh['screen_name']);
        }else if (isset($seacrh['id']) && trim($seacrh['id']) != '') {
            $field = 'user.id_str';
            $search_value = trim($seacrh['id']);
        }
        if ($field != '') {
            $params = [
                'index' => $this->elastic_info['index'],
                'type' => $this->elastic_info['type'],
                "size" => 50,
                'body' => [
                    'query' => [
                        'bool' => [
                            'must' => [
                                'match' => [$field => $search_value]
                            ]
                        ]
                    ]
                ]
            ];
            $response = $this->client->search($params);
            $results = $response['hits']['hits'];
        }else {
            $results = array();
        }
        return $results;
    }

    /**
     * @return array
     */
    public function getAll() {
        $params = [
            "size" => 50,
            'index' => $this->elastic_info['index'],
            'type' => $this->elastic_info['type'],
            "body" => [
                "query" => [
                    "match_all" => new \stdClass()
                ]
            ]
        ];
        $response = $this->client->search($params);
        return $response['hits']['hits'];
    }


}