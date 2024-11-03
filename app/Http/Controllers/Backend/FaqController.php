<?php

namespace App\Http\Controllers\Backend;

use App\Models\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::orderBy('id', 'ASC')->get();
        return view('backend.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|min:5|max:255',
            'answeer' => 'required',
        ]);

        $input = $request->all();

        Faq::create($input);

        return redirect()->route('faq.index')->with('success', 'New Faq has been added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faq = Faq::findOrFail(intval($id));

        return view('backend.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $faq = Faq::findOrFail($id);

        if($faq->id == $request->id){
            $request->validate([
                'question' => 'required|string|min:5|max:255',
                'answeer' => 'required',
            ]);
        }else{
            $request->validate([
                'question' => 'required|string|min:5|max:255',
                'answeer' => 'required',
            ]);
        }

        $input = $request->all();

        $faq->update($input);

        return redirect()->route('faq.index')->with('success', 'FAQs has been Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = Faq::findOrFail(intval($id));

        $faq->delete();

        return redirect()->route('faq.index')->with('success', 'FAQs has been deleted successfully.');
    }
}
