<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function country()
    {
        return $this->hasOne('App\Country', 'country_id');
    }

}
