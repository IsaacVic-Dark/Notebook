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
    public function display()
    {
        $notes = Note::where('user_id', Auth::id())->paginate(10);
        return view('note.display', compact('notes'));

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
        $note->user_id = Auth::id();
        $note->save();

        return redirect()->route('note.show', $note->id)->with('message', 'Note created successfully!!');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $note = Note::findOrFail($id);
        return view('note.show', compact('note'));
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

        return redirect()->route('note.show', $note->id)->with('message', 'Note updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
        $note->delete();
        return redirect()->route('display')->with('message', 'Note deleted successfully');
    }
}
