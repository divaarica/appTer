<?php

namespace App\Http\Controllers;

use App\Models\Ligne;
use App\Models\Zone;
use Illuminate\Http\Request;

class LigneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listLignes=Ligne::all();
        return view('Admin.listLignes',compact('listLignes'));
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
                "start" => "required|lowercase|regex:/^[A-Za-z0-9\s]+$/",
                "end" => "required|lowercase|regex:/^[A-Za-z0-9\s]+$/",
            ]
        );

        Ligne::create($request->all());

        return redirect()->route('lignes.index')->with('success', 'region modifier avec succès.');
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
        $ligne = Ligne::find($id);
        $request->validate(
            [
                "start" => "required|lowercase|regex:/^[A-Za-z0-9\s]+$/",
                "end" => "required|lowercase|regex:/^[A-Za-z0-9\s]+$/",
            ]
        );


        $input = $request->all(); 
        $ligne->update($input);

        return redirect()->route('lignes.index')->with('success', 'zone modifier avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ligne = Ligne::find($id);
        $ligne->delete();
        return redirect()->route('lignes.index')->with('success', 'region supprimée avec succès.');
    }
}
