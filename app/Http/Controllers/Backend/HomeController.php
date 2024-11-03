<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use App\Models\BlogCategory;
use App\Models\Blog;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
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

    public function index()
    {   
        $bannerCount = Banner::count();
        $categoryCount = BlogCategory::count();
        $blogCount = Blog::count();
        $userCount = User::count();
        $feedCount = Feedback::count();
        $teamCount = Team::count();
        return view('backend.home.index', compact('bannerCount', 'blogCount', 'categoryCount', 'userCount', 'feedCount', 'teamCount'));
    }
}
