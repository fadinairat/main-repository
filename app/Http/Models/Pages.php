<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Pages extends Model
{
    //
    //protected $table = "categories";   //this statement to determine from which table this model connect
	protected $primaryKey = "p_id";

	public static function getHomePages($c_id,$count=20,$lang=1,$order=0){
		$lang = \Config::get('app.locales_ids.'.\Config::get('app.locale'));
		//echo 'app.locales_ids.'.\Config::get('app.locale')."<Br>";
		
		$result = Pages::where(array(
			"p_active"=>1,
			"p_deleted"=>0,
			"c_id"=>$c_id,
			"p_lang"=> \Session::get("locale_id","1")
		))
		->select(array('pages.p_id','p_title','p_summary','p_thumb','p_subtitle','p_url'))		
		->join('pages_categories', 'pages.p_id', '=', 'pages_categories.p_id')
		->limit($count)
		->get();
		return $result;
	}

	public static function findArticles($searchkey,$count=20){
		$result = DB::table("pages")->where(array(
			"p_active"=>1,
			"p_deleted"=>0,	
			"p_lang"=> \Session::get("locale_id","1")	
		))
		->where('p_title' ,'like', '%'.$searchkey.'%')
		->select(array('pages.p_id','p_title','p_summary','p_thumb','p_subtitle','p_url'))
		->paginate($count);

		return $result;
	}



	public static function getPages($c_id,$count=20,$lang=1){
		//DB::table("pages")->paginate(1);
		$result = Pages::where(array(
			"p_active"=>1,
			"p_deleted"=>0,
			"c_id"=>$c_id,
			"p_lang"=> \Session::get("locale_id","1")
		))
		->select(array('pages.p_id','p_title','p_summary','p_thumb','p_subtitle','p_url'))		
		->join('pages_categories', 'pages.p_id', '=', 'pages_categories.p_id')		
		->paginate($count);

		return $result;
	}

	public static function getPage($id){
		$result = Pages::where(array(
			"p_active"=>1,
			"p_deleted"=>0,
			"pages.p_id" => $id						
		))	
		->join('pages_categories', 'pages.p_id', '=', 'pages_categories.p_id')			
		->get();
		
		return $result;
	}

	public static function getPageByTitle($title){
		$result = Pages::where(array(
			"p_active"=>1,
			"p_deleted"=>0			
		))			
		->where('pages.p_title', 'like', $title)
		->join('pages_categories', 'pages.p_id', '=', 'pages_categories.p_id')			
		->get();		
		return $result;
	}

	public static function getPageCategories($p_id){
		$result = DB::table("categories")->where(array(
			"c_deleted"=>0,			
			"p_id" => $p_id
		))
		->join('pages_categories','categories.c_id', '=' ,'pages_categories.c_id')
		->get();

		return $result;
	}


}
