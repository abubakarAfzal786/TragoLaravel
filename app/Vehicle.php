<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Vehicle extends Model
{
	protected $table = 'vehicles';
    function atiname(){
    	return $this->belongsTo(Ati::class , 'atiId' , 'id');
    }
    function transaction(){
    	return $this->belongsTo(Transaction::class, 'id' , 'vehicleId');
    }
}