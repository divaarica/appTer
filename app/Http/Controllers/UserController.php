<?php

namespace App\Http\Controllers;

use App\Models\Ligne;
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user=User::find($id);
        $request->validate(
            [
                'firstName'=> "required|lowercase|regex:/^[\s]+$/",
                'lastName'=> "required|lowercase|regex:/^[\s]+$/",
                'adresse'=> "required|lowercase|regex:/^[\s]+$/",
                'tel'=> "required|numeric",
                'email'=> "required",
            ]
        );

        $input = $request->all();
        dd($input);
        $user->update($input);

        return redirect()->route('users.index')->with('success', 'Utilisateur modifier avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function reserve(){

        return view('User.reserve');
    }


    public function doReserve(){
       //
    }


    public function myReserve(){

        return view('User.myReserve');
    }




}