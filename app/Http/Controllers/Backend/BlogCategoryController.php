<?php

namespace App\Http\Controllers\Backend;

use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
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
        $blogCategories = BlogCategory::orderBy('name', 'ASC')->get();
        return view('backend.category.index', compact('blogCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255|unique:blog_categories,name',
            'slug' => 'required',
        ]);

        $input = $request->all();

        BlogCategory::create($input);

        return redirect()->route('category.index')->with('success', 'Category added successfully');
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
        $blogCategory = BlogCategory::findOrFail(intval($id));

        return view('backend.category.edit', compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blogCategory = BlogCategory::findOrFail($id);

        if ($blogCategory->slug == $request->slug) {
            $request->validate([
                'name' => 'required|string|min:3|max:255',
                'slug' => 'required',
            ]);
        }else{
            $request->validate([
                'name' => 'required|string|min:3|max:255',
                'slug' => 'required',
            ]);
        }

        $input = $request->all();

        $blogCategory->update($input);

        return redirect()->route('category.index')->with('success', 'Feedback info updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blogCategory = BlogCategory::findOrFail(intval($id));

        if($blogCategory->blogs()->count() > 0){
            return redirect()->route('category.index')->with('error', 'Category can not be deleted.');
        }else{
            $blogCategory->delete();
        }

        return redirect()->route('category.index')->with('success', 'Category has been deleted successfully.');
    }
}
