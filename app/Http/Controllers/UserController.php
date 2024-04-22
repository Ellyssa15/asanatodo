<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function list()
    {
        $users = User::where('role', 'user')->get();
        $count = 1;
        $totalTasks = Tasks::count();
        $incompleteTasks = Tasks::where('status', 'To-Do')->count();
        $completedTasks = Tasks::where('status', 'Completed')->count();

        return view('dashboard', ['users' => $users, 'count' => $count, 'totalTasks' => $totalTasks, 'incompleteTasks' => $incompleteTasks, 'completedTasks' => $completedTasks]);
    }

    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }

    function login(Request $request)
    {
        $user = User::where(['email' => $request->email])->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => '*Email or Password not matched']);
        } else {
            $request->session()->put('user', $user);
            session()->flash('success', 'You have successfully logged in!');
            return redirect()->route('dashboard');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    function dashboard(Request $req)
    {
        $user = $req->session()->get('user');

        $host = $req->getHttpHost();

        $user->name = ucwords($user->name);

        return view('dashboard', ['user' => $user]);
    }

}
