<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banquat;

class BanquatController extends Controller
{
    function addBanquat(Request $request){

         $request->validate([
        'name' => 'required',
        'address' => 'nullable',
        'images' => 'nullable|array',   // array of image filenames
        'videos' => 'nullable|array',   // array of video filenames
    ]);

    $banquet = Banquat::create([
        'name' => $request->name,
        'address' => $request->address,
        'images' => json_encode($request->images),  // convert array to JSON
        'videos' => json_encode($request->videos),  // convert array to JSON
        'city' => $request->city,
        'capacity' => $request->capacity,
        'min_price' => $request->min_price,
        'max_price' => $request->max_price,
        'contact_person' => $request->contact_person,
        'contact_phone' => $request->contact_phone,
        'contact_email' => $request->contact_email,
        'status' => $request->status ?? 1,
    ]);

    return redirect()->back()->with('success', 'Banquet added successfully!');


    }
}
