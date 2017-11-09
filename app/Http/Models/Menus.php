<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    //
    protected $table = "menus";   //this statement to determine from which table this model connect
	
	public static function getMenus($m_location = 0,$m_parent=0){
		$result = Menus::where(array(
			"m_deleted"=>0,
			"m_lang"=> \Session::get("locale_id",1),
			"m_location" => $m_location,
			"m_parent"=>$m_parent
		))				
		->select(array("m_id","m_name","m_link","m_location","m_parent"))
		->orderBy("m_priority","asc")
		->get();

		return $result;
	}

	public static function getAllMenus(){
		$result = Menus::where(array(
			"m_deleted"=>0,
			"m_lang"=> \Session::get("locale_id",1)
		))				
		->select(array("m_id","m_name","m_link","m_location","m_parent"))
		->orderBy("m_location","asc")
		->orderBy("m_priority","asc")
		->get();

		return $result;
	}
}
