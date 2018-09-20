<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/09/18
 * Time: 09:34 AM
 */

namespace App\Libraries\Twitter;


class TwitterUsers extends Twitter
{

    /**
     * Get user data from twitter according with the screen_name
     *
     * @param string $screen_name
     * @return mixed
     */
    function getUser($screen_name='miputotuit')
    {
        $url = "https://api.twitter.com/1.1/users/show.json";
        $query = array(
            'screen_name' => urlencode($screen_name)
        );
        $user = $this->getTwitterData('GET', $url, $query);
        return $user;

    }


}
