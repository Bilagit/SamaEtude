<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
class ProfessorController extends Controller
{
    public function cours()
    {
        $categories = Categorie::all();
        return view('Professeur.cours', [
            'categories' => $categories
        ]);
    }
    public function exercices()
    {
        return view('Professeur.exercice');
    }
    public function ajoutercours(Request $request){
        $request->validate([
            'nom' => 'required|string',
            'description' => 'required|string',
            'file' => 'required|mimes:pdf,mp4,avi,mkv',
            'idCategorie' => 'required',
        ]);
        $path = $request->file('file')->store('cours', 'public');
        $cours = Cours::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'file_path' => $path,
            'idCategorie' => $request->idCategorie,
            'idProfesseur' => Auth::id()
        ]);
        if($cours){
            return to_route('professeur.cours')->with('success', 'Cours ajouté avec succès ! ');
        }
    }
}
