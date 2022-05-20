<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/', function () {
//    return view('home');
//});

Auth::routes();

//Route::get('/login', [HomeController::class, 'login'])->name('notes.login');
//Route::get('/register', [HomeController::class, 'register'])->name('notes.register');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [NoteController::class, 'index'])->name('notes.index');

    Route::get('notes', [NoteController::class, 'index']);
    Route::get('notes/create', [NoteController::class, 'create'])->name('notes.create');
    Route::post('notes/store', [NoteController::class, 'store'])->name('notes.store');

    Route::get('notes/{note}/show', [NoteController::class, 'show'])->name('notes.show');

    Route::get('notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
    Route::put('notes/update/{note}', [NoteController::class, 'update'])->name('notes.updated');

    Route::delete('notes/delete/{note}', [NoteController::class, 'destroy'])->name('notes.delete');

    Route::get('notes/report', [NoteController::class, 'report'])->name('notes.report');
});

Route::get('{note}', [NoteController::class, 'show'])->name('notes.show');


//Route::resource('notes', NoteController::class);
