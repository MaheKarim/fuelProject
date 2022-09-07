<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\CarWash;
use Illuminate\Http\Request;
use Auth;

class WashController extends Controller
{
    public function index()
    {
        $lpgDeliveries = CarWash::where('user_id', Auth::id())->get();
        return view('user.car-wash.index', compact('lpgDeliveries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_model' => 'required',
            'address' => 'required',
            'date' => 'required',
        ]);

        $lpgDeliveries = new CarWash();
        $lpgDeliveries->fill($request->only(['car_model', 'address', 'date']));
        $lpgDeliveries->user_id = Auth::id();
        $lpgDeliveries->save();

        session()->flash('success', 'Created Successfully!');
        return redirect()->route('user.carwash');
    }
}
