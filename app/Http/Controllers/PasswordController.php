<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function update(Request $req)
    {
        $user = User::find(Auth::id()); // get the authenticated user

        $validatedData = $req->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($validatedData['current_password'], $user->password)) {
            // current password does not match
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($validatedData['new_password']);
        $user->save();

        Auth::logout();

        return redirect()->route('login')->with('success', 'Your password has been changed! Please log in with your new password.');

    }
}
