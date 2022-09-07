<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\LPGCylinder;
use Illuminate\Http\Request;

class CylinderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gases = LPGCylinder::all();
        return view('admin.gas-cylinder.index', compact('gases'));
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
        // Validation
        $request->validate([
            'cylinder_name' => 'required|max:255',
            'cylinder_size' => 'required|max:255',
            'cylinder_stock' => 'required|max:255',
            'cylinder_price' => 'required|max:255',
        ]);
        $cylinders = new LPGCylinder();
        $cylinders->cylinder_name = $request->cylinder_name;
        $cylinders->cylinder_size = $request->cylinder_size;
        $cylinders->cylinder_stock = $request->cylinder_stock;
        $cylinders->cylinder_price = $request->cylinder_price;
        $cylinders->save();

        session()->flash('success', 'Created Successfully!');
        return redirect()->route('admin.gasCylinderService');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gases = LPGCylinder::find($id);
        return view('admin.gas-cylinder.edit', compact('gases'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'cylinder_name' => 'required|max:255',
            'cylinder_size' => 'required|max:255',
            'cylinder_stock' => 'required|max:255',
            'cylinder_price' => 'required|max:255',
        ]);

        $gases = LPGCylinder::find($id)->update([
            'cylinder_name' => $request->cylinder_name,
            'cylinder_size' => $request->cylinder_size,
            'cylinder_stock' => $request->cylinder_stock,
            'cylinder_price' => $request->cylinder_price,
        ]);
        session()->flash('success', 'Updated Successfully!');
        return redirect()->route('admin.gasCylinderService');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gases = LPGCylinder::find($id)->delete();

        session()->flash('error', 'Deleted Successfully!');
        return back();
    }
}
