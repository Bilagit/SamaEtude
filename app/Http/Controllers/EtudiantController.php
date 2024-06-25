<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    public function updateProfile(Request $request, $id)
    {
        // Récupérer l'utilisateur et l'étudiant à partir de l'id
        $user = User::findOrFail($id);
        $etudiant = Etudiant::where('idUser', $user->id)->firstOrFail();

        // Mettre à jour les champs de l'utilisateur
        $user->name = $request->input('name');
        $user->first_name = $request->input('first_name');
        $user->email = $request->input('email');

        // Mettre à jour les champs de l'étudiant
        $etudiant->phone_number = $request->input('phone_number');
        $etudiant->level = $request->input('level');

        // Sauvegarder les modifications
        $user->save();
        $etudiant->save();

        // Rediriger avec un message de succès (optionnel)
        return redirect()->back()->with('success', 'Profil mis à jour avec succès.');
    }
}
