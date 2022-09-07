<?php

namespace App\Http\Controllers;
use Auth;
use App\CarWash;
use Illuminate\Http\Request;

class CarWashController extends Controller
{
    public function index()
    {
        $refuellings = CarWash::all();
        return view('admin.car-wash.show', compact('refuellings'));
    }
}
