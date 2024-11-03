<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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
        $users = User::orderBy('id', 'ASC')->get();
        return view('backend.admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|max:32',
            'password' => 'required|string|min:8|max:32',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        User::create($input);

        return redirect()->route('admin.index')->with('success', 'New User has been added successfully.');
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
        $user = User::findOrFail($id);

        if ($id == 1) {
            return redirect()->route('admin.index')->with('error', 'This is the main Admin.');
        }


        $user->delete();

        return redirect()->route('admin.index')->with('success', 'User has been deleted successfully.');
    }
}
