<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class General extends Model
{
    //
    //protected $table = "categories";   //this statement to determine from which table this model connect
	protected $primaryKey = "p_id";

	public static function getGlobalSettings(){
		$result = DB::table("settings")->get();
		return $result;
	}

	
	public static function getTemplate($id){
		
		$result = DB::table("html_templates")->where(array(
			"ht_id"=>$id
		));

		if(count($result) > 0){
			//To return the row object only
			return $result->first();
		}
		else return false;				
	}

	public static function getFile($f_id){
		$result = DB::table("files")->where(array(
			"f_id"=>$f_id,
			"f_deleted"=>0
		));		
		if(count($result) > 0){
			//To return the row object only
			return $result->first();
		}
		else return false;	
	}

	public static function getPhotos($c_id){
		$result = DB::table("files")->where(array(
			"f_catid"=>$c_id,
			"f_deleted"=>0
		))
		->orderBy("f_date","desc")->orderBy("f_priority","asc")->orderBy("f_id","desc")
		->get();

		return $result;
	}
	public static function getFiles($c_id,$count =20){
		$result = DB::table("files")->where(array(
			"f_catid"=>$c_id,
			"f_deleted"=>0
		))
		->orderBy("f_date","desc")->orderBy("f_priority","asc")->orderBy("f_id","desc")
		->paginate($count);

		return $result;
	}

	public static function getVideos($c_id,$count =20){
		$result = DB::table("files")->where(array(
			"f_catid"=>$c_id,
			"f_deleted"=>0
		))
		->orderBy("f_date","desc")->orderBy("f_priority","asc")->orderBy("f_id","desc")
		->paginate($count);

		return $result;
	}

	public static function checkFormExist($where){		
		try {
		    $result = DB::table("projects")->where($where)
		    ->get();
		    if(count($result)>0) return true;
		    else return false;
		} catch (\Exception $e) {
		    return false;
		}
	}

	public static function insertform($data){		
		try {
		    $result = DB::table("projects")->insert($data);
		    return true;
		} catch (\Exception $e) {
		    return false;
		}
	}

	public static function insertUser($data){		
		try {
		    $result = DB::table("acc_users")->insert($data);
		    return true;
		} catch (\Exception $e) {
			echo $e->getMessage();
		    return false;
		}
	}

	public static function findUser($where){		
		try {
		    $result = DB::table("acc_users")
		    ->where($where)
		    ->first();
		    if($result === null) return false;
		    else return $result;
		} catch (\Exception $e) {
		    return false;
		}
	}


	public static function getfields(){
		$result = DB::table("project_fields")
		->orderBy("f_name","asc")
		->get();

		return $result;
	}


	public static function getcities(){
		$result = DB::table("cities")
		->orderBy("city_name","asc")
		->get();

		return $result;
	}


}
