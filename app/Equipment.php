<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
   protected $table= 'equipments';

   public function temperature(){
   	return $this->belongsTo(Temperature::class, 'temperatureConstraintId' , 'id');
   }
   public function probe(){
   	return $this->belongsTo(Probe::class , 'probeId' , 'id');
   }
   public function atiname(){
   	return $this->belongsTo(Ati::class , 'atiId' , 'id');
   }
}
