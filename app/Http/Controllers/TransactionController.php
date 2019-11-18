<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['trans'] = \App\Transaction::where('active',1)->paginate(20);
        return view('pages.transaction.index',$data);

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
        return view('pages.transaction.create' , $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trans = new \App\Transaction();
        $trans->atiId = request('ati' , 0);
        $trans->agentId = request('agent', 0);
        $trans->deviceId= request('device',0);
        $trans->cdcId = request('cdc' , 0);
        $trans->placeId= request('address', 0);
        $trans->addressId= $trans->place->addressId;
        $trans->planId = request('plan' , 0);
        $trans->transactionTypeId= request('transtype',0);
        $trans->vehicleId = 66;
        $trans->docId = request('docId' , '');
        $trans->ddtId = request('ddtId' , '');
        $trans->save();
        $trans->time = $trans->created_at;
        $trans->save();
        return redirect('/transaction');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
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
        $data['trans'] = $transaction;
        return view('pages.transaction.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        // $trans = new \App\Transaction();
        $trans = $transaction;
        $trans->atiId = request('ati' , 0);
        $trans->agentId = request('agent', 0);
        $trans->deviceId= request('device',0);
        $trans->cdcId = request('cdc' , 0);
        $trans->placeId= request('address', 0);
        $trans->addressId= $trans->place->addressId;
        $trans->planId = request('plan' , 0);
        $trans->transactionTypeId= request('transtype',0);
        $trans->vehicleId = 66;
        $trans->docId = request('docId' , '');
        $trans->ddtId = request('ddtId' , '');
        $trans->save();
        
        return redirect('/transaction');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->active = 0;
        $transaction->save();
        return redirect('/transaction');
    }
}
