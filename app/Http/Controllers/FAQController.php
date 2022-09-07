<?php

namespace App\Http\Controllers;
use App\FAQ;
use Auth;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        $fuels = FAQ::all();
        return view('admin.faq.show', compact('fuels'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        // Validation
        $this->validate($request,[
            'ques' => 'required|max:255',
            'answer' => 'required|max:255',
        ]);

        $fuels = new FAQ();
        $fuels->ques = $request->ques;
        $fuels->answer = $request->answer;
        $fuels->save();

        session()->flash('success','FAQ Created Successfully!');
        return redirect()->route('admin.faq');
    }


    public function edit($id)
    {
        $fuels = FAQ::find($id);

        return view('admin.faq.edit', compact('fuels'));
    }


    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'ques' => 'required|max:255',
            'answer' => 'required|max:255',
        ]);
        $fuels = FAQ::find($id)->update([
            'ques' => $request->ques,
            'answer' => $request->answer,
        ]);

        session()->flash('success','FAQ Successfully Updated!');
        return redirect()->route('admin.faq');
    }


    public function destroy($id)
    {
        $fuels = FAQ::where('id', $id)->firstOrFail()->delete();
        session()->flash('error', 'Deleted Successfully!');

        return redirect()->route('admin.faq');
    }
}
