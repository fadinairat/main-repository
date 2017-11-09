<?php
namespace App\Http\Controllers;

use Mail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Models\General;
use App\Http\Controllers\Input;
use PHPMailerAutoload;
use PHPMailer;  


class LoginController extends Controller
{
    //
    public function Index(){ 
    	//\Session::flush();
    	if(\Session::has("u_username")){    		
    		return redirect('ar/Form');   
    	}

    	if(isset($_REQUEST['username']) && $_REQUEST['username']!=""){
    		$username = $_REQUEST['username'];
    		$password = $_REQUEST['password'];
    		$client = General::findUser(array("username"=> $username,"password"=>$password));
    		if(!$client){//user not exists
                $data = array();
                $data["message"] = trans('messages.wrong_authentication');
                $data["alert_type"] = "alert-danger";
                return view("login.index")->withData($data);
    		}
    		else{//username and password correct
    			if(\Session::has("prefix")){
					$lang_prefix = \Session::get("prefix");
	    			$locale = \Session::get("locale");
	    			$locale_id = \Session::get("locale_id");
    			}
    			else{
    				$lang_prefix = "ar_";
    				$locale = "ar";
    				$locale_id = "1";
    			}
    			
    			\Session::flush();    			
    			\Session::set("prefix",$lang_prefix);
    			\Session::set("locale",$locale);
    			\Session::set("locale_id",$locale_id);    			

    			\Session::set("u_username",$username);    			
    			\Session::set("u_name",$client->name);
    			\Session::set("u_id",$client->id);
    			\Session::set("u_gender",$client->gender);
    			\Session::set("u_mobile",$client->mobile);
    			\Session::set("u_lastlogin",$client->last_login);
    			\Session::set("u_created",$client->created);    			
    			return redirect('ar/Form');     			
    			//return view("login.index")->withMessage("User Found")->withAlert_type("alert-success");
    		}
    	}          
    	else return view("login.index");
    }

    public function Logout(){
    	$lang_prefix = \Session::get("prefix");
		$locale = \Session::get("locale");
		$locale_id = \Session::get("locale_id");
		\Session::flush();
		
		\Session::set("prefix",$lang_prefix);
		\Session::set("locale",$locale);
		\Session::set("locale_id",$locale_id);
		return redirect('ar');  
    }

}