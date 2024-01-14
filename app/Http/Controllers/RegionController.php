<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Zone;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $listRegions=Region::with('zone')->get;
        $listRegions=Region::all();
        $listZones=Zone::all();
        return view('Admin.listRegions',compact('listRegions'),compact('listZones'));
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
                "name" => "required|lowercase|regex:/^[A-Za-z\s]+$/",
            ]
        );

        Region::create($request->all());

        return redirect()->route('regions.index')->with('success', 'region modifier avec succès.');
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
        $region = Region::find($id);
        $request->validate(
            [
                "name" => "required|lowercase|regex:/^[A-Za-z\s]+$/",
            ]
        );

        $input = $request->all(); 
        $region->update($input);

        return redirect()->route('regions.index')->with('success', 'region modifier avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $region = Region::find($id);
        $region->delete();
        return redirect()->route('regions.index')->with('success', 'region supprimée avec succès.');
    }
}
