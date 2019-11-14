<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
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
        $plan=plan::where('active',1)->orderBy('id','desc')->paginate(10);
        return view('pages.plan.index')->with('plan',$plan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plan=new Plan();
        $plan->temperatureConstraintId=request('temperatureConstraintId');
        $plan->atiId=request('atiId');
        $plan->weekdays_json=request('weekdays_json');
        $plan->note=request('note');
        $plan->description=request('description');
        $plan->onDemandDate=request('onDemandDate');
        $plan->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
$plan=Plan::find($id);
        return view('pages.plan.edit')->with('plan',$plan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        $plan=Plan::where('id',$request->id)->first();
        $plan->temperatureConstraintId=request('temperatureConstraintId');
        $plan->atiId=request('atiId');
        $plan->weekdays_json=request('weekdays_json');
        $plan->note=request('note');
        $plan->description=request('description');
        $plan->onDemandDate=request('onDemandDate');
        $plan->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan,$id)
    {
        Plan::where('id',$id)->update(['active'=>0]);
        return redirect()->back();
    }
}
