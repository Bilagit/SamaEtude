<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;
use App\Models\Categorie;
use App\Models\Professeur;
use App\Models\Exercice;
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
    public function contenu($id)
    {
        $categories = Categorie::all();
        $cours = Cours::paginate(10);
        $cour = Cours::findOrFail($id);
        return view('Professeur.contenu', [
            'categories' => $categories,
            'cours' => $cours
        ], compact('cour'));
    }
    public function exercices()
    {
        $exos = Exercice::paginate(10);
        $categories = Categorie::all();
        $cours = Cours::paginate(10);
        return view('Professeur.exercice',[
            'exos' => $exos
        ],compact('categories','cours'));
    }
    
    public function contenuExo($id)
    {
        $exos = Exercice::paginate(10);
        $categories = Categorie::all();
        $cours = Cours::paginate(10);
        $exo = Exercice::findOrFail($id);
        return view('Professeur.contenuExo', [
            'categories' => $categories,
            'cours' => $cours
        ], compact('exo','exos'));
    }
    public function ajoutercours(Request $request){
        $request->validate([
            'nom' => 'required|string',
            'description' => 'required|string',
            'file' => 'required|mimes:pdf,mp4,avi,mkv',
            'idCategorie' => 'required',
        ]);
        $path = $request->file('file')->store('cours', 'public');
        $prof = Professeur::where('idUser', '=', Auth::id())->first();
        $cours = Cours::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'file_path' => $path,
            'idCategorie' => $request->idCategorie,
            'idProfesseur' => $prof->id
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
    public function ajouterexo(Request $request){
        $request->validate([
            'titre' => 'required',
            'contenu' => 'required|mimes:pdf',
            'idCours' => 'required'
        ]);
        $path = $request->file('contenu')->store('exercices', 'public');
        $prof = Professeur::where('idUser', '=', Auth::id())->first();
        $exo = Exercice::create([
            'titre' => $request->titre,
            'contenu' => $path,
            'idProfesseur' => $prof->id,
            'idCours' => $request->idCours
        ]);
        if ($exo) {
            return to_route('professeur.exercices')->with('success', 'Exercice ajouté avec succès !');
        }
    }
    public function suppexo($id){
        $exo = Exercice::find($id);
        if ($exo) {
            $exo->delete();
            return to_route('professeur.exercices')->with('success', 'Exercice supprimé avec succès !');
        }
    }
    public function updateexo(Request $request, $id){
        $request->validate([
            'titre' => 'required',
            'contenu' => 'required',
            'idCours' => 'required'
        ]);
        $exo = Exercice::findOrFail($id);
        $path = $request->file('contenu')->store('exercices', 'public');
        $exo->titre = $request->titre;
        $exo->contenu = $path;
        $exo->idCours = $request->idCours;
        $exo->update();
        return to_route('professeur.exercices')->with('success', 'Exercice modifié avec succès ! ');
    }
}
