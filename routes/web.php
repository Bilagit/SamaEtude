<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'doregister'])->name('auth.doregister');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'dologin'])->name('auth.dologin');
Route::get('/etudiant', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('/professeur', [ProfessorController::class, 'index'])->name('professeur.index');
Route::get('/noter', [ProfessorController::class, 'noter'])->name('professeur.noter');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/listeprof', [AdminController::class, 'listeprof'])->name('admin.listeprof');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/profil', [AuthController::class, 'profil'])->name('auth.profil');
Route::post('/addcategorie', [AdminController::class, 'addcategorie'])->name('admin.addcategorie');
Route::get('/listecategorie', [AdminController::class, 'listecategorie'])->name('admin.listecategorie');
Route::get('/deletecategorie/{id}', [AdminController::class, 'deletecategorie'])->name('admin.deletecategorie');
Route::get('/getetudiants', [AdminController::class, 'getetudiants'])->name('admin.getetudiants');
Route::get('/suppetudiant/{id}', [AdminController::class, 'suppetudiant'])->name('admin.suppetudiant');
Route::put('/updatecategorie/{id}', [AdminController::class, 'updatecategorie'])->name('admin.updatecategorie');
Route::put('/updateprofil/{id}', [AuthController::class, 'updateprofil'])->name('auth.updateprofil');
Route::put('/updateprofiletud/{id}', [AuthController::class, 'updateprofiletud'])->name('auth.updateprofiletud');
Route::put('/updateprofilprof/{id}', [AuthController::class, 'updateprofilprof'])->name('auth.updateprofilprof');
Route::post('/ajouterprof', [AdminController::class, 'ajouterprof'])->name('admin.ajouterprof');
Route::get('/suppprof/{id}', [AdminController::class, 'suppprof'])->name('admin.suppprof');
Route::get('/exercices', [ProfessorController::class, 'exercices'])->name('professeur.exercices');
Route::get('/cours', [ProfessorController::class, 'cours'])->name('professeur.cours');
Route::post('/ajoutercours', [ProfessorController::class, 'ajoutercours'])->name('professeur.ajoutercours');
Route::get('/suppcours/{id}', [ProfessorController::class, 'suppcours'])->name('professeur.suppcours');
Route::put('/updatecours/{id}', [ProfessorController::class, 'updatecours'])->name('professeur.updatecours');
Route::post('/ajouterexo', [ProfessorController::class, 'ajouterexo'])->name('professeur.ajouterexo');
Route::get('/suppexo/{id}', [ProfessorController::class, 'suppexo'])->name('professeur.suppexo');
Route::put('/updateexo/{id}', [ProfessorController::class, 'updateexo'])->name('professeur.updateexo');
Route::get('/contenu/{id}', [ProfessorController::class, 'contenu'])->name('professeur.contenu');
Route::get('/contenuExo/{id}', [ProfessorController::class, 'contenuExo'])->name('professeur.contenuExo');
Route::post('/soumettre', [EtudiantController::class, 'soumettre'])->name('etudiant.soumettre');
Route::get('/exos', [EtudiantController::class, 'mesexos'])->name('etudiant.exos');
Route::put('/modifexosoumis', [EtudiantController::class, 'modifexosoumis'])->name('etudiant.modifexos');
Route::get('/suppexosoumis', [EtudiantController::class, 'suppexosoumis'])->name('etudiant.suppexo');
Route::get('/navbar', function () {
    return view('layouts.navbar');
});
