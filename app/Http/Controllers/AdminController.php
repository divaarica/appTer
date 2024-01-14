<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('Admin.dashboard');
    }

    //
    public function editPage()
    {
        return view('Admin.edit');
    }

    public function adminListUsers()
    {

        $listUsers = User::where('role_id', '!=', '1')->get();
        // dd($listUser);

        return view('Admin.listUsers', compact('listUsers'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function updatePassword(Request $request, $id)
    {
        $admin = User::find($id);
        //dd($admin);
        $request->validate(

            [
                'password' => "required",
                'new_password' => "required",
            ]
        );


        if (! Hash::check($request->input('password'), $admin->password)){
            return redirect()->route('admins.editPage')->with('message', 'Modification echouer, mot de passe incorrecete');
        }

        $admin->password = Hash::make($request->input('new_password'));
        $admin->save();

        return redirect()->route('admins.editPage')->with('message', 'Mot de passe modifier avec succès.');
    }

    public function update(Request $request, $id)
    {
        $admin = User::find($id);
        //dd($admin);
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


        $admin->update($input);

        return redirect()->route('admins.editPage')->with('success', 'Utilisateur modifier avec succès.');
    }

    
}
