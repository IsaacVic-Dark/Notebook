<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function display(Note $note)
    {
        //
        return view('note.display', compact('note'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'note' => 'required|string'
        ]);

        $note = new Note();
        $note->notes = $validated['note'];
        $note->save();
        // return redirect()->route('create');
        $notes = Note::all();
        return view('dashboard',compact('notes'));
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $notes = Note::all();
        return view('dashboard',compact('notes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Note $note)
    // {
    //     //
    // }

    public function destroy(Note $note)
    {
        //
        $note->delete();
        return redirect()->back()->with('message', 'Note deleted successfully');
    }
}
