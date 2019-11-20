<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
     
            $device=Device::where('active',1)->orderBy('id','desc')->paginate(10);

        
        return view('pages.device.index')->with('devices',$device);
    }
public function search()
{
    $name=request('name');
        if($name)
        {
            $device=Device::where('active',1)->where('id',$name)->orwhere('barcode','Like',$name.'%')->orwhere('imei','Like',$name.'%')->orwhere('description','Like',$name.'%')->orderBy('id','desc')->paginate(10);

        }
        else
        {
            return $this->index();
        }
        return view('pages.device.index')->with('devices',$device);

}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.device.create');

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
        $device=new Device();
        $device->atiId=request('stato_richiesta');
        $device->barcode=request('barcode');
        $device->imei=request('imei');
        $device->description=request('description');
        $k=request('k');
        $v=request('v');
$collection[]=array(
    "k"=>$k,
    "v"=>$v
);
$settings=json_encode($collection);
$device->settings_json=$settings;
$device->save();
return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        $settings=json_decode($device->settings_json);
        
        return view('pages.device.edit',compact('settings','device'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        $update_device=Device::where('id',$request->id)->first();
        $update_device->atiId=request('stato_richiesta');
        $update_device->barcode=request('barcode');
        $update_device->imei=request('imei');
        $update_device->description=request('description');
        $k=request('k');
        $v=request('v');
$collection[]=array(
    "k"=>$k,
    "v"=>$v
);
$settings=json_encode($collection);
$update_device->settings_json=$settings;
        $update_device->update();
        return view('pages.device.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Device::where('id',$id)->update(['active'=>0]);
        // $device->delete();
        return redirect()->back();
    }
}
