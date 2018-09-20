<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoliticalParty extends Model
{


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
}
