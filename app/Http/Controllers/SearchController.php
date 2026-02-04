<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Search;

class SearchController extends Controller
{
    public function banquetSearch(Request $req){
        if($req->ajax()){
     $data = Search::where('banquet_name','LIKE',$req->banquetsearch.'%')->get();
        $output = '';
        if(count($data) > 0){

        }else{
            $output .='<li class = "list-group-item">No Data Found</li>';
        }
        }
        return view('admin.index');
    }
}
