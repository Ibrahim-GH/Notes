<?php

namespace App\Repository;

use App\Http\Requests\CreatenoteRequest;
use App\Http\Requests\UpdatenoteRequest;
use App\Models\Note;

interface NoteInterface
{
    public function getNotes();

    public function getNoteById(Note $note);

    public function createNote(CreatenoteRequest $request);

    public function updateNote(Note $note, UpdatenoteRequest $request);

    public function deleteNote(Note $note);

}
