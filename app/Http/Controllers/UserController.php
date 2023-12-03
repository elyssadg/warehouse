<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', '=', 'Staff')->paginate(5);
        return view('users.index', compact('users'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
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
            'user_dob' => 'required|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
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
