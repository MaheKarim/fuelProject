<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FAQ;

class FrontEndController extends Controller
{
    public function index()
    {
        $faqs = FAQ::all();
        return view('frontend.index', compact('faqs'));
    }
}
