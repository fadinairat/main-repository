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

class SearchController extends Controller
{
    //
    public function Index(){
        $data = array();
        $map =" ".trans("messages.search_result")." &raquo;";
        $data["head_title"] = trans('messages.search_result');
        $data["meta_description"] = "";
        $data["meta_keywords"] = "";

    	if(isset($_REQUEST['searchkey']) && $_REQUEST['searchkey']!=""){
    		$searchkey = $_REQUEST['searchkey'];
    		if(strlen($searchkey)>=3){//Start searching
    			$result = Pages::findArticles($searchkey,20);
    			if($result){
    				if(count($result)>0){
    					return view("search.index")->withList($result)->withData($data)->withMap($map);
    				}
    				else{//No result found
    					$data["message"] = trans('messages.no_result');
    					$data['alert_type'] = "alert-danger";	
    					return view("search.index")->withData($data)->withMap($map);
    				}
    				
    			}
    			else{
					$data["message"] = trans('messages.no_result');
    				$data['alert_type'] = "alert-danger";
    				return view("search.index")->withData($data)->withMap($map);
    			}

    		}	
    		else{//Searchkey less than allowed
    			$data["message"] = trans('messages.set_searchkey_msg');
    			$data["alert_type"] = "alert-danger";	
    			return view("search.index")->withData($data)->withMap($map);
    		}
    	}
    	else{
    		$data["message"] = trans('messages.set_searchkey_msg');
    		$data["alert_type"] = "alert-danger";
    		return view("search.index")->withData($data)->withMap($map);
    	}
    }


}
