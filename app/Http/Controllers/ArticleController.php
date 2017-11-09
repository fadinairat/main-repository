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

class ArticleController extends Controller
{
    //
    public function Index($page = -1,$title = ""){
        $head_data = array();
    	if($page !=-1){
            $p_id = regenid($page);                      
            $map = "";
    		$details = Pages::getPage($p_id);
            //$parent = $details[0]['p_parent'];

            if(count($details)>0){                 
                $head_data["title"] = $details[0]['p_title'];
                if($details[0]['p_thumb'] !=""){
                    $head_data["og_image"] = URL::asset('').processPath($details[0]['p_thumb']);      
                    $head_data["og_ext"] = get_extension($details[0]['p_thumb']);
                } 

                $head_data["meta_description"] = $details[0]['p_metadescription'];
                $head_data["meta_keywords"] = $details[0]['p_metakeywords'];

                $categories = Pages::getPageCategories($p_id);
                $i=0;
                $inside = false;
                foreach($categories as $cat){ 
                    $cat = get_object_vars($cat);                   
                    if($cat['c_id'] <> '1'){
                        $inside = true;
                        if($i!=0) $map .=" | ";
                        $map .=" <a href='".genLink("Category",$cat['c_id'],$cat['c_'.Session::get("prefix").'name'])."' class='stext' >".$cat['c_'.Session::get("prefix").'name']."</a>";
                        $i++;
                    }                    
                }
                if($inside) $map .=" <span class='stext' >&raquo;</span>";

                if($details[0]['p_parent'] <> "0"){
                    $parent = Pages::find($details[0]['p_parent']);                    
                    if(count($parent)>0){                                            
                        $map .=" <a href='".genLink("Article",$parent->p_id,$parent->p_title)."' class='stext' >".$parent->p_title."</a> &raquo;";
                    }    
                }        
                //Get the page template
                $template_file = "articles.index";
                if($details[0]["p_template"] !="0"){                   
                    $template = General::getTemplate($details[0]["p_template"]);                    
                    if($template){
                        $template_file = $template->ht_file;
                    }
                }                
                return view($template_file)->withHead_data($head_data)->withPage($details[0])->withMap($map);
            }
            else return view("articles.notfound");
    		
    	}
    	else{
    		
    	}    	
    }


}
