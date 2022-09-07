<?php

namespace App\Http\Controllers;

use App\FuelType;
use Illuminate\Http\Request;

class FuelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fuels = FuelType::all();
        return view('admin.fuel_type.show', compact('fuels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fuel_type.create');
    }

    public function store(Request $request)
    {
        // Validation
        $this->validate($request,[
            'fuel_name' => 'required|string|unique:fuel_types|max:255',
        ]);

        $fuels = new FuelType();
        $fuels->fuel_name = $request->fuel_name;
        $fuels->save();

        session()->flash('success','Fuel Type Created Successfully!');
        return redirect()->route('admin.fueltype');
    }


    public function show(FuelType $fuelType)
    {
        //
    }

    public function edit($id)
    {
        $fuels = FuelType::find($id);

        return view('admin.fuel_type.edit', compact('fuels'));
    }


    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'fuel_name' => 'required|max:255',
        ]);
        $fuels = FuelType::find($id)->update([
            'fuel_name' => $request->fuel_name,
        ]);

        session()->flash('success','Fuel Type Successfully Updated!');
        return redirect()->route('admin.fueltype');
    }


    public function destroy($id)
    {
        // testing code
        $fuels = FuelType::where('id', $id)->firstOrFail()->delete();
        session()->flash('error', 'Deleted Successfully!');

        return redirect()->route('admin.fueltype');
    }
}
