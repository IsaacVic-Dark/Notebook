<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function display($id)
    {
        //
        $note = Note::findOrFail($id);
        return view('note.display', compact('note'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'note' => 'required|string'
        ]);

        $note = new Note();
        $note->notes = $validated['note'];
        $note->user_id = Auth::id(); // Assign the note to the logged-in user
        $note->save();

        return redirect()->route('dashboard');
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        // Get the logged-in user's notes
        $notes = Note::where('user_id', Auth::id())->paginate(10);

        return view('dashboard', compact('notes'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $note = Note::findOrFail($id);
        return view('note.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'note' => 'required|string'
        ]);

        $note = Note::findOrFail($id);

        $note->notes = $validated['note'];

        $note->save();

        return redirect()->route('notes.display', $note->id)->with('message', 'Note updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
        $note->delete();
        return redirect()->route('dashboard')->with('message', 'Note deleted successfully');
    }

    // public function userNote()
    // {
    //     $user = Auth::user();
    //     $notes = $user->notes()->paginate(10); // Fetch notes for the logged-in user with pagination
    //     return view('dashboard', compact('notes'));
    // }
}
