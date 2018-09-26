<?php
namespace App\Libraries\Twitter;

/**
 * Class Twitter
 * @package App\Libraries\Twitter
 */
class Twitter
{
    protected $access_token;
    protected $access_token_secret;
    protected $api_key;
    protected $api_secret_key;

    /**
     * Twitter constructor.
     */
    function __construct(){
        $this->access_token = $_ENV["TWITTER_TOKEN"];
        $this->access_token_secret = $_ENV["TWITTER_TOKEN_SECRET"];
        $this->api_key = $_ENV["TWITTER_API_KEY"];
        $this->api_secret_key = $_ENV["TWITTER_API_SECRET_KEY"];
    }

    /**
     *
     * @return array
     */
    function getTwitterOauth() {
        return array(
            'oauth_consumer_key' => $this->api_key,
            'oauth_nonce' => time(),
            'oauth_signature_method' => 'HMAC-SHA1',
            'oauth_token' => $this->access_token,
            'oauth_timestamp' => time(),
            'oauth_version' => '1.0'
        );
    }

    /**
     *
     * @param $method
     * @param $url
     * @param array $query
     * @return mixed
     */
    function getTwitterData($method, $url, $query = array()) {
        $oauth = $this->getTwitterOauth();
        $base_params = empty($query) ? $oauth : array_merge($query,$oauth);
        $base_info = $this::buildBaseString($url, $method, $base_params);
        $url = empty($query) ? $url : $url . "?" . http_build_query($query);

        $composite_key = rawurlencode($this->api_secret_key) . '&' . rawurlencode($this->access_token_secret);
        $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
        $oauth['oauth_signature'] = $oauth_signature;

        $header = array($this->buildAuthorizationHeader($oauth), 'Expect:');
        $options = array( CURLOPT_HTTPHEADER => $header,
            CURLOPT_HEADER => false,
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false);

        $feed = curl_init();
        curl_setopt_array($feed, $options);
        $json = curl_exec($feed);
        curl_close($feed);
        return  json_decode($json);
    }

    /**
     *
     * @param $baseURI
     * @param $method
     * @param $params
     * @return string
     */
    function buildBaseString($baseURI, $method, $params)
    {
        $r = array();
        ksort($params);
        foreach($params as $key=>$value){
            $r[] = "$key=" . rawurlencode($value);
        }
        return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
    }

    /**
     *
     * @param $oauth
     * @return string
     */
    function buildAuthorizationHeader($oauth)
    {
        $r = 'Authorization: OAuth ';
        $values = array();
        foreach($oauth as $key=>$value)
            $values[] = "$key=\"" . rawurlencode($value) . "\"";
        $r .= implode(', ', $values);
        return $r;
    }

}
