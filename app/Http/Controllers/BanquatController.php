<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banquat;
use Symfony\Component\HttpFoundation\Response;


class BanquatController extends Controller
{
    function addBanquat(Request $request){

        $file = $request->file('bimage');
        $fileName = time().''.$file->getClientOriginalName();
        
        $filePath = $file->storeAs('images',$fileName,'public');

       $banquat =   new Banquat;
       $banquat->banquet_name = $request->bname;
       $banquat->banquet_address = $request->baddress;
       $banquat->banquet_image = $filePath;
       $banquat->save();
        return response()->json(['res'=>'Banquet Add Successfully']);

  
    }


   public function displayBanquet(Request $req)
{

$query = Banquat::query(); 

if($req->ajax()){
  $bnq =   $query->where('banquet_name','LIKE','%'.$req->searchBanquet.'%')->get();
  return response()->json(['bnq' => $bnq]);
}else{
    $banquats = $query->get();
    return view('admin.index',compact('banquats'));
}
   
    
}




}