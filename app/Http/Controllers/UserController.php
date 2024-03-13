<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    function register(Request $req)
    {
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        $req->session()->put('user', $user);
        return redirect('dashboard')->with('user', $user);
    }

    function dashboard(Request $req)
    {
        // Retrieve the user data from the session
        $user = $req->session()->get('user');

        $host = $req->getHttpHost();

        $user->name = ucwords($user->name);

        // Check if the user data exists in the session
        if ($user) {
            // Return the dashboard view with the user data
            return view('dashboard', ['user' => $user]);
        } else {
            // Redirect to the login page if the user data is not available in the session
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

    function profile()
        {
            return view('auth.profile');
        }
    }
