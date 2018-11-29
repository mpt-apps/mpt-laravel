<?php

namespace App\Libraries\Elastic;

use Elasticsearch\ClientBuilder;


class Elastic
{

    protected $client;
    protected $hosts;

    function __construct($hosts = null)
    {
        $this->hosts = $hosts ?: [
            [
                'host' => $_ENV["ELASTICSEARCH_HOST"],
                'port' => $_ENV["ELASTICSEARCH_PORT"],
                'scheme' => $_ENV["ELASTICSEARCH_SCHEME"],
                'user' => $_ENV["ELASTICSEARCH_USER"],
                'pass' => $_ENV["ELASTICSEARCH_PASS"]
            ]
        ];

        $this->setClient();

    }

    public function setClient()
    {
        $this->client = ClientBuilder::create()
            ->setHosts($this->hosts)
            ->build();
    }


    public function setHosts($hosts)
    {
        $this->client = ClientBuilder::create()
            ->setHosts($hosts)
            ->build();
    }



    public function deleteIndex($index_name)
    {
        $params = ['index' =>$index_name];
        try {
            $this->client->indices()->delete($params);
        } catch (\Exception $exception){
            dump($exception->getMessage());
        }
    }

}