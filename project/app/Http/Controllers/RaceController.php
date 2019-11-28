<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Validation\Validator;
use Validator;
// use App\race;
use App\Race;
use App\Role;
use Auth;

class RaceController extends Controller
{
    public function showrace()
    {
        $races = Race::All();
        $user = Auth::user();
        $role = Role::All();
        if(Auth::user()) {
        //    $role = Auth::user()->role; 
           return view('races.showrace', compact('races','role', 'user'));
        } else {
            return view('races.showrace', compact('races'));
        }    
    }
    public function createrace() 
    {
        // $races = Race::All();
        return view ('races.createrace');
    }

    public function storerace(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'race' => 'required|max:100'
            'name' => 'required|max:100',
            'classification' => 'required|max:100',
            'lifetime' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('races/storerace')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $race = new Race([
                // 'name' => $request->genre
                'name' => $request->name,
                'classification' => $request->classification,
                'lifetime' => $request->lifetime
            ]);
    
            $race->save();
    
            return redirect('races')->with('add', 'Le nouveau genre de race a bien été créé !');
        }
    }

    public function editrace($id)
    {
        $race = Race::find($id);
        // $races = Race::All();
        return view('races.editrace', compact('race'));
    }

    public function updaterace(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'classification' => 'required|max:100',
            'lifetime' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect("race/edit/$id")
                        ->withErrors($validator)
                        ->withInput();
        } else {
            // Récupération du livre dans la table 'races' dont l'ID == à l'ID du livre récupéré
            $race = Race::find($id);

            // La valeur de la colonne 'name' de mon book sera remplacé par le résultat du name de la requête du formulaire
         
            $race->name = $request->name;
            $race->classification = $request->classification;
            $race->lifetime = $request->lifetime;


            // Sauvegarde et modification
            $race->save();

            // Redirection avec un message de succès
            return redirect('races')->with('modif', 'Votre race a bien été modifié !');
        }
    }
    public function deleterace($id) 
    {
        $race =  Race::find($id);

        $race->delete();
        return redirect('races')->with('supp', ' Votre race a bien été supprimé');
    }
}
