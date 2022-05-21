<?php

namespace App\Http\Controllers;

use App\Repository\NoteRepository;
use App\Enums\NoteType;
use App\Models\Note;
use App\Http\Requests\CreatenoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    public $note;

    public function __construct(NoteRepository $note)
    {
        $this->note = $note;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $notes = $this->note->getNotes();
        return View('notes.home', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return View('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CreatenoteRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatenoteRequest $request)
    {
        $this->note->createNote($request);

        return redirect()->route('notes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Models\Note $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        $e = NoteType::fromValue($note->type);
        $type = $e->key;
        return view('notes.details', ['note'=>$note,'type'=>$type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Models\Note $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        $e = NoteType::fromValue($note->type);
        $type = $e->key;
        return view('notes.edit', ['note'=> $note, 'type'=>$type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateNoteRequest $request
     * @param \App\Models\Models\Note $note
     * @return \Illuminate\Http\Response
     */
    public function update(Note $note, UpdateNoteRequest $request)
    {
        $this->note->updateNote($note, $request);
        return redirect()->route('notes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Models\Note $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $this->note->deleteNote($note);
        return redirect()->back();
    }

    public function report()
    {
        if(Auth::check()) {

            $countUrgent = DB::table('notes')->where('type', 1)->count();
            $countNormal = DB::table('notes')->where('type', 2)->count();
            $countDate = DB::table('notes')->where('type', 3)->count();

            $countType = array($countUrgent, $countNormal, $countDate);
        }
            return view('notes.report',compact('countType'));
    }

}
