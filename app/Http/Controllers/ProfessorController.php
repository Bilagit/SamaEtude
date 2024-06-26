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
        $cours = Cours::paginate(10);
        return view('Professeur.cours', [
            'categories' => $categories,
            'cours' => $cours
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
    public function suppcours($id){
        $cours = Cours::find($id);
        if ($cours) {
            $cours->delete();
            return to_route('professeur.cours')->with('success', 'Cours supprimé avec succès ! ');
        }
    }
    public function updatecours(Request $request, $id){
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'file' => 'required',
            'idCategorie' => 'required'
        ]);
        $cours = Cours::findOrFail($id);
        $path = $request->file('file')->store('cours', 'public');
        $cours->nom = $request->nom;
        $cours->description = $request->description;
        $cours->file_path = $path;
        $cours->idCategorie = $request->idCategorie;
        $cours->update();
        return to_route('professeur.cours')->with('success', 'Cours modifié avec succès ! ');
    }
}
