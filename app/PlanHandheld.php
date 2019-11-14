<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class PlanHandheld extends Model
{
    protected $table = 'plansCustoms';
    protected $fillable = ['id', 'active', 'created_by', 'updated_by', 'deleted_by', 'ati_ld', 'planId', 'plan_type_id	', 'temperature_constraint_id', 'adr', 'equipments_number', 'customer_place_id', 'customer_place_description', 'customer_description', 'client_phone', 'description	', 'plan_date', 'plan_time_form', 'plan_time_to', 'place_id_form', 'place_id_to', 'places_json', 'note'];



    public function plan()
    {
        //return $this->belongsTo('App\Plan', 'planCustomId');
    }

    public function savePlanHandheld(Request $request)
    {

        $this->create([
            'note' => $request->note,
            'id' => $request->id,
            'planDate' => $request->data,
            'planId' => $request->giro_Pianificato,
        ]);

        return redirect()->back();
    }


}
