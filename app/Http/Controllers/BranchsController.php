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
            'gov_id'=>'required'  ,
          ]);
     

       $data= new Branch();
       $data->name=$request->name;
       $data->gov_id=$request->gov_id;

       $data->save();

            return  response()->json(['message'=>'Branch save successfully'], 200);
        
        }
        public function alllBranches(){

        $branches=Branch::all();


        return  response()->json(['Offices'=>$branches], 200);
}


            
        
        public function searchByBranch($id){

            $branch=Branch::with(['office'=>function($q){
            }])->get();
            
            
            
            //)->where('id',$id)->get();
            
            return  response()->json(['Offices'=>$branch], 200);

    
        }
}