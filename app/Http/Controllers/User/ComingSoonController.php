<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComingSoonController extends Controller
{
    public function index()
    {
        return view('user.car-wash.index');
    }

    public function car_mecs()
    {
        return view('user.car-wash.index');
    }
}
