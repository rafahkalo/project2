<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type_travel;
class TypeController extends Controller
{

    public function  addtype(Request $request){

        $input=$request->validate([

            'name'=>'required|string',

          ]);

       $data= new Type_travel();
       $data->name=$request->name;

       $data->save();

       return  response()->json(['message'=>'Type_travel save successfully'], 200);

        }

}
