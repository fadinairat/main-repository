<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Models\Pages;
use App\Http\Models\Menus;
use App\Http\Models\General;
use App\Http\Models\Categories;
use App\Http\Models\Files;

use Session;
use URL;

class HomeController extends Controller{
	public function Index(){		
		//echo Config('constants.langs.en');   //Example how to user constant value overall the project		
		//\App::setLocale('ar');
		//\App::setPrefix('ar_');

		//echo \Config::get('app.prefix');
		//echo \Config::get('app.prefix.'.\Config::get("app.locale"));
		//echo \Config::get("app.locale"));
		
		//echo \Config::get("app.locale");
		//echo Session::get("locale");

		$slider = Pages::getHomePages(3,15);
		$services = Pages::getHomePages(9,15);
		$projects = Pages::getHomePages(6,2);
		$experts = Pages::getHomePages(7,16);	
			
		//$galleries = Categories::getGalleries();	
		$partners = Pages::getHomePages(19,16);
		$video = Files::getHomeVideo();

		if(Session::get("locale")=="ar"){
			$adv = Pages::getPage(68);	
		}
		else $adv = Pages::getPage(69);
		
		//$data["services_cat"] = Categories::find(9)
		//print_r($partners);
	

		$data = array();

		$data["title"] = trans("messages.title");
		$data["services_det"] = Categories::find(9);	
		$data["projects_cat"] = Categories::find(6);	
		$data["partners_cat"] = Categories::find(19);	
		

		$data["services"] = $services;
		$data["slider"] = $slider;
		$data["experts"] = $experts;
		$data["projects"] = $projects;
		$data["adv"] = $adv;
		$data["video"] = $video;
		//$data["galleries"] = $galleries;
		$data["partners"] = $partners;
		
		
		return view("home")->withData($data);
	}
	
}

?>