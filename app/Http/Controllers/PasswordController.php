<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    

    public function update(Request $request)
{
    $request->validate([
        'current_password' => ['required', 'string'],
        'password' => ['required', 'string', 'confirmed']
    ]);

    $user = auth()->user();
    if (!$user) {
        return redirect()->back()->with('message', 'You must be logged in to change your password.');
    }

    $currentPasswordStatus = Hash::check($request->current_password, $user->password);
    if ($currentPasswordStatus) {

        User::findOrFail($user->id)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('message', 'Password Updated Successfully');
    } else {

        return redirect()->back()->with('message', 'Current Password does not match with Old Password');
    }
}
}
