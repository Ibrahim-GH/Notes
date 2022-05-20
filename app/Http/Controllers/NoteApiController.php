<?php

namespace App\Http\Controllers;

use App\Enums\NoteType;
use App\Http\Requests\CreatenoteRequest;
use App\Http\Requests\UpdatenoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use App\Repository\NoteApiRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteApiController extends Controller
{
    public $noteApi;

    public function __construct(NoteApiRepository $noteApi)
    {
        $this->noteApi = $noteApi;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->noteApi->getNotes();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreatenoteRequest $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatenoteRequest $request)
    {
        //save Photo with Trait MyTrait
        $file_name = $this->saveImage($request->image, 'storages/notes');

        $note = new Note();
        $note->content = $request->content;
//        $note->user_id = Auth::id();
        $note->type = $request->noteType;
        $note->image = isset($file_name) ? '/storages/notes/' . $file_name : null;

        return new NoteResource($note);

//        return $this->noteApi->createNote($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        $e = NoteType::fromValue($note->type);
        $type = $e->key;
        return $this->noteApi->getNoteById($note);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatenoteRequest $request, Note $note)
    {
        if ($this->noteApi->updateNote($note, $request))
            return new NoteResource($note);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //softDelete
        if ($this->noteApi->deleteNote($note))
            return new NoteResource($note);
    }
}
