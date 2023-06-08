<?php

namespace App\Http\Controllers ;
use App\Http\Controllers ;

use Illuminate\Http\Request;

class FileController extends Controller
{
   public function saveFile(Request $request,$fileName,$destinationPath)
   {
$i=1;
if($request->hasFile($fileName))
{
$file=$request->file($fileName);
$name=time().'.'.$file->getClientOriginalExtension();
$file->move($destinationPath,$name);
return $name;

}

   }
}
