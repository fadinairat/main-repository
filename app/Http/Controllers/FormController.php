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


class FormController extends Controller
{
    //
    public function __construct()
    {
        
    }

    public function Index(){ 
        if(!\Session::has("u_username")) return redirect('ar/Login'); //Redirect to login page if user not logged in

        $fields=General::getfields();
        $cities=General::getcities();             
    	return view("form.index")->withFields($fields)->withCities($cities);
    }

    public function Insert(){
        if(!\Session::has("u_username")) return redirect('ar/Login'); //Redirect to login page if user not logged in
        
        $fields=General::getfields();
        $cities=General::getcities();

        $data = array(
            "p_field"=> $_REQUEST['field'],
            "u_id" => \Session::get("u_id"),    
            "p_name"=> $_REQUEST['name'],
            "p_summary"=> $_REQUEST['summary'],
            "p_successes"=> $_REQUEST['successes'],
            "p_applicant"=> $_REQUEST['applicant'],
            "p_team_name"=> $_REQUEST['team_name'],
            "p_emp_status"=> $_REQUEST['emp_status'],
            "p_gender" => $_REQUEST['gender'],
            "p_city"=> $_REQUEST['city'],
            "p_age"=> $_REQUEST['age'],
            "p_email"=> $_REQUEST['email'],
            "p_mobile"=> $_REQUEST['mobile'],
            "p_lang"=> $_REQUEST['lang']
        );
        $exist = General::checkFormExist(array("p_name"=>$_REQUEST['name'],"p_field"=>$_REQUEST['field'],"p_summary"=>$_REQUEST['summary']));
        if($exist){
            //return view("form.index")->withFields($fields)->withCities($cities)->withMessage("0");
            return redirect(\Session::get("locale")."/Form")->with('msg',trans('messages.form_exist_msg'))->with('alert_type' ,'alert-success');
        }
        else{
            $result=General::insertform($data);   
            if($result){                
                $msgbody="<b>Dear Administrator</b><p>";
                $msgbody=$msgbody."<b>".$_REQUEST['name']."</b> sent you a message through Project Form.<br>";
                $msgbody=$msgbody."<b>Project Field :</b>" . $_REQUEST['field'] ."<br>";
                $msgbody=$msgbody."<b>Name :</b>" . $_REQUEST['name'] ."<br>";
                $msgbody=$msgbody."<b>Project Summary :</b>" . $_REQUEST['summary'] ."<br>";
                $msgbody=$msgbody."<b>What have been achieved from the project until now, any successes or development been done in the project :</b>" . $_REQUEST['successes']."<br>";
                $msgbody=$msgbody."<b>Team work </b><br>";
                $msgbody=$msgbody."<b>The applicant :</b>" . $_REQUEST['applicant'] ."<br>";
                $msgbody=$msgbody."<b>The applicant name :</b>" . $_REQUEST['team_name'] ."<br>";
                $msgbody=$msgbody."<b>Employment status :</b>" . $_REQUEST['emp_status'] ."<br>";
                $msgbody=$msgbody."<b>City :</b>" . $_REQUEST['city'] ."<br>";
                $msgbody=$msgbody."<b>Age :</b>" . $_REQUEST['age'] ."<br>";
                $msgbody=$msgbody."<b>Email :</b>" . $_REQUEST['email'] ."<br>";
                $msgbody=$msgbody."<b>Mobile :</b>" . $_REQUEST['mobile'] ."<br>";            
                $msgbody=$msgbody."<br><br><b>Thanks, </b>";

                send_smtp("noreply@agbusinesshub.ps","Agrbusiness Accelarator","info@agbusinesshub.ps,fadi.nairat.2010@gmail.com","Agbusinesshub","New Project Application",$msgbody,"");                
                
                return redirect(\Session::get("locale")."/Form")->with('msg',trans('messages.form_msg'))->with('alert_type' ,'alert-success');
                //$msgbody="<b>Dear Administrator</b><p>";
                //$msgbody=$msgbody."<b>".$_REQUEST['email']."</b> add new project called ".$_REQUEST['name']."<br>";
                //$msgbody=$msgbody."<b>Thanks, </b>";
               
                /*echo "TEsT";
                Mail::send('form.mails', ['title' => 'Add New Project', 'message'=> $msgbody], function ($message)
                {
                    $message->from('fadi@intertech.ps', 'Fadi Neirat')->to('fadi.nairat.2010@gmail.com');
                });
                echo 'TEST2';
                */
                

            }
            else {
                return view("form.index")->withFields($fields)->withCities($cities);
            }
        }
        
        

    }

    


	
}
