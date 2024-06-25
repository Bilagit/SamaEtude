<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Etudiant;
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
                return redirect()->intended(route('professeur.index'));
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
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
