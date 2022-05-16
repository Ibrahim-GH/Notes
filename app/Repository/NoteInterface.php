<?php

namespace App\Repository;

interface NoteInterface 
{
    public function index();

    public function show($id);

    public function createOrUpdate( $id = null, $collection = [] );

    public function deleteNote($id);
}
