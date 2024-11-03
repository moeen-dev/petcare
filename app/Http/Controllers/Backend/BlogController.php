<?php

namespace App\Http\Controllers\Backend;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
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
        $blogs = Blog::orderBy('id', 'ASC')->get();
        return view('backend.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogCategories = BlogCategory::orderBy('name', 'ASC')->get();
        return view('backend.blog.create', compact('blogCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255|unique:blogs,title',
            'slug' => 'required|string|min:3|max:255|unique:blogs,slug',
            'image' => 'required|image|max:2048|mimes:jpg,jpeg,png,gif,webp',
            'category_id' => 'required',
            'description' => 'required',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-image-'.$extension;
            $file->move('upload/images/', $filename);
            $input['image'] = $filename;
        }

        Blog::create($input);

        return redirect()->route('blog.index')->with('success', 'New Blog has been added successfully.');
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
        $blogCategories = BlogCategory::orderBy('name', 'ASC')->get();

        $blog = Blog::findOrFail(intval($id));
        return view('backend.blog.edit', compact('blog', 'blogCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);

        if($blog->slug == $request->slug){
            $request->validate([
                'title' => 'required|string|min:3|max:255',
                'slug' => 'required|string|min:3|max:255',
                'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png,gif,webp',
                'category_id' => 'required',
                'description' => 'required',
            ]);
        }else{
            $request->validate([
                'title' => 'required|string|min:3|max:255|unique:blogs,title',
                'slug' => 'required|string|min:3|max:255|unique:blogs,slug',
                'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png,gif,webp',
                'category_id' => 'required',
                'description' => 'required',
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

        $blog->update($input);

        return redirect()->route('blog.index')->with('success', 'Blog has been Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail(intval($id));

        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog has been deleted successfully.');
    }
}
