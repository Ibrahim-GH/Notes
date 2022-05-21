<?php

namespace App\Http\Controllers;

use App\Traits\MyTraits;
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
    use MyTraits;
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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatenoteRequest $request)
    {
        return $this->noteApi->createNote($request);;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        return $this->noteApi->getNoteById($note);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Note $note, UpdatenoteRequest $request)
    {
       return $this->noteApi->updateNote($note, $request);
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
