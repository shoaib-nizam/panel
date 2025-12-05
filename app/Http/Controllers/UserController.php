<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
   public function register(UserRequest $req){
       
         $data = User::create([
        'name' => $req->name,
        'email' => $req->email,
        'password' => Hash::make($req->password),
        'role' => $req->role
    ]);

        if($data){
                return redirect()->route('login_form');
        }
   }

   public function login(Request $req){

        $vali =  $req->validate([
                
                'email' => 'required',
                'password' => 'required',
            ]);

            if(Auth::attempt($vali)){

               // Gate::authorize('Admin');

               return redirect()->route('admin-panel');

               // if(Gate::allows('Admin')){
               //      return redirect()->route('admin-panel');
               // }else{
               //      return "Access Denied.";
               // }    
            }
            
   }

   public function dashboardPage(){
        
        return redirect()->route('login_form');

   }


   public function logout(){

        Auth::logout();
        return view('login');
   }

  

   
   public function show(Request $request)
{
    if ($request->ajax()) {
        $users = User::paginate(10);
        return response()->json($users);
    }

    return view('admin.index');
}

public function delete(Request $request)
{
    User::find($request->id)->delete();

    return response()->json(['success' => true]);
}



}
