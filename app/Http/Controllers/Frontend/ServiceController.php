<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Feedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::orderBy('id', 'ASC')->get();
        return view('frontend.service.index', compact('feedbacks'));
    }
}
