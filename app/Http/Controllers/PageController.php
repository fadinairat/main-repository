<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    //
    public function Index($page = -1){
    	if($page !=-1){
    		$details = Pages::find($page);
    		return view("pages.index")->withPage($details);
    	}
    	else{
    		return view("pages.notfound");
    	}    	
    }

	public function getIndex(){
    	return view("Pages/Index");
    }

    public function getAbout(){
    	$firstname = "Mohammad";
    	$email = "fadi@intertech.ps";
    	$data = array(
    		"first_name"=>"Fadi",
    		"last_name"=>"Neirat",
    		"email"=>$email
		);

    	#return view("Pages/about")->withFirstname($firstname)->withEmail($email);
    	return view("Pages/about")->withData($data);
    }

    public function getContact(){
    	return view("Pages/contact");
    }


}
