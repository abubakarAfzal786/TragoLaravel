<?php

namespace App\Http\Controllers;

use App\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[];
        $data['equip'] = \App\Equipment::where('active',1)->orderBy('id','desc')->paginate(20);
        return view('pages.equipment.index', $data);

    }
public function search()
{
    $name=request('name');
    if($name)
    {
        $data['equip']=\App\Equipment::where('active',1)->orwhere('id',$name)->orwhere('barcode','Like',$name.'%')->orwhere('sanificationIntervalDays','Like',$name.'%')->orderBy('id','desc')->paginate(10);

    }
    else
    {
        return $this->index();
    }
    return view('pages.equipment.index',$data);
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[];
        $data['ati'] = \App\Ati::all();
        $data['temp']= \App\Temperature::all();
        $data['probe']= \App\Probe::all();
        return view('pages.equipment.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        $data=[];
        $data['ati'] = \App\Ati::all();
        $data['temp']= \App\Temperature::all();
        $data['probe']= \App\Probe::all();
        $data['equip'] = $equipment ;
        return view('pages.equipment.edit' , $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        $temp = $equipment;
        
        $temp->temperatureConstraintId= request('temp', 0);
        $temp->atiId = request('stato_richiesta' , 0);
        $temp->sanificationIntervalDays = request('days' , 0);
        $temp->update();
        return redirect('/equipment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy($equipment)
    {
        Equipment::where('id',$equipment)->update(['active'=>0]);
        return redirect('equipment');
    }
}
