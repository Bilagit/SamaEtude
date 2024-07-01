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
    public function index()
    {
        $usersCount = User::count();
        $studentsCount = Etudiant::count();
        $professorsCount = Professeur::count();

        return view('administrateur.dashboard', [
            'usersCount' => $usersCount,
            'studentsCount' => $studentsCount,
            'professorsCount' => $professorsCount,
        ]);
    }

    public function listeprof(){
        $profs = User::where('role', '=', 'professeur')->paginate(10);
        $categories = Categorie::all();
        $professeurs = Professeur::all();
        return view('administrateur.listeprof', [
            'profs' => $profs,
            'categories' => $categories,
            'professeurs' => $professeurs
        ]);
    }
    public function listecategorie(){
        $categories = Categorie::withCount('cours')->get();
        return view('administrateur.listecategorie', [
            'categories' => $categories,
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
        $path = $request->file('image')->store('categories', 'public');
        $categorie = Categorie::create([
            'nom' => $request->nom,
            'image' => $path
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
            'nom' => 'required',
            'image' => 'required'
        ]);
        $categorie = Categorie::findOrFail($id);
        $categorie->nom = $request->nom;
        $categorie->image = $request->image;
        $categorie->update();
        return to_route('admin.listecategorie')->with('success', 'Catégorie modifiée avec succès !');
    }
    public function getetudiants(){
        $etudiants = User::where('role', '=', 'etudiant')->paginate(10);
        $users = Etudiant::all();
        return view('administrateur.listeEtudiant', [
            'etudiants' => $etudiants,
            'users' => $users
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
    public function suppprof($id){
        $user = User::findOrFail($id);
        if($user){
            $prof = Professeur::where('idUser', '=', $id);
            $prof->delete();
            $user->delete();
            return to_route('admin.listeprof')->with('success', 'Professeur supprimé avec succès !');
        }
    }
}
