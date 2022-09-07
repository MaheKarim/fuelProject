<?php

namespace App\Http\Controllers;

use Auth;
use App\FuelDelivery;
use Illuminate\Http\Request;

class FuelDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveries = FuelDelivery::where('user_id', Auth::id())->get();
        return view('user.fuel-delivery.index', compact('deliveries'));
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
        $fueldeliveris = new FuelDelivery();
        $fueldeliveris->fuel_name_id = $request->fuel_name_id;
        $fueldeliveris->refueling_for_id = $request->refueling_for_id;
        $fueldeliveris->booking_date = $request->booking_date;
        $fueldeliveris->phn_number = $request->phn_number;
        $fueldeliveris->delivery_address = $request->delivery_address;
        $fueldeliveris->quantity = $request->quantity;
        $fueldeliveris->priority_name_id = $request->priority_name_id;
        $fueldeliveris->user_id = Auth::id();
        $fueldeliveris->save();

        session()->flash('success', 'Created Successfully!');
        return redirect()->route('user.fuelDelivery');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FuelDelivery  $fuelDelivery
     * @return \Illuminate\Http\Response
     */
    public function show(FuelDelivery $fuelDelivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FuelDelivery  $fuelDelivery
     * @return \Illuminate\Http\Response
     */
    public function edit(FuelDelivery $fuelDelivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FuelDelivery  $fuelDelivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FuelDelivery $fuelDelivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FuelDelivery  $fuelDelivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(FuelDelivery $fuelDelivery)
    {
        //
    }
}
