<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

  public function index()
{
    // On récupère tous les utilisateurs
    $users = User::all();

    // On retourne les informations des utilisateurs en JSON
    return response()->json($users);
}

public function show(User $user)
{
    // On retourne les informations de l'utilisateur en JSON
    return response()->json($user);
}
public function update(Request $request, User $user)
{
          // La validation de données
          $this->validate($request, [
              'name' => 'required|max:100',
              'email' => 'required|email',
              'password' => 'required|min:8',
              'login' => 'required|unique:users',
          ]);

          // On modifie les informations de l'utilisateur
          $user->update([
              "name" => $request->name,
              "email" => $request->email,
              "password" => bcrypt($request->password),
              'login'=> $request->login,
          ]);

          // On retourne la réponse JSON
          return response()->json();
}

public function store (Request $request){

                // La validation de données
              $this->validate($request, [
                  'name' => 'required|max:100',
                  'email' => 'required|email|unique:users',
                  'password' => 'required|min:8',
                  'login' => 'required|unique:users',
              ]);
              // On crée un nouvel utilisateur
              $user = User::create([
                  'name' => $request->name,
                  'email' => $request->email,
                  'password' => bcrypt($request->password),
                  'login'=> $request->login,
              ]);
              // On retourne les informations du nouvel utilisateur en JSON
              return response()->json($user, 201);

    }
}
