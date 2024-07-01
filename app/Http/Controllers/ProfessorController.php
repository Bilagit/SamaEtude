<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;
use App\Models\User;
use App\Models\Categorie;
use App\Models\Professeur;
use App\Models\Exercice;
use App\Models\Evaluation;
use App\Models\Etudiant;
use App\Models\ExoSoumis;
use Illuminate\Support\Facades\Auth;
class ProfessorController extends Controller
{

    public function cours()
    {
        $categories = Categorie::all();
        $cours = Cours::all();
        $users = User::all();
        $profs = Professeur::all();        
        $professeur = Professeur::where('idUser', Auth::id())->first();
    
        if ($professeur) {
            $mescours = Cours::where('idProfesseur', $professeur->id)->get();
        } else {
            $mescours = collect();
        }    
        return view('Professeur.cours', [
            'categories' => $categories,
            'mescours' => $mescours,
            'cours' => $cours,
            'users' => $users,
            'profs' => $profs
        ]);
    }
    
    
    
    public function contenu($id)
    {
        $evaluations = Evaluation::where('idCours', '=', $id)->get();
        $etoiles = [
            '1_etoile' => $evaluations->where('score', 1)->count(),
            '2_etoile' => $evaluations->where('score', 2)->count(),
            '3_etoile' => $evaluations->where('score', 3)->count(),
            '4_etoile' => $evaluations->where('score', 4)->count(),
            '5_etoile' => $evaluations->where('score', 5)->count()
        ];
        $total = Evaluation::where('idCours', '=', $id)->count();
        $etu = Etudiant::where('idUser', '=', Auth::id())->first();
        $moneval = null;
        if ($etu) {
            $moneval = Evaluation::where([
                ['idCours', '=', $id],
                ['idetudiant', '=', $etu->id]
            ])->get();
        }
        $categories = Categorie::all();
        $cours = Cours::paginate(10);
        $cour = Cours::findOrFail($id);
        $exos = Exercice::all();
        $profs = Professeur::all();
        $users = User::all();
        return view('Professeur.contenu', [
            'categories' => $categories,
            'cours' => $cours,
            'profs' => $profs,
            'users' => $users,
            'etoiles' => $etoiles,
            'total' => $total,
            'moneval' => $moneval
        ], compact('cour','exos'));
    }
    public function exercices()
    {
        $prof = Professeur::where('idUser', '=', Auth::id())->first();
        $exos = Exercice::where('idProfesseur', '=', $prof->id)->get();
        $categories = Categorie::all();
        $cours = Cours::where('idProfesseur', '=', $prof->id)->get();
        return view('Professeur.exercice',[
            'exos' => $exos
        ],compact('categories','cours'));
    }
    
    public function contenuExo($id)
    {
        $exo = Exercice::findOrFail($id);
        $exos = Exercice::where('idCours', $exo->idCours)->where('id', '!=', $id)->get();
        $categories = Categorie::all();
        $cours = Cours::paginate(10);
        $etu = Etudiant::where('idUser', '=', Auth::id())->first();
        $exercices = null;
        if ($etu) {
            $exercices = ExoSoumis::where('idEtudiant', '=', $etu->id)->get();
        }
        $profs = Professeur::all();
        $users = User::all();
        return view('Professeur.contenuExo', [
            'categories' => $categories,
            'cours' => $cours,
            'exo' => $exo,
            'exos' => $exos,
            'exercices' => $exercices,
            'profs' => $profs,
            'users' => $users
        ]);
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
    public function noter(){
        return view('Professeur.noter');
    }
}
