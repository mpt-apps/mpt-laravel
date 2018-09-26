<?php

namespace App\Libraries\Elastic;

use Elasticsearch\ClientBuilder;


class Elastic
{

    protected $client;

    /**
     * Elastic constructor.
     */
    function __construct()
    {
        $hosts = [
            [
                'host' => $_ENV["ELASTICSEARCH_HOST"],
                'port' => $_ENV["ELASTICSEARCH_PORT"],
                'scheme' => $_ENV["ELASTICSEARCH_SCHEME"],
                'user' => $_ENV["ELASTICSEARCH_USER"],
                'pass' => $_ENV["ELASTICSEARCH_PASS"]
            ]
        ];
        $this->client = ClientBuilder::create()
            ->setHosts($hosts)
            ->build();
    }

    /**
     * @param $hosts
     */
    public function setHosts($hosts)
    {
        $this->client = ClientBuilder::create()
            ->setHosts($hosts)
            ->build();
    }

    /**
     * @param $index_name
     */
    public function deleteIndex($index_name)
    {
        $params = ['index' =>$index_name];
        $this->client->indices()->delete($params);
    }

}