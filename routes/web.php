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
Route::get('/Cours', [ProfessorController::class, 'cours'])->name('auth.cours');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'doregister'])->name('auth.doregister');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'dologin'])->name('auth.dologin');
Route::get('/etudiant', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('/professeur', [ProfessorController::class, 'index'])->name('professeur.index');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/addprof', [AdminController::class, 'addProfesseur'])->name('admin.addprof');
Route::get('/dropprof/{id}', [AdminController::class, 'dropProfesseur'])->name('admin.dropprof');
Route::get('/listeprof', [AdminController::class, 'listeprof'])->name('admin.listeprof');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/profil', [AuthController::class, 'profil'])->name('auth.profil');
Route::post('/addcategorie', [AdminController::class, 'addcategorie'])->name('admin.addcategorie');
Route::get('/listecategorie', [AdminController::class, 'listecategorie'])->name('admin.listecategorie');
Route::get('/deletecategorie/{id}', [AdminController::class, 'deletecategorie'])->name('admin.deletecategorie');
Route::get('/getetudiants', [AdminController::class, 'getetudiants'])->name('admin.getetudiants');
Route::put('/updatecategorie/{id}', [AdminController::class, 'updatecategorie'])->name('admin.updatecategorie');
