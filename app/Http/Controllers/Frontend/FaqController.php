<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('id', 'DESC')->get();
        return view('frontend.faq.index', compact('faqs'));
    }
}
