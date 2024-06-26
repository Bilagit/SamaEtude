<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddProfesseurRequest;
use App\Http\Requests\AddCategorieRequest;
use App\Models\User;
use App\Models\Categorie;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Hash;
use App\Models\Professeur;

class AdminController extends Controller
{
    public function index(){
        return view('administrateur/index');
    }
    public function dropProfesseur($id)
    {
        $prof = Professeur::find($id);
        if($prof){
            $prof->delete();
            return to_route('admin.listeprof')->with('success', 'Professeur supprimé avec succès !');
        }
        else{
            return to_route('admin.index')->with('error', 'impossible de supprimer le professeur.');
        }
    }
    public function listeprof(){
        $profs = User::where('role', '=', 'professeur')->paginate(10);
        return view('administrateur.listeprof', [
            'profs' => $profs
        ]);
    }
    public function listecategorie(){
        $categories = Categorie::paginate(10);
        return view('administrateur.listecategorie', [
            'categories' => $categories
        ]);
    }
    public function ajouterprof(AddProfesseurRequest $request){
        $user = User::create([
            'first_name' => $request->first_name,
            'name' => $request->name,
            'role' => 'professeur',
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $prof = Professeur::create([
            'specialite' => $request->specialite,
            'idUser' => $user->id,
            'telephone' => $request->phone_number
        ]);
        if($user){
            return to_route('admin.listeprof')->with('success', 'Professeur ajouté avec succès !');
        }
    }
    public function addcategorie(AddCategorieRequest $request){
        $categorie = Categorie::create([
            'nom' => $request->nom
        ]);
        if ($categorie) {
            return to_route('admin.listecategorie')->with('success', 'Catégorie ajoutée avec succès !');
        }
    }
    public function deletecategorie($id){
        $categorie = Categorie::find($id);
        if ($categorie) {
            $categorie->delete();
            return to_route('admin.listecategorie')->with('success', 'Catégorie supprimée avec succès ! ');
        }
    }
    public function updatecategorie(Request $request, $id){
        $request->validate([
            'nom' => 'required'
        ]);
        $categorie = Categorie::findOrFail($id);
        $categorie->nom = $request->nom;
        $categorie->update();
        return to_route('admin.listecategorie')->with('success', 'Catégorie modifiée avec succès !');
    }
    public function getetudiants(){
        $etudiants = User::where('role', '=', 'etudiant')->paginate(10);
        return view('administrateur.listeEtudiant', [
            'etudiants' => $etudiants
        ]);
    }
    public function suppetudiant($id){
        $user = User::findOrFail($id);
        if($user){
            $etudiant = Etudiant::where('idUser', '=', $id);
            $etudiant->delete();
            $user->delete();
            return to_route('admin.getetudiants')->with('success', 'Etudiant supprimé avec succès !');
        }
    }
    public function dashboard(){
        return view('administrateur.dashboard');
    }
}
