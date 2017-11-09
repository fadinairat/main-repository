<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Files extends Model
{
    //
    //protected $table = "categories";   //this statement to determine from which table this model connect
	protected $primaryKey = "f_id";

	public static function getHomeVideo(){
		$result = Files::where(array(
			"f_deleted"=>0,			
			"f_showhome" => 1
		))					
		->where("f_lang",'=',0)
		->orWhere("f_lang","=", \Session::get("locale_id",1))			
		->orderBy("f_id","desc")
		->limit(1)
		->get();
		return $result;
	}
}