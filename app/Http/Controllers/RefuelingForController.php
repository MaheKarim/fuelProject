<?php

namespace App\Http\Controllers;

use App\FuelType;
use App\RefuelingFor;
use Illuminate\Http\Request;

class RefuelingForController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $refuellings = RefuelingFor::all();

        return view('admin.refuelling.show', compact('refuellings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.refuelling.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $refuellings = new RefuelingFor();
        $refuellings->refueling_reason = $request->refueling_reason;
        $refuellings->save();

        session()->flash('success','Refuelling Successfully Updated!');
        return redirect()->route('admin.refuelling');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RefuelingFor  $refuelingFor
     * @return \Illuminate\Http\Response
     */
    public function show(RefuelingFor $refuelingFor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RefuelingFor  $refuelingFor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $refuellings = RefuelingFor::find($id);

        return view('admin.refuelling.edit', compact('refuellings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RefuelingFor  $refuelingFor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $refuellings = RefuelingFor::find($id)->update([
            'refueling_reason' => $request->refueling_reason,
        ]);
        session()->flash('success','Refuelling Successfully Updated!');
        return redirect()->route('admin.refuelling');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RefuelingFor  $refuelingFor
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefuelingFor $refuelingFor, $id)
    {
        $refuellings = RefuelingFor::where('id', $id)->firstOrFail()->delete();

        session()->flash('error','Refuelling Successfully Updated!');
        return redirect()->route('admin.refuelling');
    }
}
