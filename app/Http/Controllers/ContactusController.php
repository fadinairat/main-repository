<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Models\Pages;

class ContactusController extends Controller
{
    //
    public function Index(){    	
    	$page = Pages::getPage(trans("messages.contact_us_id"));
    	$head_data = array();
        $data = array();
    	$map = "";
    	if(count($page)>0){    		
    		$head_data["title"] = $page[0]['p_title'];
            if($page[0]['p_thumb'] !=""){
                $head_data["og_image"] = URL::asset('').processPath($page[0]['p_thumb']);      
                $head_data["og_ext"] = get_extension($page[0]['p_thumb']);
            } 

            $head_data["meta_description"] = $page[0]['p_metadescription'];
            $head_data["meta_keywords"] = $page[0]['p_metakeywords'];
    	} 

        if(isset($_REQUEST['name'])){
            $name = $_REQUEST['name'];
            $subject = $_REQUEST['subject'];
            $email = $_REQUEST['email'];
            $body = $_REQUEST['body'];
            if($name !="" && $subject !="" && $email !="" && $body !=""){
                $msgbody  ="<div style='text-align:left' >";
                $msgbody .="Dear Administrator,<br><br><b>".$name."</b> sent you a message from Agbusiness contact us form with the following details:<br><br><b>name:</b> ".$name."<Br>";
                $msgbody .="<b>Email Address</b>: ".$email."<br>";
                $msgbody .="<b>Subject</b>: ".$subject."<br>";
                $msgbody .="<b>Message Content</b>:<br> ".$body."<br><br>";                
                $msgbody .="<div style='float:right;text-align:right;' >Best Regards</div>";
                $msgbody .="</div>";       

                send_smtp("noreply@agbusinesshub.ps","Agrbusiness Accelarator","info@agbusinesshub.ps","Agbusinesshub","Contact Us Form",$msgbody,"");
                $data["message"] = trans("messages.message_sent_msg");
                $data["alert_type"] = "alert-success";
            }
            else{
                $data["message"] = trans("messages.fields_empty_msg");
                $data["alert_type"] = "alert-danger";
            }
        }  	       		    	
    	return view("Contactus.Index")->withPage($page)->withHead_data($head_data)->withData($data); 	
    }
}
