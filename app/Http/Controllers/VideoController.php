<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Models\Categories;
use App\Http\Models\General;
use App\Http\Models\Pages;
use URL;

class VideoController extends Controller
{  
    
    public function Index($v_id=-1,$title=""){
        $head_data = array();
        $data = array();
    	if($v_id <> -1){
    		$v_id = regenid($v_id);
    		$map = "";

            $data["lang_pref"] = "ar_";

    		$video_details = Files::find($v_id);
            print_r($video_details);
    		if(count($video_details)>0){
               
            }
    		else return view("articles.notfound");    		
    	}
    	else{    		
    		return view("articles.notfound");
    	}    	
    }
}
