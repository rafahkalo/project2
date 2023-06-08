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

         $rules=([
<<<<<<< HEAD

=======
>>>>>>> 56a234b (addtional by noha)
            'name' => 'required|string',
            'branch_id' => 'required',
            'type_id' => 'required',
            'star_id' => 'required',
            'location' => 'required|string',
            'image' => 'required',
            'discreption' => 'required|string',
             'code'=>'required',
             'email'=>'required',
             'password'=>'required',
            'amount'=>'required',
<<<<<<< HEAD
            'phones' =>'required|array'
=======
            'phoneOne' =>'required|string',
            'phoneTwo'=>'required|string',
            'contract'=>'required'
>>>>>>> 56a234b (addtional by noha)

        ]);
        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {
            return  $validator->messages();
        }

        $photo = $this->saveFile($request, 'image', public_path('/uploads'));
<<<<<<< HEAD
=======
        $photoo = $this->saveFile($request, 'contract', public_path('/uploads'));

>>>>>>> 56a234b (addtional by noha)
        $office = Office::create([

            'image' => $photo,
            'name' => $request->name,
            'branch_id' => $request->branch_id,
            'type_id' => $request->type_id,
<<<<<<< HEAD

=======
              'contract'=>$photoo,
              'phoneOne'=>$request->phoneOne,
              'phoneTwo'=>$request->phoneTwo,
>>>>>>> 56a234b (addtional by noha)
            'star_id' => $request->star_id,
            'location' => $request->location,
            'discreption' => $request->discreption,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)

        ]);

<<<<<<< HEAD
        $phones=$request->phones;
        if (is_array($phones) || is_object($phones))
=======
        /*$phones=$request->phones;
       /* if (is_array($phones) || is_object($phones))
>>>>>>> 56a234b (addtional by noha)
{
        foreach($phones as $phone) {
             $num=new Number();
            $num->phone=$phone;
            $num->office_id=$office->id;
            $num->save();
        }
<<<<<<< HEAD
}
=======
}*/
>>>>>>> 56a234b (addtional by noha)
Wallet_Office::create([
'code'=>$request->code,
'amount'=>$request->amount,
'office_id'=>$office->id
]);
     return response()->json(['message' => 'office save successfully'], 200);

    }

   public function showAllOffices(){
        $offices=Office::where('status','0')->get();
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

public function AddOffice(Request $request)
    {

         $rules=([

            'name' => 'required|string',
            'branch_id' => 'required',
            'type_id' => 'required',
            'star_id' => 'required',
            'location' => 'required|string',
            'image' => 'required',
<<<<<<< HEAD
=======
            'contract'=>'required',
>>>>>>> 56a234b (addtional by noha)
            'discreption' => 'required|string',
             'code'=>'required',
             'email'=>'required',
             'status'=>'required',
             'password'=>'required',
            'amount'=>'required',
<<<<<<< HEAD
            'phones' =>'required|array'
=======
            'phoneOne' =>'required|string',
            'phoneTwo'=>'required|string',
            //
>>>>>>> 56a234b (addtional by noha)

        ]);
        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {
            return  $validator->messages();
        }

        $photo = $this->saveFile($request, 'image', public_path('/uploads'));
<<<<<<< HEAD
        $office = Office::create([

            'image' => $photo,
=======
        $photoo= $this->saveFile($request, 'contract', public_path('/uploads'));
        $office = Office::create([

            'image' => $photo,
           'contract'=>$photoo,
>>>>>>> 56a234b (addtional by noha)
            'name' => $request->name,
            'branch_id' => $request->branch_id,
            'type_id' => $request->type_id,
            'status' => $request->status,
            'star_id' => $request->star_id,
            'location' => $request->location,
            'discreption' => $request->discreption,
            'email'=>$request->email,
<<<<<<< HEAD
=======
            'phoneOne' => $request->phoneOne,
            'phoneTwo'=> $request->phoneTwo,
>>>>>>> 56a234b (addtional by noha)
            'password'=> Hash::make($request->password)

        ]);

<<<<<<< HEAD
        $phones=$request->phones;
=======
      /*  $phones=$request->phones;
>>>>>>> 56a234b (addtional by noha)
        if (is_array($phones) || is_object($phones))
{
        foreach($phones as $phone) {
             $num=new Number();
            $num->phone=$phone;
            $num->office_id=$office->id;
            $num->save();
        }
<<<<<<< HEAD
}
=======
}*/
>>>>>>> 56a234b (addtional by noha)
Wallet_Office::create([
'code'=>$request->code,
'amount'=>$request->amount,
'office_id'=>$office->id
]);
     return response()->json(['message' => 'office save successfully'], 200);

    }
}