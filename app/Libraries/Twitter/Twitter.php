<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/09/18
 * Time: 12:37 PM
 */

namespace App\Libraries\Twitter;


class Twitter
{
    protected $access_token = "46398437-puAC4bJb7CnXMZwhkZUS1xlAPMzbEnOfqaYcScfor";
    protected $access_token_secret = "Tc26FUwk08vqGnPBJSI2b92qoJoAAYlIAqmEGsRw5O7OW";
    protected $api_key = "wOfhwIm5ZlBEpEiWq6ul2A";
    protected $api_secret_key = "MX6PhwTifqmWPMCz24I46PczkIlwAAR87hiVYx0gw";

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

    function buildBaseString($baseURI, $method, $params)
    {
        $r = array();
        ksort($params);
        foreach($params as $key=>$value){
            $r[] = "$key=" . rawurlencode($value);
        }
        return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
    }

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
