<?php
namespace App\Http\Controllers;
use App\Vehicle;
use Illuminate\Http\Request;
class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[];
        $data['listing']= \App\Vehicle::where('active',1)->orderBy('id', 'DESC')->paginate(10);
        // $data['listing']= $data['listing']->paginate(15);
        // dd($data['listing']);
        return view('pages.vehicle.index',$data);
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
        return view('pages.vehicle.create', $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request()->all());
        if(request('stato_richiesta') == '' || request('stato_richiesta')==null || empty(request('stato_richiesta')) ){
            return redirect()->back();
        }
        else{
            
            $car = new \App\Vehicle();
            $car->atiId = request('stato_richiesta',  0);
            $car->brand = request('brand' , '');
            $car->description = request('description', '');
            $car->barcode = request('barcode' , '');
            $car->model = request('model' , '');
            $car->plateNumber = request('numberplate', '');
            $car->probeId = 0;
            $car->temperatureConstraintId=11;
            $car->ecuId = 0 ;
            $car->save();
            return redirect('/vehicles');
        }
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $data = [];
        $data['car'] = $vehicle;
        $data['ati'] = \App\Ati::all();
        return view('pages.vehicle.edit' , $data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        if(request('stato_richiesta') == " " || empty(request('stato_richiesta')) || request('stato_richiesta') == null){
            return redirect()->back();
        }
        else{
            $vehicle->atiId = request('stato_richiesta');
            $vehicle->brand = request('brand');
            $vehicle->model = request('model');
            $vehicle->description= request('description');
            $vehicle->plateNumber= request('numberPlate');
            $vehicle->barcode = request('barcode');
            $vehicle->save();
            return redirect('/vehicles');
         }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        // dd($vehicle);
        $vehicle->delete();
        return redirect('/vehicles');
    }
}