<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public function ati()
    {
        return $this->hasOne('App\Ati','id','atiId');
    }
}
