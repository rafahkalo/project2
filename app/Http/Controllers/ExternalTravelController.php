<?php

namespace App\Http\Controllers;

use App\Models\External_Travel;
use Illuminate\Http\Request;

class ExternalTravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getTravels(Office $office)
    {
        $travels= $office->external__travels()->get();
        return response()->json($travels,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show(External_Travel $external_Travel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(External_Travel $external_Travel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, External_Travel $external_Travel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(External_Travel $external_Travel)
    {
        //
    }
}
