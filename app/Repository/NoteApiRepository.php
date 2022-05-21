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
         if (!is_null($request->image))
         $file_name = $this->saveImage($request->image, 'storages/notes');
         if (!is_null($note->id)) {
         $content = $request->content;
         $type = $request->noteType;
         $image = isset($file_name) ? '/storages/notes/' . $file_name : null;

         $data = array(
             "content" => $content,
             "type" => $type,
             "image" => $image
         );
        }
         DB::table('notes')->insert($data);
    }


    public function updateNote(Note $note, UpdatenoteRequest $request)
    {
        //update Photo with Trait MyTrait
        if (!is_null($request->image))
        $file_name = $this->saveImage($request->image, 'storages/notes');

        if (!is_null($note->id)) {
            $data = array(
                "content" => $request->content,
                "type" => isset($note->id) ? $note->type : $request->noteType,
               "image" => isset($file_name) ? '/storages/notes/' . $file_name : $note->image
            );
        }

          DB::table('notes')->update($data);

    }

    public function deleteNote(Note $note)
    {
        return DB::table('notes')->delete($note);
    }


}
