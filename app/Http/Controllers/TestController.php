<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notepad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    public function mira()
    {
        return view('mira');
    }
    public function index()
    {
        $notepads = Notepad::all();
        return view('test', compact('notepads'));
    }

    public function create()
    {
        return view('test.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data['date'] = now();
        $data['name'] = Session::get('user')->name;

        Notepad::create($data);
        return redirect()->route('test.index')->with('success', 'Notepad created successfully');
    }

    public function show(Notepad $notepad)
    {
        return view('test.show', compact('notepad'));
    }

    public function edit(Notepad $notepad)
    {
        return view('test.edit', compact('notepad'));
    }

    public function update(Request $request, $id)
    {
        $notepad = Notepad::find($id);
        $notepad->title = $request->title;
        $notepad->description = $request->description;
        $notepad->date = now();
        $notepad->save();

        return redirect()->route('test.index');
    }

    public function destroy($id)
    {
        $notepad = Notepad::find($id);
        $notepad->delete();

        return redirect()->route('test.index');
    }
}
