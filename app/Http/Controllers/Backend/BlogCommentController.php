<?php

namespace App\Http\Controllers\Backend;

use App\Models\ContactForm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = ContactForm::orderBy('id', 'DESC')->get();
        return view('backend.comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = ContactForm::where('id', $id)->firstOrFail();

        return view('backend.comment.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = ContactForm::findOrFail(intval($id));

        $comment->delete();

        return redirect()->route('blog-comment.index')->with('success', 'Blog Comment has been deleted successfully.');
    }
}
