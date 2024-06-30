<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index(){
        return view('etudiant.index');
    }
    public function cours(){
        $cours = Cours::all();
        return view('etudiant.index', [
            'cours' => $cours
        ]);
    }
}
