<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GraphController extends Controller
{
    //
    public function Index($page = -1){
    	return view("Infograph.Index"); 	
    }

}
