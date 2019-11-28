<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Role;
use Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showuser()
    {
        $users = User::All();
        $role = Role::All();
        $userUnique = Auth::user();
        if(Auth::user()->role->name == "admin") {
        //    $role = Auth::user()->role; 
           return view('users.showuser', compact('role', 'users', 'userUnique'));
        } else {
            // return view('users.showuser', compact('users'));
            return view('/home');
        } 
    }

    public function createuser() 
    {
        $roles = Role::All();
        return view ('users.createuser', compact('roles'));
    }

    public function storeuser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'password' => 'required',
            'role_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('users/storeuser')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id
            ]);
    
            $user->save();
    
            return redirect('users')->with('add', 'Le nouveau  utilisateur a bien été créé !');
        }
    }

    public function edituser($id)
    {
        $user = User::find($id);
        $roles = Role::All();
        return view('users.edituser', compact('user', 'roles'));
    }

    public function updateuser(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'password' => 'required',
            'role_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect("user/edit/$id")
                        ->withErrors($validator)
                        ->withInput();
        } else {
            // Récupération du livre dans la table 'users' dont l'ID == à l'ID du livre récupéré
            $user = user::find($id);

            // La valeur de la colonne 'name' de mon book sera remplacé par le résultat du name de la requête du formulaire
         
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role_id = $request->role_id;


            // Sauvegarde et modification
            $user->save();

            // Redirection avec un message de succès
            return redirect('users')->with('modif', 'Votre utilisateur a bien été modifié !');
        }
    }
    public function deleteuser($id) 
    {
        $user =  User::find($id);

        $user->delete();
        return redirect('users')->with('supp', ' Votre utilisateur a bien été supprimé');
    }
}
