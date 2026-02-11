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
    $query = Banquat::query()->take(5);

    if ($req->ajax()) {
        $banquats = $query->where('banquet_name', 'LIKE', '%' . $req->searchBanquet . '%')->get();

        $output = '';

        if ($banquats->count() > 0) {
            foreach ($banquats as $banquat) {
                $output .= '
                <tr>
                    <td>'.$banquat->banquet_id.'</td>
                    <td>'.$banquat->banquet_name.'</td>
                    <td>'.$banquat->banquet_address.'</td>
                     <td><img src="'.asset('storage/'.$banquat->banquet_image).'" width="100" /></td>
                       <td><a href="#" class="btn btn-warning">Update</a></td>
                        <td><a href="#" class="btn btn-danger">Delete</a></td>
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

    $banquats = $query->get();
    return view('admin.index', compact('banquats'));
}



}