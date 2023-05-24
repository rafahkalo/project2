<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use App\Http\Controllers\FileController as FileController;
class OfficesController extends FileController
{
    
    public function  addOffice(Request $request){
       
        $input=$request->validate([
           
        'name'=>'required|string',
        'status'=>'required|string',
        'id_branch'=>'required',
        'id_type'=>'required',
        'id_star'=>'required',
        'location'=>'required|string',
        'image'=>'required|min:1',
        'discreption'=>'required|string',
       
          ]);
          $photo=$this->saveFile($request,'image',public_path('public/uploads/'));


          $office=Office::create([
           
           'image'=>$photo,
           'name'=>$input['name'],
           'status'=>$input['status'],
        
          
           'id_branch'=>$input['id_branch'],
           'id_type'=>$input['id_type'],
        
           'id_star'=>$input['id_star'],
           'location'=>$input['location'],
           'discreption'=>$input['discreption'],
        
        
        ]);
   
          
       
            return  response()->json(['message'=>'office save successfully'], 200);
        
        }

}
