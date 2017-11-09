<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use URL;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Models\Pages;
use App\Http\Models\General;
use App\Http\Models\Categories;
use Session;

class AjaxController extends Controller
{
    //
    public function Index($page = -1,$title = ""){

    }		
    public function Service($page =-1){
    	if($page !=-1){
    		$page = Pages::find($page);
    		echo filterBody($page->p_body);
    	}
    	else echo "False";
    }
}