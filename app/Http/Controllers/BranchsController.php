<?php

namespace App\Http\Controllers;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchsController extends Controller
{
    //
    public function  addBranch(Request $request){
       
        $input=$request->validate([
           

            'name'=>'required|string'  ,
            'id_gov'=>'required'  ,
          ]);
     

       $data= new Branch();
       $data->name=$request->name;
       $data->id_gov=$request->id_gov;

       $data->save();

            return  response()->json(['message'=>'Branch save successfully'], 200);
        
        }

        public function searchByBranch(Request $request){

            $branch=Branch::with(['office'])->where('name',$request->name)->get();
            
            return  response()->json(['Offices'=>$branch], 200);

    
        }
}