<?php

namespace App\Libraries\Elastic;


class ElasticTweets extends Elastic
{
    protected $elastic_info;

    /**
     * ElasticTweets constructor.
     */
    function __construct($hosts = null)
    {
        parent::__construct($hosts);

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
    public function saveTweet($body, $id = '')
    {
        $id = $body->id_str ?: $id;

        $params = [
            'index' => $this->elastic_info['index'],
            'type' => $this->elastic_info['type'],
            'id' => $body->id_str,
            'body' => $body
        ];

        if (trim($id) != '' && !$this->getTweetById($id)) {
            $params['id'] = $id;
            return $this->client->index($params);
        }

        return false;
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getTweetById($id)
    {
        $params = [
            'index' => $this->elastic_info['index'],
            'type' => $this->elastic_info['type'],
            'id' => $id
        ];

        try {
            $response = $this->client->get($params);
            return $response['_source'];
        } catch (\Exception $exception){
            return false;
        }
    }


    /**
     * @param $search
     * @return array
     */
    public function getTweetsByInfluencer($search)
    {
        $field = '';
        $search_value = '';
        if (isset($search['screen_name']) && trim($search['screen_name']) != '') {
            $field = 'user.screen_name';
            $search_value = trim($search['screen_name']);
        }else if (isset($search['id']) && trim($search['id']) != '') {
            $field = 'user.id_str';
            $search_value = trim($search['id']);
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
        try {
            $response = $this->client->search($params);
            return $response['hits']['hits'];
        }catch (\Exception $exception){
            dump($exception->getMessage());
        }

    }




}