<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manage;

class ManageController extends Controller
{

function manage_show(){
   $manage =  Manage::all();

   return view('admin.manage',['data' => $manage]);
}
    
}
