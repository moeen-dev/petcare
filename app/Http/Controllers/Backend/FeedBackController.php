<?php

namespace App\Http\Controllers\Backend;

use App\Models\Feedback;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FeedBackController extends Controller
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
        $feedbacks = Feedback::orderBy('id', 'ASC')->get();
        return view('backend.feedback.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'image' => 'required|image|max:2048|mimes:jpeg,jpg,png,gif,webp',
            'profession' => 'required|string|min:3|max:255',
            'shortText' => 'required|string|min:3|max:500',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-image-'.$extension;
            $file->move('upload/images/', $filename);
            $input['image'] = $filename;
        }

        Feedback::create($input);

        return redirect()->route('feedback.index')->with('success', 'Feedback added successfully');
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
        $feedback = Feedback::findOrFail(intval($id));
        return view('backend.feedback.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $feedback = Feedback::findOrFail($id);

        if($feedback->id == $request->id){
            $request->validate([
                'name' => 'required|string|min:5|max:255',
                'image' => 'required|image|max:2048|mimes:jpeg,jpg,png,gif,webp',
                'profession' => 'required|string|min:3|max:255',
                'shortText' => 'required|string|min:3|max:500',
            ]);
        }else{
            $request->validate([
                'name' => 'required|string|min:5|max:255',
                'image' => 'nullable|image|max:2048|mimes:jpeg,jpg,png,gif,webp',
                'profession' => 'required|string|min:3|max:255',
                'shortText' => 'required|string|min:3|max:500',
            ]);
        }

        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-image-'.$extension;
            $file->move('upload/images/', $filename);
            $input['image'] = $filename;
        }

        $feedback->update($input);

        return redirect()->route('feedback.index')->with('success', 'Feedback info updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $feedback = Feedback::findOrFail(intval($id));

        if($feedback->count() <= 1){
            return redirect()->route('feedback.index')->with('error', 'Cannot delete the feedback as there is only one feedback.');
        }else{
            $filename = $feedback->image;
            $imagePath = public_path('upload/images/' . $filename);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $feedback->delete();
        }

        return redirect()->route('feedback.index')->with('success', 'Feedback has been deleted Successfully.');
    }
}

