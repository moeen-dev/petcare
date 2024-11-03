<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BannerController extends Controller
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
        $banners = Banner::orderBy('id', 'ASC')->get();
        return view('backend.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tagLine' => 'required|string|min:3|max:32',
            'title' => 'required|string|min:3|max:32',
            'shortText' => 'required|string|min:3|max:255', 
            'image' => 'required|image|max:2048|mimes:jpeg,jpg,gif,png,webp',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-image-'.$extension;
            $file->move('upload/images/', $filename);
            $input['image'] = $filename;
        }

        Banner::create($input);

        return redirect()->route('banner.index')->with('success', 'New Banner Has Been Added Successfully.');
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
        $banner = Banner::findOrFail(intval($id));

        return view('backend.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = Banner::findOrFail($id);

        if($banner->title == $request->title) {
            $request->validate([
                'tagLine' => 'required|string|min:3|max:32',
                'title' => 'required|string|min:3|max:32',
                'shortText' => 'required|string|min:3|max:255', 
                'image' => 'nullable|image|max:2048|mimes:jpeg,jpg,gif,png,webp',
            ]);
        }else{
            $request->validate([
                'tagLine' => 'required|string|min:3|max:32',
                'title' => 'required|string|min:3|max:32',
                'shortText' => 'required|string|min:3|max:255', 
                'image' => 'nullable|image|max:2048|mimes:jpeg,jpg,gif,png,webp',
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

        $banner->update($input);

        return redirect()->route('banner.index')->with('success', 'Banner has been updated Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::findOrFail(intval($id));

        if($banner->count() <= 1){
            return redirect()->route('banner.index')->with('error', 'Cannot delete the banner as there is only one banner.');
        }else{
            $filename = $banner->image;
            $imagePath = public_path('upload/images/' . $filename);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $banner->delete();
        }

        return redirect()->route('banner.index')->with('success', 'Banner has been deleted Successfully.');
    }
}
