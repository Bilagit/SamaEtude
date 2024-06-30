<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Professeur;
use App\Models\User;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index(){
        $cours = Cours::all();
        $profs = Professeur::all();
        $users = User::where('role', '=', 'professeur')->get();
        return view('etudiant.index', [
            'cours' => $cours,
            'profs' => $profs,
            'users' => $users
        ]);
    }
}
