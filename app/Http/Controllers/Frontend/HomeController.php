<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use App\Models\About;
use App\Models\Team;
use App\Models\Blog;
use App\Models\Feedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('id', 'ASC')->get();
        $abouts = About::orderBy('id', 'ASC')->first();
        $teams = Team::orderBy('id', 'ASC')->get();
        $feedbacks = Feedback::orderBy('id', 'ASC')->get();
        $blogs = Blog::latest()->take(3)->get();
        return view('frontend.home.index', compact('banners', 'abouts', 'teams', 'feedbacks', 'blogs'));
    }
}
