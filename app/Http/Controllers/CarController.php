<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorCarRequestr;
use App\Models\Car;
use App\Models\Driver;
use Illuminate\Http\Request;

class CarController extends FileController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Office $office)
    {
        //$cars= $office->cars()->get();
        //return response()->json($cars,200);
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
    public function store(StorCarRequestr $request)
    {
        $photo = $this->saveFile($request, 'image', public_path('/carImages'));

        $validated = $request->validated();
        Car::create($validated);
        return response()->json(['meesage'=>'Added Successfully Car']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }

  

}