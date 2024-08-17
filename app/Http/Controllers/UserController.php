<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

   
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user= new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        
        $user->save();

        return redirect()->route('users.index')->with('success', 'Utilisateur enregistré avec succès.');

       
       
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }


  
    public function update(Request $request, User $user)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            // 'password' => 'nullable|string|min:8', // Le mot de passe est optionnel
        ]);
    
        // Mise à jour des informations de l'utilisateur
        $user->name = $request->name;
        $user->email = $request->email;
    
        // Si un nouveau mot de passe est fourni, on le met à jour et on le hash
        // if ($request->filled('password')) {
        //     $user->password = Hash::make($request->password);
        // }
    
        // Sauvegarde des modifications
        if ($user->save()) {
            return redirect()->route('users.index')->with('success', 'Utilisateur modifié avec succès.');
        } else {
            return back()->with('error', 'Une erreur est survenue lors de la modification de l\'utilisateur.');
        }
    }
    

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
    
}
