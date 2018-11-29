<?php

function create($class, $attributes = [], $times = null)
{
    return factory($class, $times)->create($attributes);
}

function make($class, $attributes = [], $times = null)
{
    return factory($class, $times)->make($attributes);
}

function getElasticsearchTestHosts()
{
    return [
        [
            'host' => $_ENV["ELASTICSEARCH_TEST_HOST"],
            'port' => $_ENV["ELASTICSEARCH_TEST_PORT"],
            'scheme' => $_ENV["ELASTICSEARCH_TEST_SCHEME"],
            'user' => $_ENV["ELASTICSEARCH_TEST_USER"],
            'pass' => $_ENV["ELASTICSEARCH_TEST_PASS"]
        ]
    ];
}
