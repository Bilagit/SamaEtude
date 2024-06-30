<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Professeur;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index(){
        $cours = Cours::all();
        $profs = Professeur::all();
        return view('etudiant.index', [
            'cours' => $cours,
            'profs' => $profs
        ]);
    }
}
