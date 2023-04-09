<?php

namespace App\Http\Controllers;

use App\Models\VehicleList;
use Illuminate\Http\Request;

class VehicleListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicleLists = VehicleList::all();
        // dd( $vehicleLists);
        return view('superadmin.vehicleList.index', compact('vehicleLists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $data = $request->all();
    $data['vehicle_type'] = $request->vehicle; // Set the default value for vehicle_type
    $vehicleList = VehicleList::create($data);
    return redirect()->back()->with('message', 'Vehicle Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleList  $vehicleList
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleList $vehicleList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleList  $vehicleList
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleList $vehicleList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VehicleList  $vehicleList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $vehicleList = VehicleList::findOrFail($id);
        $vehicleList->update([
            'vehicle_type' => $request->input('vehicle'),
        ]);
        return redirect()->back()->with('message', 'Vehicle List Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleList  $vehicleList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $vehicleList = VehicleList::findOrFail($id);
        // dd($vehicleList->toArray());
        $vehicleList->delete();
        return redirect()->back()->with('message', 'Vehicle Deleted Successfully.');
    }
}
