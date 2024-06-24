<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddProfesseurRequest;
use App\Models\Professeur;

class AdminController extends Controller
{
    public function index(){
        return view('administrateur/index');
    }
    public function addProfesseur(AddProfesseurRequest $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'first_name' => $request->first_name,
            'role' => 'professeur',
            'password' => Hash::make($request->password)
        ]);
        $prof = Professeur::create([
            'phone_number' => $request->phone_number,
            'specialite' => $request->specialite,
            'idUser' => $user->id
        ]);
        return redirect()->route('admin.listeprof')->with('sucess', 'Professeur ajouté avec succès ! ');
    }
    public function dropProfesseur($id)
    {
        $prof = Professeur::find($id);
        if($prof){
            $prof->delete();
            return redirect()->route('admin.listeprof')->with('success', 'Professeur supprimé avec succès !');
        }
    }
    public function listeprof(){
        $profs = Professeur::paginate(10);
        return view('administrateur.listeprof', [
            'profs' => $profs
        ]);
    }
}
