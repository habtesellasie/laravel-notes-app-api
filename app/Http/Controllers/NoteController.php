<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Note::query()->orderBy('created_at', 'desc')->paginate(8);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'note_title' => 'string|required',
            'note' => 'string|min:3'
        ]);
        $data['user_id'] = 1;

        return Note::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return response()->json(['note' => $note]);
    }

    public function edit($id)
    {
        $note = Note::find($id);

        return response()->json([
            'note', $note
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $data = $request->validate([
            'note_title' => 'required',
            'note' => 'required|min:5'
        ]);
        // $data['user_id'] = $request->user()->id;

        $note->update($data);

        return Note::find($note->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $note = Note::find($id);

        $note->delete();

        // return redirect('/notes');
        // return to_route('note.index');
    }
}
