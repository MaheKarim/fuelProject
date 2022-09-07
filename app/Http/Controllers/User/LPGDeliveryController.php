<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\LPGDelivery;
use Illuminate\Http\Request;
use Auth;

class LPGDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lpgDeliveries = LPGDelivery::where('user_id', Auth::id())->get();
        return view('user.lpg.index', compact('lpgDeliveries'));
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
        $request->validate([
            'cylinder_name_id' => 'required',
            'address' => 'required|min:3',
            'priority_name_id' => 'required',
        ]);

        $lpgDeliveries = new LPGDelivery();
        $lpgDeliveries->cylinder_name_id = $request->cylinder_name_id;
        $lpgDeliveries->address = $request->address;
        $lpgDeliveries->priority_name_id = $request->priority_name_id;
        $lpgDeliveries->user_id = Auth::id();
        $lpgDeliveries->save();

        session()->flash('success', 'Created Successfully!');
        return redirect()->route('user.lpgIndex');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
