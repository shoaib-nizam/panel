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
             
        $output = '<ul class="list-group" style = "display:block; position:relative; z-index:1;">';
                foreach($data as $row){
                $output .='<li class = "list-group-item">'.$row->banquet_name.'</li>';
                }
        $output .= '</ul>';
        }else{
            $output .='<li class = "list-group-item">No Data Found</li>';
        }
            return $output;
        }
        return view('admin.index');
    }
}
