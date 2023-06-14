<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use App\Models\Stars;
use App\Models\Number;
use App\Http\Controllers\FileController as FileController;
use App\Models\Wallet;
use App\Models\Wallet_Office;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OfficesController extends FileController
{

    public function requestJoin(Request $request)
    {

        $rules = ([

            'name' => 'required|string',
            'branch_id' => 'required',
            'type_id' => 'required',
            'star_id' => 'required',
            'location' => 'required|string',
            'image' => 'required',
            'discreption' => 'required|string',
            'code' => 'required',
            'email' => 'required',
            'password' => 'required',
            'amount' => 'required',
            'phoneOne' => 'required|string',
            'phoneTwo' => 'required|string',
            'contract' => 'required'

        ]);
        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {
            return  $validator->messages();
        }

        $photo = $this->saveFile($request, 'image', public_path('/uploads'));

        $photoo = $this->saveFile($request, 'contract', public_path('/uploads'));

        $office = Office::create([

            'image' => $photo,
            'name' => $request->name,
            'branch_id' => $request->branch_id,
            'type_id' => $request->type_id,
            'contract' => $photoo,
            'phoneOne' => $request->phoneOne,
            'phoneTwo' => $request->phoneTwo,
            'star_id' => $request->star_id,
            'location' => $request->location,
            'discreption' => $request->discreption,
            'email' => $request->email,
            'password' => Hash::make($request->password)

        ]);


        Wallet_Office::create([
            'code' => $request->code,
            'amount' => $request->amount,
            'office_id' => $office->id
        ]);
        return response()->json(['message' => 'office save successfully'], 200);
    }




    public function showAllOffices()
    {
        $offices = Office::where('status', '0')->get();
        return response()->json(['AllOffices' => $offices], 200);
    }

    public function AcceptOffice($id)
    {


        $Office = Office::find($id)->update([
            'status' => 'true'
        ]);
        return response()->json([
            'message' => 'Accept this Office',
            'info office' => $Office
        ], 200);
    }
    public function RefuseOffice($id)
    {

        Office::find($id)->delete();
        return response()->json([
            'message' => 'Cancel this Office',
        ], 200);
    }

    public function searchByName(Request $request)
    {

        $office = Office::with(['branch.goverment'])->where('name', $request->name)->get();
        return response()->json(['Office Info' => $office], 200);
    }
    public function getInformationOffice($id)
    {
        $office = Office::find($id);

        if (!$office) {
            return response()->json(['message' => 'Office not found'], 404);
        }

         if (!$office->status) {
            return response()->json(['message' => 'Office is not approved'], 403);
        }


        return response()->json($office);
    }

    public function getOfficesByStars($stars)
    {
        $star = Stars::where('number', $stars)->first();

        if (!$star) {
            return response()->json(['message' => 'No offices found for the given number of stars'], 404);
        }

        $offices = Office::where('star_id', $star->id)->where('status', true)->get();

        return response()->json($offices);
    }
    public function editStar(Request $request, $id)
    {
        $star = Stars::where('number', $request->input('stars'))->first();
        if (!$star) {
            return response()->json(['message' => 'Invalid star rating'], 404);
        }
        $Office = Office::find($id)->update([
            'id_star' => $star->id
        ]);

        return response()->json(['message' => 'Stars updated successfully'], 200);
    }

    public function AddOffice(Request $request)
    {

        $rules = ([

            'name' => 'required|string',
            'branch_id' => 'required',
            'type_id' => 'required',
            'star_id' => 'required',
            'location' => 'required|string',
            'image' => 'required',
            'contract' => 'required',
            'discreption' => 'required|string',
            'code' => 'required',
            'email' => 'required',
            'status' => 'required',
            'password' => 'required',
            'amount' => 'required',
            'phoneOne' => 'required|string',
            'phoneTwo' => 'required|string',

        ]);
        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {
            return  $validator->messages();
        }

        $photo = $this->saveFile($request, 'image', public_path('/uploads'));



        $photoo = $this->saveFile($request, 'contract', public_path('/uploads'));
        $office = Office::create([

            'image' => $photo,
            'contract' => $photoo,


            'name' => $request->name,
            'branch_id' => $request->branch_id,
            'type_id' => $request->type_id,
            'status' => $request->status,
            'star_id' => $request->star_id,
            'location' => $request->location,
            'discreption' => $request->discreption,
            'email' => $request->email,

            'phoneOne' => $request->phoneOne,
            'phoneTwo' => $request->phoneTwo,

            'password' => Hash::make($request->password)

        ]);
        Wallet_Office::create([
            'code' => $request->code,
            'amount' => $request->amount,
            'office_id' => $office->id
        ]);
        return response()->json(['message' => 'office save successfully'], 200);
    }
    public function loginOffice(Request $request){

      
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $office = Office::where('email', $fields['email'])->first();

          if($office->status=='true'){

        

        // Check password
        if(!$office || !Hash::check($fields['password'], $office->password)) {
            return response([
                'message' => 'Password is worng'
            ], 401);
        }
        $token = $office->createToken('ooficeToken')->plainTextToken;

        $response = [
            'message' => 'Welcome With You',
            'token' => $token
        ];

        return response($response, 201);}
        else{
            $response = [
                'message' => 'Wait the Acceptance',
            
            ];
            return response($response, 201);


        }



    }
}