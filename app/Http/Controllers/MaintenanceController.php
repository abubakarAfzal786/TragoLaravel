<?php

namespace App\Http\Controllers;

use App\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Create a new DController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenance=maintenance::orderBy('id','desc')->paginate(10);
        return view('pages.maintenance.index')->with('maintenance',$maintenance);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.maintenance.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $maintenance=new Maintenance();
        $maintenance->atiId=request('atiId');
        $maintenance->object_type=request('object_type');
        $maintenance->time=request('time');
        $maintenance->sanificationTypeId=request('sanificationTypeId');
        $maintenance->agentId=request('agentId');
        // $maintenance->note=request('');
        $maintenance->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
$maintenance=Maintenance::find($id);

        return view('pages.maintenance.edit')->with('maintenance',$maintenance);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        $maintenance=Maintenance::where($request->id)->first();
        $maintenance->atiId=request('atiId');
        $maintenance->object_type=request('object_type');
        $maintenance->time=request('time');
        $maintenance->sanificationTypeId=request('sanificationTypeId');
        $maintenance->agentId=request('agentId');
        // $maintenance->note=request('');
        $maintenance->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance,$id)
    {
        Maintenance::where('id',$id)->update(['active'=>0]);
        return redirect()->back();
    
    }
}
