<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\FileController;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Afficher la liste tous les étudiants (index)
Route::get('/site', [StudentController::class, 'index'])->name('site.index');
// Route::get('/site', [StudentController::class, 'indexForum'])->name('site.forum');

// Afficher des informations d'un étudiant (show)
Route::get('/site/{selectedStudent}', [StudentController::class, 'show'])->name('site.show');

// Ajout d'un étudiant (create)
Route::get('/site-create', [StudentController::class, 'create'])->name('site.create');

// Création d'un nouvel étudiant suite au remplissage du formulaire (store)
Route::post('/site-create', [StudentController::class, 'store']);

// Affichage du formulaire de mise à jour des informations d'un étudiant (edit)
Route::get('/site-edit/{selectedStudent}', [StudentController::class, 'edit'])->name('site.edit'); 

// Mise à jour des informations d'un étudiant (update)
Route::put('/site-edit/{selectedStudent}', [StudentController::class, 'update'])->name('site.edit'); 

// Suppression d'un étudiant (delete)
Route::delete('/site-edit/{selectedStudent}', [StudentController::class, 'destroy'])->name('site.delete'); 

// ***** LOGIN 

Route::get('/registration', [CustomAuthController::class, 'create'])->name('user.create');
Route::post('/registration', [CustomAuthController::class, 'store']);
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/login', [CustomAuthController::class, 'authentication']);
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');

// ***** FORUM

Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum-show/{selectedPost}', [ForumController::class, 'show'])->name('forum.show');
Route::get('/forum-create', [ForumController::class, 'create'])->name('forum.create');
Route::post('/forum-create', [ForumController::class, 'store']);
Route::get('/forum-edit/{selectedPost}', [ForumController::class, 'edit'])->name('forum.edit'); 
Route::put('/forum-edit/{selectedPost}', [ForumController::class, 'update'])->name('forum.edit'); 
Route::delete('/forum-edit/{selectedPost}', [ForumController::class, 'destroy'])->name('forum.delete');

// ***** FORUM

Route::get('/files', [FileController::class, 'index'])->name('files.index');
Route::get('/files-show/{selectedFile}', [FileController::class, 'show'])->name('files.show');
Route::get('/file-create', [FileController::class, 'create'])->name('files.create');
Route::post('/file-create', [FileController::class, 'store']);
Route::get('/file-edit/{selectedFile}', [FileController::class, 'edit'])->name('files.edit'); 
Route::put('/file-edit/{selectedFile}', [FileController::class, 'update'])->name('files.edit'); 
Route::delete('/file-edit/{selectedFile}', [FileController::class, 'destroy'])->name('files.delete');

// ***** BILINGUE

Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');