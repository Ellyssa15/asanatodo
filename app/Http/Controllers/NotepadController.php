<?php

namespace App\Http\Controllers;

use App\Models\Notepad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotepadController extends Controller
{
    function notepad()
    {
        return view('notepad');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'name' => 'required|string|max:255',
        ]);

        Notepad::create($data);

        return redirect()->route('notepad')->with('success', 'Note created successfully.');
    }

    public function update(Request $request, Notepad $notepad)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'name' => 'required|string|max:255',
        ]);

        $notepad->update($data);

        return redirect()->route('notepad')->with('success', 'Note updated successfully.');
    }

    public function destroy(Notepad $notepad)
    {
        $notepad->delete();

        return redirect()->route('notepad')->with('success', 'Note deleted successfully.');
    }
}
