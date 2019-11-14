<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datawarehouse extends Model
{
    //
    protected $table = 'datawarehouses';
     public function vehicle(){
    	return $this->belongsTo(Vehicle::class , 'vehicleId' , 'id');
    }

    public function agent(){
    	return $this->belongsTo(Agent::class , 'agentId' , 'id');
    }
    public function place(){
    	return $this->belongsTo(Place::class , 'placeId' , 'id');
    }
    public function plan(){
    	return $this->belongsTo(Plan::class , 'planId' , 'id');
    }
    public function cdc(){
    	return $this->belongsTo(CDCS::class , 'cdcId' , 'id');
    }
    public function type(){
    	return $this->belongsTo(TransactionType::class , 'transactionTypeId' , 'id');
    }
    public function ati(){
    	return $this->belongsTo(Ati::class , 'atiId' , 'id');
    }

}
