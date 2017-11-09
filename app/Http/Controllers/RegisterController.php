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


class RegisterController extends Controller
{
    //
    public function Index(){
        $fields=General::getfields();
        $cities=General::getcities();        
    	return view("register.index")->withFields($fields)->withCities($cities);
    }

    public function Insert(){       
        $form_data = array();
        $cities=General::getcities();
        if(isset($_REQUEST['username']) && $_REQUEST['username']!=""){
            $data = array(            
                "username"=> $_REQUEST['username'],
                "password"=> $_REQUEST['password'],
                "city"=> $_REQUEST['city'],
                "gender"=> $_REQUEST['gender'],
                "name"=> $_REQUEST['name'],
                "mobile"=> $_REQUEST['mobile'],
                "created" => date("Y-m-d H:i:s")            
            );

            $exist = General::findUser(array("username"=> $_REQUEST['username']));
            if(!$exist){                
                $result=General::insertUser($data);
                if($result){
                    $form_data["message"] = trans("messages.register_success_msg");
                    $form_data["alert_type"] = "alert-success";
                    return view("register.index")->withData($form_data)->withCities($cities);
                }
                else{
                    $form_data["username"] = $_REQUEST['username'];
                    $form_data["city"] = $_REQUEST['city'];
                    $form_data["userngenderame"] = $_REQUEST['gender'];
                    $form_data["name"] = $_REQUEST['name'];
                    $form_data["mobile"] = $_REQUEST['mobile'];
                
                    $form_data["message"] = trans("messages.cannot_register_msg");
                    $form_data["alert_type"] = "alert-danger";
                    return view("register.index")->withData($form_data)->withCities($cities);
                }
            }
            else{
                $form_data["username"] = $_REQUEST['username'];
                $form_data["city"] = $_REQUEST['city'];
                $form_data["userngenderame"] = $_REQUEST['gender'];
                $form_data["name"] = $_REQUEST['name'];
                $form_data["mobile"] = $_REQUEST['mobile'];
                
                $form_data["message"] = trans("messages.already_registered");
                $form_data["alert_type"] = "alert-danger";
                return view("register.index")->withData($form_data)->withCities($cities);
            }            
        }
        else{
            $form_data["message"] = trans("messages.empty_fields_msg");
            $form_data["alert_type"] = "alert-danger";
            return view("register.index")->withData($form_data)->withCities($cities);
        }
        
    }
}
