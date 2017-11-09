<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    //
    protected $table = "pages";   //this statement to determine from which table this model connect
	protected $primaryKey = "p_id";
	
	
	public function getSliderPages($c_id = ""){
		$result = Pages::where(array(
			"p_active"=>1,
			"p_deleted"=>0
		
		))		
		->select(array('pages.p_id','p_title','p_thumb','p_subtitle','p_url','p_summary'))		
		->join('pages_categories', 'pages.p_id', '=', 'pages_categories.p_id')
		->limit(10)
		->get();

		return $result;
	}

	
}
