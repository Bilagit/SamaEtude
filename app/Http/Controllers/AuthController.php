<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Etudiant;
use App\Models\Professeur;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function doregister(SignUpRequest $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'first_name' => $request->first_name,
            'role' => 'etudiant',
            'password' => Hash::make($request->password)
        ]);
        $etu = Etudiant::create([
            'phone_number' => $request->phone_number,
            'level' => $request->level,
            'idUser' => $user->id
        ]);
        if ($user) {
            return to_route('auth.login');
        }
        return to_route('auth.register');
    }
    public function register(){
        return view('auth.register');
    }
    public function login(){
        return view('auth.login');
    }
    public function dologin(SignInRequest $request){
        $credentials = $request->validated();
        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role === 'administrateur') {
                return redirect()->intended(route('admin.index'));
            }
            else if ($user->role === 'professeur'){
                return redirect()->intended(route('professeur.cours'));
            }
            else{
                return redirect()->intended(route('etudiant.index'));
            }
        }
        return to_route('auth.login')->withErrors([
            'email' => 'Email ou mot de passe invalide'
        ])->onlyInput('email');
    }
    public function profil()
    {
        $user = Auth::user();
        if ($user->role === 'etudiant') {
            $info = Etudiant::find($user->id);
            return view('auth.profil', ['user' => $user, 'info' => $info]);
        }
        if ($user->role === 'professeur') {
            $info = Professeur::find($user->id);
            return view('auth.profil', ['user' => $user, 'info' => $info]);
        }
        return view('auth.profil', ['user' => $user]);
    }
    public function updateprofiletud(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
            'phone_number' => 'required'
        ]);
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();
        $info = Etudiant::where('idUser', '=', $user->id)->first();
        $info->phone_number = $request->phone_number;
        $info->level = $request->level;
        $info->update();
        return to_route('auth.profil')->with('success', 'Profil modifié avec succès ! ');
    }
    public function updateprofilprof(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required'
        ]);
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();
        $info = Professeur::where('idUser', '=', $user->id)->first();
        $info->phone_number = $request->phone_number;
        $info->update();
        return to_route('auth.profil')->with('success', 'Profil modifié avec succès ! ');
    }
    public function updateprofil(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'name' => 'required',
            'email' => 'required'
        ]);
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();
        return to_route('auth.profil')->with('success', 'Profil modifié avec succès ! ');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
