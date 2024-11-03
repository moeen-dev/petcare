<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\ContactForm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogCategories = BlogCategory::orderBy('id', 'DESC')->get();

        if ($request->has('category')) {
            $category = BlogCategory::where('slug', $request->query('category'))->first();

            if ($category) {
                $blogs = Blog::where('category_id', $category->id)->orderBy('id', 'DESC')->get();
            } else {
                $blogs = Blog::orderBy('id', 'DESC')->get();
            }
        } else {
            $blogs = Blog::orderBy('id', 'DESC')->get();
        }
        
        return view('frontend.blog.index', compact('blogs', 'blogCategories'));
    }


    public function singleBlog($slug)
    {
        // Generate Random Text
        $digit1 = rand(1, 9);
        $digit2 = rand(1, 9);
        $correctAnswer = $digit1 + $digit2;

        session(['correctAnswer' => $correctAnswer]);

        // Pass Category & Blog
        $blogCategories = BlogCategory::orderBy('id', 'DESC')->take(10)->get();
        $blog = Blog::where('slug', $slug)->firstOrFail();

        $blogs = Blog::orderBy('id', 'DESC')->take(10)->get();

        $blogCount = BlogCategory::withCount('blogs')->get()->keyBy('id');
        return view('frontend.blog.single', compact('blog', 'blogs', 'blogCategories', 'blogCount', 'digit1', 'digit2', 'correctAnswer'));
    }

    public function formSubmit(Request $request)
    {
    // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'profession' => 'required|string|max:255',
            'message' => 'required',
            'user_answer' => 'required|numeric',
            'correct_answer' => 'required|numeric',
        ]);

    // Check if the user's answer matches the correct answer
        if ($request->user_answer != $request->correct_answer) {
            return back()->withErrors(['error' => 'Math problem was solved incorrectly. Please try again.']);
        }

    // Create new contact form submission
        ContactForm::create($request->all());

    // Process form if everything is fine
        return back()->with('success', 'Form submitted successfully');
    }

}
