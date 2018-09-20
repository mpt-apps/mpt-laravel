<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{


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


}
