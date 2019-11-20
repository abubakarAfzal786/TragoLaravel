<?php

namespace App\Http\Controllers;

use App\PlanRequest;
use Illuminate\Http\Request;

class PlanRequestController extends Controller
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
        $planRequest=PlanRequest::where('active',1)->orderBy('created_at', 'desc')->paginate(10);
       
        return view('pages.plan_requests.index')->with('planRequest',$planRequest);

    }
    public function search()
    {
        $name=request('name');
        if($name)
        {
            $planRequest=PlanRequest::where('active',1)->where('id',$name)->orwhere('note','Like',$name.'%')->orderBy('id','desc')->paginate(10);
    
        }
        else
        {
            return $this->index();
        }
        return view('pages.plan_requests.index')->with('planRequest',$planRequest);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.plan_requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collection=[];
        $updateObj=new PlanRequest();
       $updateObj->planId=request('planId');
       $updateObj->note=request('note');
       $updateObj->planDate=request('planDate');
$collection[]=array(
    'dateTime'=>request('jsondate'),
    'addressId'=>request('jsonaddress'),
    'cdcId'=>request('jsoncdc')
);
$places_json=json_encode($collection);
$updateObj->places_json=$places_json;
        $updateObj->save();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PlanRequest  $planRequest
     * @return \Illuminate\Http\Response
     */
    public function show(PlanRequest $planRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlanRequest  $planRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $planRequest=PlanRequest::find($id);
        $places=json_decode($planRequest->places_json);
    
        return view('pages.plan_requests.edit',compact('places','planRequest'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlanRequest  $planRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlanRequest $planRequest)
    {
        $collection=[];
        $updateObj=PlanRequest::where('id',$request->id)->first();
       $updateObj->planId=request('planId');
       $updateObj->note=request('note');
       $updateObj->planDate=request('planDate');
$collection=array(
    'dateTime'=>request('jsondate'),
    'addressId'=>request('jsonaddress'),
    'cdcId'=>request('jsoncdc')
);
$places_json=json_encode($collection);
$updateObj->places_json=$places_json;
        $updateObj->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlanRequest  $planRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PlanRequest::where('id',$id)->update(['active'=>0]);
        // $planRequest->delete();
        return redirect()->back();
    }
}
