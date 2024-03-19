<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    function login(Request $req)
    {
        $user = User::where(['email' => $req->email])->first();
        if (!$user || !Hash::check($req->password, $user->password)) {
            return "Username or Password not matched";
        } else {
            $req->session()->put('user', $user);

            $data = ['user' => $user];
            return view('dashboard', $data);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    function register(Request $req)
    {
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $password = $req->password;
        $cpassword = $req->cpassword;

        if ($password != $cpassword) {
            return redirect()->back()->withErrors(['password' => 'Passwords do not match. Please try again.']);
        }

        $user->password = Hash::make($password);
        $user->save();
        $req->session()->put('user', $user);
        return redirect('/');
    }
    function dashboard(Request $req)
    {
        // Retrieve the user data from the session
        $user = $req->session()->get('user');

        $host = $req->getHttpHost();

        $user->name = ucwords($user->name);

        if ($user) {
            return view('dashboard', ['user' => $user]);
        } else {
            return redirect('/');
        }
    }

    function project()
        {
            return view('project');
        }

    function message()
        {
            return view('message');
        }

    function profile(Request $req)
        {
            $user = $req->session()->get('user');

            $host = $req->getHttpHost();

                return view('profile', ['user' => $user]);
        }

    }
