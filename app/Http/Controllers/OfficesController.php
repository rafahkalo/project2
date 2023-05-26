<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use App\Http\Controllers\FileController as FileController;
class OfficesController extends FileController
{

    public function addOffice(Request $request)
    {

        $input = $request->validate([

            'name' => 'required|string',

            'id_branch' => 'required',
            'id_type' => 'required',
            'id_star' => 'required',
            'location' => 'required|string',
            'image' => 'required|min:1',
            'discreption' => 'required|string',

        ]);
        $photo = $this->saveFile($request, 'image', public_path('public/uploads/'));


        $office = Office::create([

            'image' => $photo,
            'name' => $input['name'],
            'id_branch' => $input['id_branch'],
            'id_type' => $input['id_type'],

            'id_star' => $input['id_star'],
            'location' => $input['location'],
            'discreption' => $input['discreption'],


        ]);
        return response()->json(['message' => 'office save successfully'], 200);

    }

   public function showAllOffices(){
        $offices=Office::where('status',null)->get();
       return response()->json(['AllOffices' => $offices], 200);
   }
public function AcceptOffice($id){


    $Office=Office::find($id)->update([
                 'status' => 'true']);
    return response()->json(['message' => 'Accept this Office',
    'info office'=> $Office], 200);

}
public function RefuseOffice($id){

    Office::find($id)->delete();
    return response()->json(['message' => 'Cancel this Office',
    ], 200);
}

public function searchByName(Request $request){

    $office=Office::with(['branch.goverment'])->where('name',$request->name)->get();
    return response()->json(['Office Info' => $office], 200);

}


}