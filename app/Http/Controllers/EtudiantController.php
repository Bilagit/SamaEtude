<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Cours;
use App\Models\Exercice;
use App\Models\Professeur;
use App\Models\User;
use App\Models\Etudiant;
use App\Models\ExoSoumis;
use App\Models\Note;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EtudiantController extends Controller
{
    public function index(){
        $categories = Categorie::all();
        $cours = Cours::all();
        $profs = Professeur::all();
        $users = User::where('role', '=', 'professeur')->get();
        return view('etudiant.index', [
            'cours' => $cours,
            'profs' => $profs,
            'users' => $users,
            'categories' => $categories
        ]);
    }
    public function contenucours($id){
        $categories = Categorie::all();
        $cours = Cours::paginate(10);
        $cour = Cours::findOrFail($id);
        $exos = Exercice::all();
        $profs = Professeur::all();
        $users = User::all();
        return view('etudiant.contenu', [
            'categories' => $categories,
            'cours' => $cours,
            'profs' => $profs,
            'users' => $users
        ], compact('cour','exos'));
    }
    public function soumettre(Request $request){
        $request->validate([
            'file' => 'required|mimes:pdf',
            'idExo' => 'required'
        ]);
        $path = $request->file('file')->store('exercices_soumis', 'public');
        $etu = Etudiant::where('idUser', '=', Auth::id())->first();
        $exo = ExoSoumis::create([
            'contenu' => $path,
            'idExo' => $request->idExo,
            'idEtudiant' => $etu->id
        ]);
        if ($exo) {
            return to_route('professeur.contenuExo', ['id' => $exo->idExo])->with('success', 'Exercice soumis avec succès !');
        }
    }
    public function mesexos(){
        $etu = Etudiant::where('idUser', '=', Auth::id())->first();
        $exos = ExoSoumis::where('idEtudiant', '=', $etu->id)->get();
        $notes = Note::where('idEtudiant', '=', $etu->id)->get();
        $exercices = Exercice::all();
        $cours = Cours::all();
        $profs = Professeur::all();
        $categories = Categorie::all();
        $users = User::all();
        return view('etudiant.exercices', [
            'exos' => $exos,
            'notes' => $notes,
            'exercices' => $exercices,
            'cours' => $cours,
            'profs' => $profs,
            'users' => $users,
            'categories' => $categories
        ]);
    }
    public function modifexosoumis(Request $request, $id){
        $request->validate([
            'file' => 'required',
            'idExo' => 'required'
        ]);
        $exo = ExoSoumis::findOrFail($id);
        $path = $request->file('file')->store('exercices_soumis', 'public');
        $exo->contenu = $path;
        $exo->update();
        return to_route('professeur.contenuExo' ,['id' => $request->idExo])->with('success', 'Exercice modifié avec succès !');
    }
    public function suppexosoumis(Request $request){
        $request->validate([
            'id' => 'required',
            'idExo' => 'required'
        ]);
        $exo = ExoSoumis::findOrFail($request->id);
        if($exo){
            $exo->delete();
            return to_route('professeur.contenuExo' ,['id' => $request->idExo])->with('success', 'Exercice supprimé avec succès !');
        }
    }
    public function evaluercours(Request $request){
        $request->validate([
            'score' => 'required',
            'idCours' => 'required'
        ]);
        $etu = Etudiant::where('idUser', '=', Auth::id())->first();
        $eval = Evaluation::where([
            ['idetudiant', '=', $etu->id],
            ['idCours', '=', $request->idCours]
        ])->get();
        if($eval){
            $eval->score = $request->score;
            $eval->update();
            return to_route('professeur.contenu', ['id' => $request->idCours])->with('success', 'Cours noté !');
        }
        else{
            $eval = Evaluation::create([
                'score' => $request->score,
                'idCours' => $request->idCours,
                'idetudiant' => $etu->id
            ]);
            return to_route('professeur.contenu', ['id' => $request->idCours])->with('success', 'Cours noté !');
        }
    }
}
