-<?php

use App\Http\Controllers\NoteApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();
});

Route::resource('notes', NoteApiController::class);





//Route::group(['middleware' => 'auth'], function () {
//    Route::get('/', [NoteApiController::class, 'index'])->name('notes.index');
//
//    Route::get('index/notes', [NoteApiController::class, 'index']);
//    Route::get('notes/create', [NoteApiController::class, 'create'])->name('notes.create');
//    Route::post('notes/store', [NoteApiController::class, 'store'])->name('notes.store');
//
//    Route::get('notes/{note}/show', [NoteApiController::class, 'show'])->name('notes.show');
//
//    Route::get('notes/{note}/edit', [NoteApiController::class, 'edit'])->name('notes.edit');
//    Route::put('notes/update/{note}', [NoteApiController::class, 'update'])->name('notes.updated');
//
//    Route::delete('notes/delete/{note}', [NoteApiController::class, 'destroy'])->name('notes.delete');
//
//    Route::get('notes/report', [NoteApiController::class, 'report'])->name('notes.report');
//});
