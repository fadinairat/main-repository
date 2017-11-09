<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Categories extends Model
{
    //
    //protected $table = "categories";   //this statement to determine from which table this model connect
	protected $primaryKey = "c_id";

	public static function getGalleries($count =20){
		$result = DB::table("categories")->where(array(
			"c_deleted"=>0,
			"c_active"=>1,
			"c_type"=>4			
		),"(c_lang='".\Session::get("locale_id",1)."' or c_lang='0')")		
		->paginate($count);

//->where("(categories.c_lang = '".\Session("locale_id")."' or categories.c_lang = '0')")		
		return $result;
	}
}
