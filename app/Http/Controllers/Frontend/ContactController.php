<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Rules\ReCaptchaV3;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact.index');
    }

    public function submitForm(Request $request)
    {
        // Basic validation
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|string|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:8',
            'g-recaptcha-response' => ['required', new ReCaptchaV3('submitContact')],
        ]);

        // Send email
        $mailData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];

        $fromName = $request->input('name');
        $fromMail = $request->input('email');

        Mail::to('contact@animal-life-style.top')->send(new ContactMail($mailData, $fromName, $fromMail));

        return back()->with('success', 'Thanks for reaching out us !!!');
    }
}
