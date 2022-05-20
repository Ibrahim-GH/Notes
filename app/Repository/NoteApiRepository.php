<?php

namespace App\Repository;

use App\Http\Requests\CreatenoteRequest;
use App\Http\Requests\UpdatenoteRequest;

use App\Http\Resources\NoteResource;
use App\Models\Note;
use App\Repository\NoteApiInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Traits\MyTraits;

class NoteApiRepository implements NoteApiInterface
{
    use MyTraits;

    public function getNotes()
    {
        $query = DB::table('notes')->select('*');
//        $query = Note::query();
//        $query->where('user_id', Auth::id());

        $perPage = request('perPage', 10);
        $notes = $query->paginate($perPage);

        return NoteResource::collection($notes);
    }

    public function getNoteById(Note $note)
    {
        return NoteResource::make($note);
    }

    /**
     * @param CreatenoteRequest $request
     * @return mixed
     */
    public function createNote(CreatenoteRequest $request)
    {
        //save Photo with Trait MyTrait
        $file_name = $this->saveImage($request->image, 'storages/notes');

        $note = new Note();
        $note->content = $request->content;
        $note->user_id = Auth::id();
        $note->type = $request->noteType;
        $note->image = isset($file_name) ? '/storages/notes/' . $file_name : null;

        return new NoteResource($note);
    }

    public function updateNote(Note $note, UpdatenoteRequest $request)
    {
        //update Photo with Trait MyTrait
//        $file_name = $this->saveImage($request->image, 'storages/notes');

        if (!is_null($note->id) && auth()->check()) {
            $note->update([
            "content" => $request->content,
            "type" => isset($note->id) ? $note->type : $request->noteType,
//            "image" => isset($file_name) ? '/storages/notes/' . $file_name : $note->image
]);
            return $note;
        }
    }

    public function deleteNote(Note $note)
    {
        return $note->delete();
    }


}
