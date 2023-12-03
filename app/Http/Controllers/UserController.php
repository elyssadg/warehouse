<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', '=', 'Staff')->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|unique:users,email|max:255',
            'user_password' => 'required|min:8|confirmed',
            'user_password_confirmation' => 'required',
            'user_address' => 'required|string|max:255',
            'user_role'=> 'required|in:Admin,Staff',
            'user_dob' => 'required|before:-13 years'
        ]);
        
        User::create([
            'name' => $request->input('user_name'),
            'email' => $request->input('user_email'),
            'password' => Hash::make($request->input('user_password')),
            'role' => $request->input('user_role'),
            'address' => $request->input('user_address'),
            'dob' => $request->input('user_dob')
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
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
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'user_address' => 'required|string|max:255',
            'user_dob' => 'required|before:-18 years'
        ]);

        $user->name = $request->input('user_name');
        $user->role = $request->input('user_role');
        $user->address = $request->input('user_address');
        $user->dob = $request->input('user_dob');
        $user->save();

        return redirect()->route('users.index')->with('success', 'Staff updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Staff deleted successfully.');
    }

    public function getTotalStaff()
    {
        $totalStaff = User::where('role', 'Staff')->count();
        return $totalStaff;
    }
}
