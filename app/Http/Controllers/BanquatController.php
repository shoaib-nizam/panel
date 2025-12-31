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

       $banquat =   new Banquat;

    //      $request->validate([
    //     'bname' => 'required',
    //     'baddress' => 'required',
    //     'bimage' => 'nullable',
    // ]);

    // $banquet = Banquat::create([
    //     'banquet_name' => $request->bname,
    //     'banquet_address' => $request->baddress,
    //     'banquet_image' => $request->banquet_image

    // ]);

    // return redirect()->back()->with('success', 'Banquet added successfully!');

    return response()->json(['res'=>'geted']);

    }
}
