<?php

namespace App\Repository;

use App\Models\Note;
use App\Http\Requests\CreatenoteRequest;
use App\Http\Requests\UpdatenoteRequest;
use App\Repository\NoteInterface;
use Illuminate\Support\Facades\Hash;

class NoteRepository extends NoteInterface
{
    public function getNotes()
    {
        $query = Note::query();
        $query->where('user_id', Auth::id());

        $perPage = request('perPage', 10);
        $notes = $query->paginate($perPage);

        return notes;
    }

    public function getNoteById(Note $note)
    {
        return Note::find($note->id);
    }

    public function createNote(CreatenoteRequest $request)
    {
        $note = new Note;
        $note->content = $request->content;
        $note->user_id = Auth::id();
        $note->type = $request->noteType;

        return $note->save();
    }

    public function updateNote(Note $note, UpdatenoteRequest $request)
    {
        if (!is_null($note->id)) {
            $note->content = $request->content;
            $note->type = $request->noteType;

            return $user->save();
        }
    }

    public function deleteNote(Note $note)
    {
        return Note::find($note->id)->delete();
    }
}
