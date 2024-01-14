<?php

namespace App\Http\Controllers;

use App\Models\Ligne;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listZones=Zone::all();
        return view('Admin.listZones',compact('listZones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                "name" => "required|lowercase|regex:/^[A-Za-z0-9\s]+$/",
            ]
        );

        Zone::create($request->all());

        return redirect()->route('zones.index')->with('success', 'region modifier avec succès.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */

     //  model bingings
     public function update(Request $request, $id)
     {
        $zone = Zone::find($id);
        $request->validate(
            [
                "name" => "required|lowercase|regex:/^[A-Za-z0-9\s]+$/",
            ]
        );

        $input = $request->all(); 
        $zone->update($input);

        return redirect()->route('zones.index')->with('success', 'zone modifier avec succès.');
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $zone = Zone::find($id);
        $zone->delete();
        return redirect()->route('zones.index')->with('success', 'region supprimée avec succès.');
    }
}
