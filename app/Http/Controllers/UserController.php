<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Ligne;
use App\Models\Region;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('User.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('User.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                //"nom" => "required|alpha|lowercase|max:100",
                "firstName" => "required",
                "lastName" => "required",
                "adress" => "required",
                "tel" => "required",
                "email" => "required",
                "password" => "required",
                //"prenom" => "required|alpha|lowercase|max:100",
                //"adresse" => "required|alpha|max:200",
                //"telephone" => "required|numeric|lowercase|max:100000000",
                //"email" => "required|alpha|lowercase|max:100",
                //"mdp" => "required|alpha|max:100",

            ]
        );

        $request['mdp'] = Hash::make($request['mdp']);
        User::create($request->all());
        return view('auth.login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('User.edit');
    }

    public function editPassword(){
        return view('User.changerPasse');
    }


    /**
     * Update the specified resource in storage.
     */

    public function updatePassword(Request $request, $id)
    {
        $user = User::find($id);
        //dd($admin);
        $request->validate(

            [
                'password' => "required",
                'new_password' => "required",
            ]
        );


        if (!Hash::check($request->input('password'), $user->password)) {
            return redirect()->route('users.editPassword', ['user'=> auth()->user()->id] )->with('message', 'Modification echouer, mot de passe incorrecete');
        }

        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return redirect()->route('users.editPassword', ['user'=> auth()->user()->id] )->with('message', 'Mot de passe modifier avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        $user = auth()->user();
        if ($user->role_id == 1) {
            return redirect()->route('list-users')->with('success', 'utilisateur supprimé avec succès.');
        }
        return redirect()->route('reservations.index')->with('success', 'utilisateur supprimé avec succès.');
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate(

            [
                'firstName' => "required|lowercase",
                'lastName' => "required|lowercase",
                'adress' => "required|lowercase",
                'tel' => "required|numeric",
                'email' => "required",
            ]
        );

        $input = $request->all();

        $user->update($input);

        return redirect()->route('users.edit', ['user'=> auth()->user()->id] )->with('success', 'Utilisateur modifier avec succès.');
    }
}
