<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use App\Models\Stars;
use App\Models\Number;
use App\Http\Controllers\FileController as FileController;
class OfficesController extends FileController
{

    public function addOffice(Request $request)
    {

        $input = $request->validate([

            'name' => 'required|string',

            'branch_id' => 'required',
            'type_id' => 'required',
            'star_id' => 'required',
            'location' => 'required|string',
            'image' => 'required|min:1',
            'discreption' => 'required|string',

        ]);
        $photo = $this->saveFile($request, 'image', public_path('public/uploads/'));
        $office = Office::create([

            'image' => $photo,
            'name' => $input['name'],
            'branch_id' => $input['id_branch'],
            'type_id' => $input['id_type'],

            'star_id' => $input['id_star'],
            'location' => $input['location'],
            'discreption' => $input['discreption'],


        ]);

        $phones=$request->phones;
        foreach($phones as $phone) {
            $data[] = [
                'phone' => $phone,
                'office_id' => $office->id
            ];
        }
        Number::insert($data);


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
public function getInformationOffice($id)
{
    $office = Office::find($id);

    if (!$office) {
        return response()->json(['message' => 'Office not found'], 404);
    }

    return response()->json($office);
}

public function getOfficesByStars($stars)
{
    $star = Stars::where('number', $stars)->first();

    if (!$star) {
        return response()->json(['message' => 'No offices found for the given number of stars'], 404);
    }

    $offices =Office::where('star_id' , $star->id)->get();

    return response()->json($offices);
}
public function editStar(Request $request,$id)
{
    $star = Stars::where('number', $request->input('stars'))->first();
    if (!$star) {
        return response()->json(['message' => 'Invalid star rating'], 404);
    }
    $Office=Office::find($id)->update([
        'id_star' => $star->id]);

    return response()->json(['message' => 'Stars updated successfully'],200);
}
}