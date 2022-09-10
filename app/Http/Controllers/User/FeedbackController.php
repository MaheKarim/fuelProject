<?php

namespace App\Http\Controllers\User;

use App\Feedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class FeedbackController extends Controller
{
    public function index()
    {
        $lpgDeliveries = Feedback::where('user_id', Auth::id())->get();
        return view('user.feedback.index', compact('lpgDeliveries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'feedback' => 'required',
        ]);

        $lpgDeliveries = new Feedback();
        $lpgDeliveries->fill($request->only(['feedback']));
        $lpgDeliveries->user_id = Auth::id();
        $lpgDeliveries->save();

        session()->flash('success', 'Created Successfully!');
        return redirect()->route('user.feedback');
    } 
}
