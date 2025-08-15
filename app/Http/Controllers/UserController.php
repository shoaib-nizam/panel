<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function register(Request $req){
         $req->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'role' => 'required'
        ]);

        $data = DB::table('users')->insert([
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


}
