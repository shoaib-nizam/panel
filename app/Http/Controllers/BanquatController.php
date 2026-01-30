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


   public function displayBanquet()
{
    // Fetch all banquets from the database
    $banquats = Banquat::paginate(10); 

    // If this is for an AJAX call, return JSON
    return response()->json($banquats);
}

}