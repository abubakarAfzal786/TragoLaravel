<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Transaction extends Model
{
	protected $table = 'transactions';
    public function vehicle(){
    	return $this->hasMany(Vehicle::class , 'vehicleId' , 'id');
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