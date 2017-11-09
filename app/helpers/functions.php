<?php
//include_once("clients.intertech.ps/accelarator/public/phpmailer/class.phpmailer.php");

function genLink($page,$id,$title){
	$link = URL::asset(Request::segment(1).'/'.$page.'/'.genId($id)."/".friendly_encode($title));
	return $link;
}


function processPath($path){
	$path = str_replace("/accelarator/","",$path);
	$path = str_replace("public/","",$path);
	$path = "public/".$path;
	return $path;
}

function processLink($path){
	$path = str_replace("/accelarator/","",$path);
	return $path;
}


function filterBody($body){
	$folder_name = Config('constants.web_folder');
	$web_path = URL::asset('');
	//echo $folder_name;
	if($folder_name !="") $body=str_replace("/$folder_name/","",$body);	
	$body = str_replace("/public/images/", "public/images/", $body);
	$body=str_replace("public/images/",$web_path."public/images/",$body);
	
	$body=str_replace("/public/files","public/files",$body);	
	$body=str_replace("public/files/server",$web_path."public/files/server/",$body);
	$body=str_replace("public/files/image/",$web_path."public/files/image/",$body);

	$body = str_replace("&lsquo;"  ,"'",  $body);
	$body = str_replace("&#34;" , "\"",  $body);	
	return $body;
}




function myUrlEncode($string) {
    $entities = array('%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
    $replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
    return str_replace($replacements,$entities, $string);
}
function friendly_encode($title){	
	//$title = str_replace("...","-",$title);
	//$title = str_replace("..","-",$title);
	$title = str_replace(".","",$title);
	$title = str_replace(" ","-",$title);
	$title = str_replace("\"","",$title);
	$title = str_replace("%","",$title);
	$title = str_replace(":","",$title);
	$title = str_replace("|","",$title);
	$title = str_replace("!","",$title);
	$title = str_replace("~","",$title);
	$title = str_replace("?","",$title);
	$title = preg_replace("/[\/\&%#\$]/", "", $title);
	return $title;
}
function friendly_decode($title){
	$title = str_replace("-"," ",$title);
	$title = urldecode($title);
	return $title;
}
			
function check_session_end(){
	// To Make Session Die After a period of time 
	define('SESSION_TIMEOUT', 900); //15 Mins
	if(isset($_SESSION['time'])) $idletime = time() - $_SESSION['time'];
	else $idletime = time();
	if($idletime > SESSION_TIMEOUT)
	{
		//Reset session
		@session_destroy();
		@session_start();
	}
	$_SESSION['time'] = time();  
	// End
}

function month_name($month){
	switch ($month){
		case "1":
			 $month = "January";
			 break;
		case "2":
			 $month = "February";
			 break;
		case "3":
			 $month = "March";
			 break;
		case "4":
			 $month = "April";
			 break;
		case "5":
			 $month = "May";
			 break;
		case "6":
			 $month = "June";
			 break;
		case "7":
			 $month = "July";
			 break;
		case "8":
			 $month = "August";
			 break;
		case "9":
			 $month = "September";
			 break;
		case "10":
			 $month = "October";
			 break;
		case "11":
			 $month = "November";
			 break;
		case "12":
			 $month = "December";
			 break;
	}//switch
	return $month;
}
function day_name($day){
switch ($day){
    case "Sunday":
         $day = "الأحد";
         break;
    case "Monday":
         $day = "الإثنين";
         break;
    case "Tuesday":
         $day = "الثلاثاء";
         break;
    case "Wednesday":
         $day = "الأربعاء";
         break;
    case "Thursday":
         $day = "الخميس";
         break;
    case "Friday":
         $day = "الجمعة";
         break;
    case "Saturday":
         $day = "السبت";
         break;
}//switch
return ($day);
}
function fdate($date){
$d=array();
$d = explode('-' , $date);
$day=$d[2];
$month=$d[1];
$year=$d[0];
switch ($month){
    case "1":
         $month = "January";
         break;
    case "2":
         $month = "February";
         break;
    case "3":
         $month = "March";
         break;
    case "4":
         $month = "April";
         break;
    case "5":
         $month = "May";
         break;
    case "6":
         $month = "June";
         break;
    case "7":
         $month = "July";
         break;

    case "8":
         $month = "August";
         break;
    case "9":
         $month = "September";
         break;
    case "10":
         $month = "October";
         break;
    case "11":
         $month = "November";
         break;
    case "12":
         $month = "December";
         break;
}//switch
$date=$day ." " . $month . " " . $year;
return ($date);
}

function adate($date){
$d=array();
$d = explode('-' , $date);
$day=$d[2];
$month=$d[1];
$year=$d[0];
switch ($month){
    case "1":
         $month = "كانون الثاني";
         break;
    case "2":
         $month = "شباط";
         break;
    case "3":
         $month = "آذار";
         break;
    case "4":
         $month = "نيسان";
         break;
    case "5":
         $month = "أيار";
         break;
    case "6":
         $month = "حزيران";
         break;
    case "7":
         $month = "تموز";
         break;

    case "8":
         $month = "آب";
         break;
    case "9":
         $month = "أيلول";
         break;
    case "10":
         $month = "تشرين الأول";
         break;
    case "11":
         $month = "تشرين الثاني";
         break;
    case "12":
         $month = "كانون الأول";
         break;
}//switch
$date=$day ." " . $month . " " . $year;
return ($date);
}

function along_date($date){
	$temp = explode("-",$date);
	$day = $temp[2];
	$month = $temp[1];
	$year = $temp[0];
	
	return $day." ".amonth_name($month)." ".$year;
}

function long_date($date){
	$temp = explode("-",$date);
	$day = $temp[2];
	$month = $temp[1];
	$year = $temp[0];
	
	return $day."th ".month_name($month)." ".$year;
}

function amonth_name($month){
switch ($month){
    case "1":
         $month = "كانون الثاني";
         break;
    case "2":
         $month = "شباط";
         break;
    case "3":
         $month = "آذار";
         break;
    case "4":
         $month = "نيسان";
         break;
    case "5":
         $month = "أيار";
         break;
    case "6":
         $month = "حزيران";
         break;
    case "7":
         $month = "تموز";
         break;

    case "8":
         $month = "آب";
         break;
    case "9":
         $month = "أيلول";
         break;
    case "10":
         $month = "تشرين الأول";
         break;
    case "11":
         $month = "تشرين الثاني";
         break;
    case "12":
         $month = "كانون الأول";
         break;
}//switch
return ($month);
}


function getSubString($text,$length){
	$old_title=$text;
	$text = substr($text,0,$length);			
	for($i=$length;$i<strlen($old_title);$i++){
		if(substr($old_title,$i,1)==" ") break;
		$text .=substr($old_title,$i,1);
	}	
	if(strlen($text) < strlen($old_title)) $text .="...";
	return $text;
}

function filterTitle($title){
	$title = str_replace("&lsquo;"  ,"'",  $title);
	$title = str_replace("&#34;" , "\"",  $title);
	$title = preg_replace('[<.*?.>]','', $title);
	$title = preg_replace('[<]','', $title);
	$title = preg_replace('[>]','', $title);
	return $title;
}



function clear($val){
$val = strtolower($val);
$val = str_replace("sql"  ,"",  $val);
$val = str_replace("union"  ,"",  $val);
$val = str_replace("injection"  ,"",  $val);
$val = str_replace("select"  ,"",  $val);
$val = str_replace("update"  ,"",  $val);
$val = str_replace("insert"  ,"",  $val);
$val = str_replace("delete"  ,"",  $val);
$val = str_replace("from"  ,"",  $val);
$val = str_replace("+"  ,"",  $val);
$val = str_replace("("  ,"",  $val);
$val = str_replace(")"  ,"",  $val);
$val = str_replace(","  ,"",  $val);
$val = str_replace("&"  ,"",  $val);
$val = str_replace("'"  ,"",  $val);
$val = preg_replace('[>.*?.<]','', $val);
$val = preg_replace('[<.*?.>]','', $val);
$val = preg_replace('[<]','', $val);
$val = preg_replace('[>]','', $val);
$val = str_replace('xor','', $val);
$val = str_replace('or','', $val);
$val = str_replace('and','', $val);
return ($val);
}



function post($val){
$val = str_replace( "&lsquo;" , "'" , $val);
$val = str_replace("&#34;", "\"", $val);
return ($val);
}

function get_extension($filename){
	$temp = explode(".",$filename);
	$ext = $temp[count($temp)-1];
	return $ext;
}

function get_thumb($pic,$width){
	global $uploadfolder;
	$pic = str_replace("/".$uploadfolder."/","",$pic);
	$ext=array();
	$ext = explode('.' , $pic);
	$z=sizeof($ext) - 1;
	if($ext[$z]=="jpg" || $ext[$z]=="JPG"){
		  $t="includes/thumbjpg.php?w=".$width."&im=";
		  $p="../". $pic;
		  $file = $t . $p;
		  //$pic = "<img src='". $file ."' border=0 align='left' hspace=7><br>";
	}
	elseif($ext[$z]=="gif" || $ext[$z]=="GIF"){
		  $t="includes/thumbgif.php?w=".$width."&im=";
		  $p="../". $pic;
		  $file = $t . $p;
		  //$pic = "<img src='". $file ."' border=0 align='left' hspace=7><br>";
	}
	else{
		  $file = $pic;
	  //$pic = "<img src='../userfiles/". $pic ."' width='".$width."' border=0 align='left' hspace=7>";
	}      
	return $file;	   
}

function thumb($pic,$w){
$ext=array();
$ext = explode('.' , $pic);
$e=sizeof($ext) - 1;
$p="includes/thumb.php?ext=".$e."&w=".$w."&im=../". $pic;
return ($p);
}
function genid_old($id){
$id= genRandomString_old().genRandomString_old()."a". ($id * 951) . "A".genRandomString_old(). genRandomString_old();
return($id);
}


function regenid_old($id){
$temp = substr($id,11);
$pos = strpos($temp,"A");
$sid = substr($temp,0,$pos);
//echo $temp;
$id = (int)$sid / 951;
return($id);
}


function genRandomString_old() {
    $length = 5;
    $characters = "0123456789abcdefghijklmnopqrstuvwxyzAQWERTYUIOPSDFGHJKLZXCVBNM";
    $string = "";    
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, 61)];
    }
    return $string;
}

function genid_new($id){
$newid = $id * 951;
$id= genRandomString_new($newid)."y". ($newid) . "Y".genRandomString_new($newid);
return($id);
}


function regenid_new($id){
	if(is_numeric($id)){
		return $id;
	}
	else {
		$res = explode("y",$id);
		if(count($res)>1){
			$res1 = explode("Y",$res[1]);
			$old_id = $res1[0];
			$id = (int)$old_id / 951;
			return($id);
		}
		else return 0;		
	}
}

function genRandomString_new($id) {
	$string = dechex($id);
    return $string;
}


/////////////////////////////////////////
function genid($id){
	return genid_new($id);
}
function regenid($id){
	$ret_id = 0;
	$ret_id = regenid_new($id);
	if($ret_id ==0){
		$ret_id = regenid_old($id);
	}
	return $ret_id;
	/*if(strlen($id) > 22)
	{
		return regenid_old($id);
	} 
	else
	{
		return regenid_new($id);
	}*/
	
}
//////////////////////////////////////////
/*
function genid($id){
$newid = $id * 951;
$id= genRandomString($newid)."y". ($newid) . "Y".genRandomString($newid);
return($id);
}


function regenid($id){
$res = explode("y",$id);
$res1 = explode("Y",$res[1]);
$old_id = $res1[0];
$id = (int)$old_id / 951;
return($id);
}

function genRandomString($id) {
	$string = dechex($id);
    return $string;
}


function genid($id){
$id= genRandomString().genRandomString()."a". ($id * 951) . "A".genRandomString(). genRandomString();
return($id);
}


function regenid($id){
$temp = substr($id,11);
$pos = strpos($temp,"A");
$sid = substr($temp,0,$pos);
//echo $temp;
$id = (int)$sid / 951;
return($id);
}


function genRandomString() {
    $length = 5;
    $characters = "0123456789abcdefghijklmnopqrstuvwxyzAQWERTYUIOPSDFGHJKLZXCVBNM";
    $string = "";    
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, 61)];
    }
    return $string;
}
*/
function add_log($user_id,$user_name,$action_type,$affected,$affected_id,$action,$notes,$title){
global $current_time;
global $sqlconnect;
$ip = $_SERVER['REMOTE_ADDR'];
$time = $current_time;
$notes = request($notes);
$action = request($action);
$action_type = request($action_type);
$title = request($title);

$result = mysqli_query($sqlconnect,"insert into logs (ip,datetime,user_name,user_id,action_type,affected,affected_id,action,notes,item_title) values('$ip','$time','$user_name','$user_id','$action_type','$affected','$affected_id','$action','$notes','$title')");
echo mysqli_error($sqlconnect);
}

function resize_embed($embed,$width,$height){

$pos1=strpos($embed,"width");
$old_width=substr($embed,$pos1,11);			
$embed=str_replace($old_width,"width33='".$width."'",$embed);
// Second Width
$pos2=strpos($embed,"width");
$old_width=substr($embed,$pos2,11);			
$embed=str_replace($old_width,"width='".$width."'",$embed);
$embed=str_replace("width33","width",$embed);


$pos1=strpos($embed,"height");
if($pos1!==false){
$old_height=substr($embed,$pos1,11);			
$embed=str_replace($old_height,"height33='".$height."'",$embed);
// Second Width
$pos2=strpos($embed,"height");
$old_height=substr($embed,$pos2,11);			
$embed=str_replace($old_height,"height='".$height."'",$embed);
$embed=str_replace("height33","height",$embed);}
return $embed;

}
function get_youtube_id($link){
	$parts = parse_url($link);
	parse_str($parts['query'], $query);
	$id = $query['v'];
	return $id;
}

function is_image($filename){
	$img_ext = array('png','gif','jpg','bmp');
	$temp = explode(".",$filename);
	$ext = strtolower($temp[count($temp)-1]);
	$check = in_array($ext, $img_ext);
	return $check;
}
function send_smtp($from_email,$from_name,$to_email,$to_name,$subject,$msg,$attachment){
	$mail = new PHPMailer();	

	$mail->IsSMTP();  // telling the class to use SMTP
	$mail->IsHTML(true);
	$mail->CharSet = "UTF-8";
	$mail->SMTPAuth   = true; // SMTP authentication
	$mail->Host       = "46.43.66.107"; // SMTP server
	$mail->Port       = 587; // SMTP Port
	// $mail->SMTPSecure = 'tls';
	$mail->Username   = "noreply@agbusinesshub.ps"; // SMTP account username
	$mail->Password   = "noreply_@)!&";        // SMTP account password

	if($attachment !="") $mail->AddAttachment(""); //****HERE'S MY MAIN PROBLEM!!!
	$mail->SetFrom("noreplay@agbusinesshub.ps", $subject); // FROM
	//$mail->AddReplyTo('fadi@intertech.ps', 'Dom'); // Reply TO

	$mail->AddAddress($to_email, $to_name); // recipient email
	$mail->Subject    = $subject; // email subject
	$mail->Body       = $msg;

	$mail->SMTPDebug = 0;
	if(!$mail->Send()) {
		//echo 'Message was not sent.';
		//echo 'Mailer error: ' . $mail->ErrorInfo;
		return 0;
	} 
	else {
		//echo 'Message has been sent.';
		return 1;
	}
	return 0;
}


function send_smtp1($from_email,$from_name,$to_email,$to_name,$subject,$msg,$attachment){
	$mail = new PHPMailer();
	$recipiant = $to_email;
    $mail->From = $from_email;
	$mail->FromName  = $from_name;
	 $mail->AddAddress($recipiant, $to_name); // recipient email
	$mail->Subject  = $subject;
	$mail->Body  = $msg;
	$mail->AddAddress  = $to_email;
	$mail->CharSet = 'UTF-8';
	$mail->ContentType = 'text/html';
	$mail->AddAttachment($attachment);
	$mail->SMTPDebug = 2;
    if(!$mail->Send()) {
		//echo 'Message was not sent.';
		echo 'Mailer error: ' . $mail->ErrorInfo;
		return 0;
    } 
	else {
		echo 'Message has been sent.';
		return 1;
    }
	return 0;
}


function upload_file($file,$file_name,$type){
	$upload_folder = "../files/image/";
	$success = 1;
	$cdate = date("YdmHis");
	$file_size = filesize($file['tmp_name']);
	$whitelist = array('jpg', 'png', 'gif', 'jpeg'); 
	$blacklist = array('php', 'php3', 'php4', 'js', 'html', 'json', 'asp', 'aspx', 'phtml','exe'); 
	global $mime_types;
	global $whitelist_mimes;
	
	if($file_size < 2000000){
		$imagesizedata = getimagesize($file['tmp_name']);
		if($type =="1"){//Image File to upload
			if($imagesizedata === FALSE){
				//not image
				$success = 3;
			}
			else{
				//image
				//use $imagesizedata to get extra info
				if($imagesizedata['mime'] != 'image/gif' && $imagesizedata['mime'] != 'image/jpeg' && $imagesizedata['mime'] != 'image/png' && $imagesizedata['mime'] != 'image/jpg' && isset($imagesizedata)) {
					$success = 3;
				}
				else{					
					if(move_uploaded_file($file['tmp_name'],$upload_folder.$file_name)){}
					else $success = 0;
				}
			}
		}
		else{//Not Image Upload (PDF/Doc/XLS)
			if(in_array(get_extension($file['name']),$blacklist)){
				//File uploaded is blacklisted
				$success =  4; //Invalid File
			}
			else{
				//Check mime		
				$file_mime = $file['type'];								
				if (in_array($file_mime, $whitelist_mimes)) {
					$upload_folder = "../files/server/";
					if(move_uploaded_file($file['tmp_name'],$upload_folder.$file_name)){$success = 1;}
					else $success = 0;
				}	
				else{
					$success = 4;//invalid file
				}
			}
		}	
	}
	else $success = 2;	
	//Success = 1     // Success
	//Success = 0 	  // Failed
	//Success = 2     // Size is Larget
	//Success = 3     // Not image
	//Success = 4     // Invalid File Type
	return $success;
}
function upload_multi_file($file,$file_name,$type){
	$upload_folder = "../files/image/";
	$success = 1;
	$cdate = date("YdmHis");
	$file_size = filesize($file['tmp_name'][0]);
	$whitelist = array('jpg', 'png', 'gif', 'jpeg'); 
	$blacklist = array('php', 'php3', 'php4', 'js', 'html', 'json', 'asp', 'aspx', 'phtml','exe'); 
	global $mime_types;
	global $whitelist_mimes;
	
	if($file_size < 2000000){
		$imagesizedata = getimagesize($file['tmp_name'][0]);
		if($type =="1"){//Image File to upload
			if($imagesizedata === FALSE){
				//not image
				$success = 3;
			}
			else{
				//image
				//use $imagesizedata to get extra info
				if($imagesizedata['mime'] != 'image/gif' && $imagesizedata['mime'] != 'image/jpeg' && $imagesizedata['mime'] != 'image/png' && $imagesizedata['mime'] != 'image/jpg' && isset($imagesizedata)) {
					$success = 3;
				}
				else{					
					if(move_uploaded_file($file['tmp_name'][0],$upload_folder.$file_name)){}
					else $success = 0;
				}
			}
		}
		else{//Not Image Upload (PDF/Doc/XLS)
			if(in_array(get_extension($file['name'][0]),$blacklist)){
				//File uploaded is blacklisted
				$success =  4; //Invalid File
			}
			else{
				//Check mime		
				$file_mime = $file['type'][0];								
				if (in_array($file_mime, $whitelist_mimes)) {
					$upload_folder = "../files/server/";
					if(move_uploaded_file($file['tmp_name'][0],$upload_folder.$file_name)){$success = 1;}
					else $success = 0;
				}	
				else{
					$success = 4;//invalid file
				}
			}
		}	
	}
	else $success = 2;	
	//Success = 1     // Success
	//Success = 0 	  // Failed
	//Success = 2     // Size is Larget
	//Success = 3     // Not image
	//Success = 4     // Invalid File Type
	return $success;
}

function friendly_img($body){
	global $folder_name;
	global $web_path;

	$body=str_replace("/files/server/","files/server/",$body);
	$body=str_replace("/files/image/","files/image/",$body);
	
	$body=str_replace("files/server/",$web_path."files/server/",$body);
	$body=str_replace("files/image/",$web_path."files/image/",$body);
	
	return $body;
}

function body_replace($thumb,$folder_name){
	$thumb=str_replace($folder_name,"",$thumb);
	return $thumb;
}

function filterImage($image){
	global $web_path;
	global $folder_name;
	$image = str_replace($folder_name,"",$image);
	return $web_path.$image;
}

function thumb_replace($thumb,$folder_name){
	$thumb=str_replace($folder_name,"/",$thumb);
	return $thumb;
}

?>