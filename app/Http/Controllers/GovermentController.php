<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goverments;
class GovermentController extends Controller
{
    public function  addGoverment(Request $request){
       
        $input=$request->validate([
           
            'name'=>'required|string',
           
          ]);
      

       $data= new Goverments();
       $data->name=$request->name;
       
       $data->save();

            return  response()->json(['message'=>'goverment save successfully'], 200);
        
        }

}
