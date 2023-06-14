<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\FileController as FileController;
class DriverController extends FileController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function JoinRequest (Request $request)
    {
        //Send a joining request
        $rules = ([
           // 'car_id' => 'required',
            'office_id' => 'required',
            'address' => 'required',
           
            'image2' => 'required|image',
            'image1' => 'required|image',
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phoneOne' => 'required|numeric',
            'phoneTwo' => 'required|numeric',
            

        ]);
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return  $validator->messages();
        }
        $image2 = $this->saveFile($request, 'image2', public_path('/uploads'));

        $image1 = $this->saveFile($request, 'image1', public_path('/uploads'));

        $Driver = Driver::create([
            //'car_id' => $request->car_id,
            'office_id' => $request->office_id,
            'address' => $request->address,
           
            'image2' => $image2,
            'image1' => $image1,
        
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phoneOne' => $request->phoneOne,
            'phoneTwo' => $request->phoneTwo,
        ]);

        return response()->json($Driver, 200);
    }

    public function AcceptDriver( $id)
    {
        $driver = Driver::find($id)->update([
            'status' => 'true'
        ]);
        return response()->json([
            'message' => 'Accept this Driver',
        ], 200);
    }

    public function RefuseDriver($id)
    {

        Driver::find($id)->delete();
        return response()->json([
            'message' => 'Cancel this Driver',
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        //
    }
}
