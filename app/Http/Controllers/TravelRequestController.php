<?php

namespace App\Http\Controllers;

use App\TravelRequest;
use Illuminate\Http\Request;

class TravelRequestController extends Controller
{
    /**
     * Create a new TravelRequest instance.
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
        $allTravelRequest = TravelRequest::where('active', 1)->orderBy('created_at', 'asc')->paginate(10);
       
        return view('pages.travel_requests.index')->with('travelRequest', $allTravelRequest);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.travel_requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $travel=new TravelRequest();
        $request->validate([
            'stato_richiesta' => 'required',
            'contratto' => 'required',
            'tipo_trasporto' => 'required',
            'planCustomId' => 'required',
            'indirizzo_carico' => 'required',
            'descrizione_cdc_carico' => 'required',
            'codice_localita_scarico' => 'required',
            'codice_cdc_scarico' => 'required',
            'indirizzo_scarico' => 'required',
            'descrizione_cdc_scarico' => 'required',
            'adr' => 'required',
            'vincolo_di_temperatura' => 'required',
            'confezionato' => 'required',
            'numero_colli' => 'required',
            'note' => 'required',
        ]);
$travel->stato_richiesta=request('stato_richiesta');
$travel->contratto=request('contratto');
$travel->tipo_trasporto=request('tipo_trasporto');
$travel->planCustomId=request('planCustomId');
$travel->indirizzo_scarico=request('indirizzo_carico');
$travel->descrizione_cdc_carico=request('descrizione_cdc_carico');
$travel->codice_cdc_scarico=request('codice_cdc_scarico');
$travel->codice_localita_scarico=request('codice_localita_scarico');
$travel->indirizzo_scarico=request('indirizzo_scarico');
$travel->descrizione_cdc_scarico=request('descrizione_cdc_scarico');
$travel->adr=request('adr');
$travel->vincolo_di_temperatura=request('vincolo_di_temperatura');
$travel->confezionato=request('confezionato');
$travel->numero_colli=request('numero_colli');
$travel->note=request('note');
$travel->save();
return redirect('travel_requests');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TravelRequest $travelRequest
     * @return \Illuminate\Http\Response
     */
    public function show(TravelRequest $travelRequest)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TravelRequest $travelRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(TravelRequest $travelRequest)
    {
        return view('pages.travel_requests.edit')->with('travelRequest', $travelRequest);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\TravelRequest $travelRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TravelRequest $travelRequest)
    {
        $updateObj = TravelRequest::where('id', $request->id)->first();
        $updateObj->stato_richiesta = $request->stato_richiesta;
        $updateObj->contratto = $request->contratto;
        $updateObj->tipo_trasporto = $request->tipo_trasporto;
        $updateObj->planCustomId = $request->planCustomId;
        $updateObj->indirizzo_carico = $request->indirizzo_carico;
        $updateObj->descrizione_cdc_carico = $request->descrizione_cdc_carico;
        $updateObj->codice_cdc_scarico = $request->codice_cdc_scarico;
        $updateObj->indirizzo_scarico = $request->indirizzo_scarico;
        $updateObj->descrizione_cdc_scarico = $request->descrizione_cdc_scarico;
        $updateObj->adr = $request->adr;
        $updateObj->vincolo_di_temperatura = $request->vincolo_di_temperatura;
        $updateObj->confezionato = $request->confezionato;
        $updateObj->numero_colli = $request->numero_colli;
        $updateObj->note = $request->note;
        $updateObj->update();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TravelRequest $travelRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TravelRequest::where('id',$id)->update(['active'=>0]);
        return redirect()->back();
    }
}
