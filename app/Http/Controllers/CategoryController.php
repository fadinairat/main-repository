<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Models\Categories;
use App\Http\Models\General;
use App\Http\Models\Pages;
use App\Http\Models\Files;

use Session;
use URL;

class CategoryController extends Controller
{  
    
    public function Index($c_id=-1,$title=""){        
        $data = array();
    	if($c_id <> -1){
    		$c_id = regenid($c_id);
    		$map = "";

            $data["lang_pref"] = "ar_";

    		$cat_details = Categories::find($c_id);
    		if(count($cat_details)>0){
                //$cat_arr = get_object_vars($cat_details);
                $data["head_title"] = $cat_details->c_name;
                $data["title"] = $cat_details['c_'.\Session('prefix').'name'];

                if($cat_details->c_thumb !=""){
                    $data["og_image"] = URL::asset('public')."/".$cat_details->c_thumb;      
                    $data["og_ext"] = get_extension($cat_details->c_thumb);
                } 
                $data["meta_description"] = Config('constants.meta_description');
                $data["meta_keywords"] = Config('constants.meta_keywords');
    			
                $list = array();
                //echo $pages->lastPage();
                //$pages->url(URL::asset('')."/Category");   

                $template_file = "categories.index";
                if($cat_details['c_'.\Session('prefix').'template'] !="0"){                                       
                    $template = General::getTemplate($cat_details['c_'.\Session('prefix').'template']);                    
                    if($template){
                        $template_file = $template->ht_file;
                    }
                }
                else if($cat_details->c_type=="1"){
                    $template_file = "categories.index";
                }
                else if($cat_details->c_type=="2") $template_file = "categories.files";
                else if($cat_details->c_type=="3") $template_file = "categories.blog";
                else if($cat_details->c_type=="4") $template_file = "categories.photo_gallery";
                else if($cat_details->c_type=="5") $template_file = "categories.video_gallery";
                else if($cat_details->c_type=="6") $template_file = "categories.audio_gallery";


                if($cat_details->c_type == "1"){
                    $list = Pages::getPages($c_id,20);
                }
                else if($cat_details->c_type == "2"){//File Category
                    $list = General::getFiles($c_id,20);                    
                }
                else if($cat_details->c_type == "3"){//Blog Category
                    
                }
                else if($cat_details->c_type == "4"){//Gallery Category
                    $list = General::getPhotos($c_id);
                    $map .=" <a href='".URL::asset('Photo-Gallery')."' class='stext'>".trans("messages.photo_gallery")." &raquo;</a>";
                }
                else if($cat_details->c_type == "5"){//Video Gallery
                    $list = General::getVideos($c_id,20);                    
                }
                else if($cat_details->c_type == "6"){//Audio Gallery                    

                }     
                //Render the data to view
    			return view($template_file)->withData($data)->withCategory($cat_details)->withMap($map)->withList($list);
            }
    		else return view("articles.notfound");    		
    	}
    	else{    		
    		return view("articles.notfound");
    	}    	
    }

    public function Video($v_id=-1,$title = ""){
        if($v_id !=-1){
            $v_id = regenid($v_id);
            $map = "";
            $data = array();
            $video = Files::Find($v_id);
            if(count($video)>0){ 
                $video_arr = get_object_vars($video)    ;                     
                $category = Categories::find($video->f_catid);
                if($category){ 
                    //$category11 = (array) $category;
                    //URL::asset('Category/'.genId($category['c_id']).'/'.friendly_encode($category['c_'.\Session::get('prefix').'name']))
                    $map .="<a href='".genLink("Category",$category->c_id,$category["c_".Session::get("prefix")."name"])."' class='stext' >".$category['c_'.\Session::get('prefix').'name']." &raquo;</a>";
                }

                $data["head_title"] = $video['f_'.Session::get("prefix").'title'];
                $data["title"] = $video['f_'.Session::get("prefix").'title'];
                if($video->f_thumb !=""){
                    $data["og_image"] = URL::asset('public')."/".$video->f_thumb;      
                    $data["og_ext"] = get_extension($video->f_thumb);
                } 
                $data["meta_description"] = Config('constants.meta_description');
                $data["meta_keywords"] = Config('constants.meta_keywords');   

                return view("categories.video")->withVideo($video)->withMap($map)->withData($data);
            }
            else{
                return view("articles.notfound");
            }
        }
        else{
            return view("articles.notfound");
        }
    }

    public function Photo_Gallery(){
        $data = array();
        $list = array();
        
        $data["head_title"] = trans("messages.photo_gallery");
        $data["title"] = trans("messages.photo_gallery");
        $data["meta_description"] = Config('constants.meta_description');
        $data["meta_keywords"] = Config('constants.meta_keywords');   
        $data["map"] = "";     
        $map = "";

        $list = Categories::getGalleries(20);
        if(count($list)>0){
            $data["head_title"] = trans("messages.photo_gallery");                
            $data["title"] = trans("messages.photo_gallery");
            $data["map"] = $map;
        }
        else{
            $data["message"] = trans("messages.no_albums");
            $data["alert_type"] = "alert-danger";            
        }
        return view("categories.galleries")->withData($data)->withList($list);
    }

}
