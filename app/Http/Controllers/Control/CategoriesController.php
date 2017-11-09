<?php
namespace App\Http\Controllers\Control;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Models\Pages;
use App\Http\Models\Menus;
use App\Http\Models\General;
use App\Http\Models\Categories;

class CategoriesController extends Controller{

	public function Index(){
		return view("Control.Categories.Index");
	}

}