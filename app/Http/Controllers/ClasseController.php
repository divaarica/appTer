<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listClasses=Classe::all();
        return view('Admin.listClasses',compact('listClasses'));
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
                "name" => "required|regex:/^[A-Za-z0-9\s]+$/",
            ]
        );

        Classe::create($request->all());

        return redirect()->route('classes.index')->with('success', 'region modifier avec succès.');
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
        $classe = Classe::find($id);
        $request->validate(
            [
                "name" => "required|regex:/^[A-Za-z\s]+$/",
            ]
        );

        $input = $request->all(); 
        $classe->update($input);

        return redirect()->route('classes.index')->with('success', 'zone modifier avec succès.');
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $classe= Classe::find($id);
        $classe->delete();
        return redirect()->route('classes.index')->with('success', 'region supprimée avec succès.');
    }
}
