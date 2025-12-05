<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banquat;

class BanquatController extends Controller
{
    function addBanquat(Request $request){

         $request->validate([
        'bname' => 'required',
        'baddress' => 'required',
        'bimage' => 'nullable',
    ]);

    $banquet = Banquat::create([
        'banquet_name' => $request->bname,
        'banquet_address' => $request->baddress,
        'banquet_image' => $request->banquet_image

    ]);

    return redirect()->back()->with('success', 'Banquet added successfully!');


    }
}
