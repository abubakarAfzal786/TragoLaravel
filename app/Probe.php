<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Probe extends Model
{
    public function equipment()
    {
        return $this->hasMany('App\Equipment');
    }
   public static function boot()
   {
       parent::boot();
       static::deleting(function($probe){
$probe->equipment()->delete();
       });
   }

   public function atiname(){
      return $this->belongsTo(Ati::class , 'atiId' , 'id');
    }

}
