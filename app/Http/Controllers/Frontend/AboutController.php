<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::orderBy('id', 'ASC')->first();
        return view('frontend.about.index', compact('abouts'));
    }
}
