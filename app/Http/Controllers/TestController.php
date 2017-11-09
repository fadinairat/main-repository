<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use URL;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Models\Pages;
use App\Http\Models\General;
use App\Http\Models\Categories;
use Mail;
use Session;

class TestController extends Controller
{
    //
    public function Index(){
    	//$user = User::findOrFail($id);
    	/*$user = "Fadi";

        Mail::send('Test.Index', ['user' => 'Fadi'], function ($m) use ($user) {
            $m->from('fadi@intertech.ps', 'Accelarator');
            $m->to("fadi@intertech.ps", "Fadi Neirat")->subject('Your Reminder!');
        });*/

        Mail::raw('Text to e-mail', function ($message) {
		    //
		     //$message->from('fadi@intertech.ps', 'Laravel');

    		$message->to('fadi_eng_2010@hotmail.com');
		});
    }	
}