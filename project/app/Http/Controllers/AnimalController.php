<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
// use Illuminate\Validation\Validator;
use Validator;
use App\Animal;
use App\Race;
use App\Role;
use Auth;

class AnimalController extends Controller
{

    public function show()
    {
        $animals = Animal::All();
        $user = Auth::user();
        $role = Role::All();
        if(Auth::user()) {
        //    $role = Auth::user()->role; 
           return view('animals.show', compact('animals','role', 'user'));
        } else {
            return view('animals.show', compact('animals'));
        }    
    }

    public function create() 
    {
        $races = Race::All();
        return view ('animals.create', compact('races'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'name' => 'required|max:100',
            'description' => 'required|max:100',
            'sexe' => 'required',
            'age' => 'required',
            'pound' => 'required',
            'height' => 'required',
            'race_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('animals/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $animal = new Animal([
                'name' => $request->name,
                'description' => $request->description,
                'sexe' => $request->sexe,
                'age' => $request->age,
                'pound' => $request->pound,
                'height' => $request->height,
                'race_id' => $request->race_id
                
            ]);
    
            $animal->save();
    
            return redirect('animals')->with('add', 'Votre animale a bien été créé !');
        }

    }

    public function edit($id)
    {
        $animal = Animal::find($id);
        $races = Race::All();
        return view('animals.edit', compact('animal', 'races'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'description' => 'required|max:100',
            'sexe' => 'required',
            'age' => 'required',
            'pound' => 'required',
            'height' => 'required',
            'race_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect("animal/edit/$id")
                        ->withErrors($validator)
                        ->withInput();
        } else {
            // Récupération du livre dans la table 'animals' dont l'ID == à l'ID du livre récupéré
            $animal = Animal::find($id);

            // La valeur de la colonne 'name' de mon book sera remplacé par le résultat du name de la requête du formulaire
         
            $animal->name = $request->name;
            $animal->description = $request->description;
            $animal->sexe = $request->sexe;
            $animal->age = $request->age;
            $animal->pound = $request->pound;
            $animal->height = $request->height;
            $animal->race_id = $request->race_id;

            // Sauvegarde et modification
            $animal->save();

            // Redirection avec un message de succès
            return redirect('animals')->with('modif', 'Votre animale a bien été modifié !');
        }
    }
    public function delete($id) 
    {
        $animal =  Animal::find($id);

        $animal->delete();
        return redirect('animals')->with('supp', ' Votre animale a bien été supprimé');
    }


}
