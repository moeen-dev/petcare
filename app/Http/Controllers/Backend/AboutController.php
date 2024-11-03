<?php

namespace App\Http\Controllers\Backend;

use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
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
        $abouts = About::orderBy('id', 'ASC')->get();
        return view('backend.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstTitle' => 'required|string|min:3|max:10', 
            'secondTitle' => 'required|string|min:3|max:10',
            'description' => 'required|string|min:3|max:5000',
        ]);

        $input = $request->all();

        About::create($input);

        return redirect()->route('about.index')->with('success', 'About has been added successfully.');
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
        $about = About::findOrFail(intval($id));

        return view('backend.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $about = About::findOrFail($id);

        if($about->title == $request->title) {
            $request->validate([
                'firstTitle' => 'required|string|min:3|max:10', 
                'secondTitle' => 'required|string|min:3|max:10',
                'description' => 'required',
            ]);
        }else{
            $request->validate([
                'firstTitle' => 'required|string|min:3|max:10', 
                'secondTitle' => 'required|string|min:3|max:10',
                'description' => 'required',
            ]);
        }

        $input = $request->all();

        $about->update($input);

        return redirect()->route('about.index')->with('success', 'About has been updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $about = About::findOrFail(intval($id));

        if($about->count() <= 1){
            return redirect()->route('about.index')->with('error', 'Cannot be delete the about as there is only one about.');
        }else{
            $about->delete();
        }
        return redirect()->route('about.index')->with('success', 'About Successfully Delete.');
    }
}
