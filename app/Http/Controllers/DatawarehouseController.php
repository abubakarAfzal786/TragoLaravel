<?php

namespace App\Http\Controllers;

use App\datawarehouse;
use Illuminate\Http\Request;

class datawarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['data1'] = \App\Datawarehouse::where('active', '!=', 0)->orderBy('id','desc')->paginate(20);
        return view('pages.datawarehouse.index' , $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[];
        $data['ati']=\App\Ati::all();
        $data['plans']  = \App\Plan::all();
        $data['addresses'] = \App\Place::all();
        $data['agents'] = \App\Agent::all();
        $data['devices'] = \App\Device::all();
        $data['cars'] = \App\Vehicle::all();
        $data['types'] = \App\TransactionType::all();
        $data['cdcs'] = \App\CDCS::all();
        return view('pages.datawarehouse.create' , $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new \App\Datawarehouse();
        $data->atiId = request('ati' ,0);
        $data->agentId = request('agent' , 0);
        $data->vehicleId = request('vehicle' , 0);
        $data->planId = request('plan',0);
        $data->fine = request('time' , '');
        $data->firma = request('company' , '');
        $data->save();
        $data->dataora = $data->created_at;
        $data->save();
        return redirect('/datawarehouse');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\datawarehouse  $datawarehouse
     * @return \Illuminate\Http\Response
     */
    public function show(datawarehouse $datawarehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\datawarehouse  $datawarehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(datawarehouse $datawarehouse)
    {
        $data=[];
        $data['ati']=\App\Ati::all();
        $data['plans']  = \App\Plan::all();
        $data['addresses'] = \App\Place::all();
        $data['agents'] = \App\Agent::all();
        $data['devices'] = \App\Device::all();
        $data['cars'] = \App\Vehicle::all();
        $data['types'] = \App\TransactionType::all();
        $data['cdcs'] = \App\CDCS::all();
        $data['data'] = $datawarehouse;
        return view('pages.datawarehouse.edit' , $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\datawarehouse  $datawarehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, datawarehouse $datawarehouse)
    {
        // $data = new \App\Datawarehouse();
        $data = $datawarehouse;
        $data->atiId = request('ati' ,0);
        $data->agentId = request('agent' , 0);
        $data->vehicleId = request('vehicle' , 0);
        $data->planId = request('plan',0);
        $data->fine = request('time' , '');
        $data->firma = request('company' , '');
        $data->save();
        return redirect('/datawarehouse');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\datawarehouse  $datawarehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(datawarehouse $datawarehouse)
    {
        $datawarehouse->active = 0;
        $datawarehouse->save(); 
        return redirect('/datawarehouse');
    }
}
