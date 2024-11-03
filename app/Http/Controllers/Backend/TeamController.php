<?php

namespace App\Http\Controllers\Backend;

use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TeamController extends Controller
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
        $teams = Team::orderBy('id', 'ASC')->get();
        return view('backend.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'image' => 'required|image|max:2048|mimes:jpeg,jpg,png,gif,webp',
            'designation' => 'required|string|min:3|max:255',
            'facebook_url' => 'required|url',
            'instagram_url' => 'required|url',
            'linkedin_url' => 'required|url',
            'x_url' => 'required|url',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-image-'.$extension;
            $file->move('upload/images/', $filename);
            $input['image'] = $filename;
        }

        Team::create($input);

        return redirect()->route('team-member.index')->with('success', 'Team Member added successfully');
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
        $team = Team::findOrFail(intval($id));
        return view('backend.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $team = Team::findOrFail($id);

        if($team->id == $request->id){
            $request->validate([
                'name' => 'required|string|min:5|max:255',
                'image' => 'required|image|max:2048|mimes:jpeg,jpg,png,gif,webp',
                'designation' => 'required|string|min:3|max:255',
                'facebook_url' => 'required|url',
                'instagram_url' => 'required|url',
                'linkedin_url' => 'required|url',
                'x_url' => 'required|url',
            ]);
        }else{
            $request->validate([
                'name' => 'required|string|min:5|max:255',
                'image' => 'nullable|image|max:2048|mimes:jpeg,jpg,png,gif,webp',
                'designation' => 'required|string|min:3|max:255',
                'facebook_url' => 'required|url',
                'instagram_url' => 'required|url',
                'linkedin_url' => 'required|url',
                'x_url' => 'required|url',
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

        $team->update($input);

        return redirect()->route('team-member.index')->with('success', 'Team Member info updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::findOrFail(intval($id));

        if($team->count() <= 4){
            return redirect()->route('team-member.index')->with('error', 'Cannot delete the team as there is only one team.');
        }else{
            $filename = $team->image;
            $imagePath = public_path('upload/images/' . $filename);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $team->delete();
        }

        return redirect()->route('team-member.index')->with('success', 'Banner has been deleted Successfully.');
    }
}

