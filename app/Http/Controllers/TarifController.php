<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listTarifs = Tarif::all();
        $listClasses = Classe::all();
        return view('Admin.listTarifs', compact('listTarifs'),compact('listClasses'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'price'=> "required|numeric",
                'nbZones'=> "required|numeric",
                'nbPersons'=> "required|numeric",
            ]
        );

        Tarif::create($request->all());

        return redirect()->route('tarifs.index')->with('success', 'Tarif enregistrer avec succès.');
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
        $tarif= Tarif::find($id);
        $request->validate(
            [
                'price'=> "required|numeric",
                'nbZones'=> "required|numeric",
                'nbPersons'=> "required|numeric",
            ]
        );


        $input = $request->all();
        $tarif->update($input);

        return redirect()->route('tarifs.index')->with('success', 'Tarif modifier avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tarif = Tarif::find($id);
        $tarif->delete();
        return redirect()->route('tarifs.index')->with('success', 'Tarif supprimée avec succès.');
    }
}
