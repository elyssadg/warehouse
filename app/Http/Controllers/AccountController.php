<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view('accounts.profile', compact('user'));
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
        $user = Auth::user();
        return view('accounts.security', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if ($request->input('type') == 'password') {
            $request->validate([
                'current_password' => 'required',
                'password' => 'required|min:8|required',
                'password_confirmation' => 'required'
            ]);

            if (!Hash::check($request->input('current_password'), $user->password)) {
                return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.'])->withInput();
            }
            
            $user->password = Hash::make($request->input('password'));
            $user->save();
            return redirect()->route('account.edit')->with('success', 'Password updated successfully.');
        } else {
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
            return redirect()->route('account.index')->with('success', 'Profile updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $request->validate([
            'agreement' => 'required|accepted',
        ]);

        User::find($id)->delete();
        return redirect()->route('login')->with('success', 'Account has been deleted');
    }
}
