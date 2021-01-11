<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        
        if($request->ajax()) {
          
            $data = User::where('username', 'LIKE', $request->username.'%')
                ->get();
           
            $output = '';
           
            if (count($data)>0) {
              
                $output = '<ul class="suggestions" style="display: block; position: relative; z-index: 1">';
              
                foreach ($data as $row){
                   
                    $output .= '<li>'.$row->name.'</li>';
                }
              
                $output .= '</ul>';
            }
            else {
             
                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }
           
            return $output;
        }
    }
}
