<?php

namespace App;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Influencer extends Model
{
    protected $fillable = [
        'screen_name',
        'name',
        'twitter_id',
        'twitter_screen_name',
        'twitter_name',
        'twitter_description',
        'twitter_personal_url',
        'twitter_url',
        'twitter_followers_count',
        'twitter_friends_count',
        'twitter_statuses_count',
        'twitter_image_normal_url',
        'twitter_image_url'
    ];


    /**
     * Current Influencer position
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function position()
    {
        return $this->hasOne('App\JobPosition','job_position_id');
    }

    /**
     * All positions that a Influencer has had.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function positions()
    {
        return $this->hasMany('App\JobPosition');
    }


    /**
     * Current political position
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function politicalPosition()
    {
        return $this->hasOne('App\PoliticalPosition', 'political_position_id');
    }

    /**
     * All political positions where a Influencer has been.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function politicalPositions()
    {
        return $this->hasMany('App\PoliticalPosition');
    }


    /**
     * Curren Influencer political party
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function politicalParty()
    {
        return $this->hasOne('App\PoliticalParty', 'political_party_id');
    }

    /**
     * All political parties where a influencer has been.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function politicalParties()
    {
        return $this->hasMany('App\PoliticalParty');
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function country()
    {
        return $this->hasOne('App\Country', 'country_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function state()
    {
        return $this->hasOne('App\State', 'state_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function city()
    {
        return $this->hasOne('App\City', 'city_id');
    }




}
