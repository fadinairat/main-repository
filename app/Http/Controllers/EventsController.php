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

class EventsController extends Controller
{
    //
    public function Index(){
    	$head_data = array();
    	$head_data["head_title"] = "Calendar of Events";
    	$head_data["meta_description"] = "";
    	$head_data["meta_keywords"] = "";

    	$head_data["title"] = trans("messages.calendar_event");

    	return view("categories.events")->withData($head_data);
    }
}