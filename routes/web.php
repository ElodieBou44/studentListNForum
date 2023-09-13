<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Afficher la liste tous les étudiants (index)
Route::get('/site', [StudentController::class, 'index'])->name('site.index');

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

