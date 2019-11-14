<?php
namespace App\Http\Controllers;
use App\Probe;
use Illuminate\Http\Request;
class ProbeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['listing'] = \App\Probe::paginate(20);
        return view('pages.probe.index' , $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['ati'] = \App\Ati::all();
        return view('pages.probe.create', $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(request('stato_richiesta') == " " || empty(request('stato_richiesta')) || request('stato_richiesta') == null){
            return redirect()->back();
        }
        else{
            $prob = new \App\Probe();
            $prob->description = request('description', ' ');
            $prob->atiId = request('stato_richiesta');
            $prob->calibrationExpireTime = request('date' , ' ' );
            $prob->barcode = request('barcode' , ' ');
            $prob->usedFor = request('usedas' , ' ');
            $prob->save();
            return redirect('/probe');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Probe  $probe
     * @return \Illuminate\Http\Response
     */
    public function show(Probe $probe)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Probe  $probe
     * @return \Illuminate\Http\Response
     */
    public function edit(Probe $probe)
    {
        $data = [];
        $data['ati'] = \App\Ati::all();
        $data['prob'] = $probe;
        return view('pages.probe.edit' , $data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Probe  $probe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Probe $probe)
    {
        if(request('stato_richiesta') == " " || empty(request('stato_richiesta')) || request('stato_richiesta') == null){
            return redirect()->back();
        }
        else{
            $probe->atiId = request('stato_richiesta');
            $probe->barcode = request('barcode', '');
            $probe->description = request('description','');
            $probe->usedFor = request('usedas' , '');
            $probe->calibrationExpireTime = request('date' , '');
            $probe->save();
            return rediect()->back();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Probe  $probe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Probe $probe)
    {
        // dd($probe);
        $probe->delete();
        return redirect('/probe');
    }
}