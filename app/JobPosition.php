<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPosition extends Model
{


    /**
     * Position work area.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function workArea()
    {
        return $this->hasOne('App\WorkArea', 'work_area_id');
    }


}
