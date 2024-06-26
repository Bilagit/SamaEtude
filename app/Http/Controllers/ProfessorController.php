<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function cours()
    {
        return view('Professeur.cours');
    }
    public function exercices()
    {
        return view('Professeur.exercice');
    }
    public function index(){
        return view('professeur/index');
    }
}
