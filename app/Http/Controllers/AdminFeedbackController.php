<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;

class AdminFeedbackController extends Controller
{
    public function index()
    {
        $refuellings = Feedback::all();
        return view('admin.feedback.show', compact('refuellings'));
    }
}
