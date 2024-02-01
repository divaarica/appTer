<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Ligne;
use App\Models\Region;
use App\Models\Reservation;
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
        $nbUsers= User::where('role_id', '!=', '1')->get()->count();
        $nbLignes=Ligne::count();
        $nbRegions=Region::count();
        $nbReservations=Reservation::count();
        $classesName = Classe::pluck('name')->all();
        $reservationsFirstClass=Reservation::where('class_id', 1)->count();
        $reservationsSecondClass=Reservation::where('class_id', 2)->count();
        return view('Admin.dashboard',compact('nbUsers','nbLignes','nbRegions','nbReservations','classesName','reservationsFirstClass','reservationsSecondClass'));
    }

    //
    public function editPage()
    {
        return view('Admin.edit');
    }

    public function adminListUsers()
    {

        $listUsers = User::where('role_id', '!=', '1')->get();
        $listReservationsEnCours = Reservation::where('state', 1)->get();
        $listReservationsExpire = Reservation::where('state', 0)->get();
        // dd($listUser);

        return view('Admin.listUsers', compact('listUsers', 'listReservationsEnCours','listReservationsExpire'));
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
        dd($request);
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

        if ($admin->role_id == 2) {
            return redirect()->route('users.editPage')->with('success', 'Utilisateur modifier avec succès.');
        }

        return redirect()->route('admins.editPage')->with('success', 'Utilisateur modifier avec succès.');
    }


    
}
