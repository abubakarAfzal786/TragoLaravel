<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $table = 'sanifications';
    public function sanifications()
    {
        return $this->hasOne('App\Sanificationstype','id','sanificationTypeId');
    }
    public function ati()
    {
        return $this->hasOne('App\Ati','id','atiId');
    }
    public function agent()
    {
        return $this->hasOne('App\Agent','id','agentId');
}
}
