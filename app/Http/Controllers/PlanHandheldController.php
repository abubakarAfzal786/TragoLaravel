<?php

namespace App\Http\Controllers;

use App\PlanHandheld;
use Illuminate\Http\Request;

class PlanHandheldController extends Controller
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
        $planHandheld=PlanHandheld::all();
        return view('pages.plan_handheld.index')->with('planHandheld',$planHandheld);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.plan_handheld.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'data' => 'required',
            'giro_Pianificato' => 'required',
            'nome' => 'required',
            'tappe' => 'required',
            'indirizzo' => 'required',
            'cdc' => 'required',
            'note' => 'required',
            'stato_richiesta' => 'required',

        ]);
         $planHandheld=new PlanHandheld();
       return $planHandheld->savePlanHandheld($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PlanHandheld  $planHandheld
     * @return \Illuminate\Http\Response
     */
    public function show(PlanHandheld $planHandheld)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlanHandheld  $planHandheld
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,PlanHandheld $planHandheld,$id)
    {
        $planHandheld= PlanHandheld::all()->where('id',$id)->first();
        return view('pages.plan_handheld.edit')->with('planHandheld',$planHandheld);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlanHandheld  $planHandheld
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlanHandheld $planHandheld,$id)
    {
          $updateObj=PlanHandheld::all()->where('id',$id)->first();
             $updateObj->note=$request->note;
             $updateObj->update();
             return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlanHandheld  $planHandheld
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanHandheld $planHandheld,$id)
    {
        $data=PlanHandheld::where('id',$id)->first();
        $data->delete();
        return redirect()->back();
    }
}
