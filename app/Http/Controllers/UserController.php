<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

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

 

//      public function dashboardRegister(UserRequest $req){
       
//          $data = User::create([
//         'name' => $req->name,
//         'email' => $req->email,
//         'password' => Hash::make($req->password),
//         'role' => $req->role
//     ]);

       
//    }


public function dashboardRegister(UserRequest $req)
{
    $user = User::create([
        'name'     => $req->name,
        'email'    => $req->email,
        'password' => Hash::make($req->password),
        'role'     => $req->role
    ]);

    return response()->json([
        'status'  => true,
        'message' => 'User registered successfully',
        'data'    => $user
    ], 201);
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

//    public function dashboardPage(){


//             return view('admin.index');
       

//    }


   public function logout(){

        Auth::logout();
        return view('login');
   }


   public function show(Request $req)
{
    $query = User::query()->take(5);

    if ($req->ajax()) {

        $users = $query->where('name', 'LIKE', '%' . $req->users . '%')->get();

        $output = '';

        if ($users->count() > 0) {

            foreach ($users as $user) {

                $output .= '
                <tr>
                    <td>'.$user->id.'</td>
                    <td>'.$user->name.'</td>
                    <td>'.$user->email.'</td>
                    <td>'.$user->role.'</td>
                    <td><a href="#" class="btn btn-warning">Update</a></td>
<td><button data-id="'.$user->id.'" class="btn btn-danger deleteUser">Delete</button></td>

                </tr>';
            }

        } else {

            $output .= '
            <tr>
                <td colspan="6">No Data Found</td>
            </tr>';
        }

        return $output;
    }

    $users = $query->get();
    return view('admin.index', compact('users'));
}




public function destroy($id)
{
    $user = User::find($id);

    if(!$user){
        return response()->json(['status' => false]);
    }

    $user->delete();

    return response()->json(['status' => true]);
}


}
