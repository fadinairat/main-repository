<?php
include_once '../../includes/config.php';
echo "<html>";
if(isset($_REQUEST['logout'])){
 session_destroy();
 session_unregister($sess_value);
}
include '../auth.php';
$lang = 2;
if(isset($_REQUEST['control1'])) $control1 = request($_REQUEST['control1']);
else{
	$control1 = "";
}

//if the users not have full permission to categories
$cat_q="";
$cat_q1="";
$cats=array();
$cats=explode("|",$_SESSION['uu_cat']);
$ii=count($cats) - 1;
for($i=1;$i < $ii; $i++){
	if($i==1){
		$cat_q .=" and (";
		$cat_q1 .=" and (";
	}
	$cat_q .= "c_id='".$cats[$i]."'";
	$cat_q1 .= "pages_categories.c_id = '".$cats[$i]."'";
	if($i == $ii -1 ) {
		$cat_q .= ")";
		$cat_q1 .= ")";
	}
	else{
		$cat_q .= " or ";
		$cat_q1 .= " or ";
	}
}//for

if($_SESSION['uu_p6']) $cat_q = "";
?>
<script  language="JavaScript">
function AddLink(txtLink) 
{
    var dialog = window.opener.CKEDITOR.dialog.getCurrent();
	dialog.setValueOf('info','url',txtLink);  // Populates the URL field in the Links dialogue.
	dialog.setValueOf('info','protocol','');  // This sets the Link's Protocol to Other which loads the file from the same folder the link is on
	window.close(); // closes the popup window
} 
function select_cat(){
	var oth_lang = document.getElementById("oth_lang").value;
	var path = document.getElementById("web_path").value;
	var link = document.getElementById("links").value;
	
	if(oth_lang =="1") link = path+"ar/"+link;
	else if(oth_lang=="2") link = path+"en/"+link;
	
	var dialog = window.opener.CKEDITOR.dialog.getCurrent();
	dialog.setValueOf('info','url',link);  // Populates the URL field in the Links dialogue.
	dialog.setValueOf('info','protocol','');  // This sets the Link's Protocol to Other which loads the file from the same folder the link is on
	window.close(); // closes the popup window
}
</script>
<head>
<title><?php echo $eng_title;?> - Administration</title>
<link rel="stylesheet" type="text/css" href="../styles/estyle.css">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<link href='http://fonts.googleapis.com/css?family=Andika' rel='stylesheet' type='text/css'>
</head>
<body style="background-color:#edf0f5;margin:0px 0px 0px 0px">
<div  style="padding:10px;width:90%;">
<div ><table border=0 cellspacing=0 cellpadding=0 width=100%>
<tr><td><?php if($admin_logo !="") echo "<img src='".$admin_logo."' height=60 border=0 />"; ?><br/><br/></td>
<!--<td align=right><img src='images/top.gif' alt='' border='0' /></td>-->
</table></div>

<input type="hidden" name="web_path" id="web_path"  value="<?php echo str_replace("/control","",$web_path); ?>" >

<form name="s_form" method="post" onsubmit="return validate()" action="<?php $_SERVER['PHP_SELF']; ?>" >
<input type="hidden" name="search_type" value="art_search" />
<input type="hidden" name="lang" value="<?php echo $lang; ?>" />
<?php
$keyword = "";
$category = "";
$search_type = "1";
$s_lang = $lang;


$q = "";
if(isset($_REQUEST['keyword'])){
	$keyword= request($_REQUEST['keyword']);
	$category = request($_REQUEST['f_catid']);
	$search_type = request($_REQUEST['f_c_type']);
	$s_lang = request($_REQUEST['s_lang']);
	
	if($search_type=="1"){
		if($keyword !="") $q .= " and (p_title like '%".$keyword."%' or p_summary like '%".$keyword."%')";	
		if($category !="" && $category !="0") $q .= $q." and pages_categories.c_id = '".$category."'";
	}
	else if($search_type=="2" || $search_type == "4" || $search_type=="5" || $search_type=="6"){
		if($keyword!="") $q.=" and (f_title like '%".$keyword."%' or f_description like '%".$keyword."%' or f_ar_description like '%".$keyword."%' or f_ar_title like '%".$keyword."%')";
		if($category !="" && $category !="0") $q .=" and f_catid ='".$category."'";
		if($s_lang !="") $q.=" and (f_lang =0 or f_lang='".$s_lang."')";
	}
}
if(isset($_REQUEST['s_lang'])){
	$cat_q .=" and (c_lang='".$s_lang."' or c_lang ='0')";
}
else $cat_q .=" and (c_lang='".$lang."' or c_lang ='0')";
?>
<fieldset style="width:100%;">
<legend><b>Articles Search</b></legend>
<table border=0 cellspacing=0 cellpadding=0>
	<tr><td>
	<b>Keyword:</b> <input type="text" class="txt_box" style="width:100px;" name="keyword" id="keyword" value="<?php echo $keyword; ?>" />
	</td>
	<td>&nbsp;&nbsp;&nbsp;<b>Search In</b>
		<select name="f_c_type" onChange="get_ajax_categories()" id="f_c_type" style="width:150px;" >
			<option value="" >.::  Select Search Target  ::.</option>
			<option value="1" <?php if($search_type=="1") echo "SELECTED"; ?> >In Articles</option>
			<option value="2" <?php if($search_type=="2") echo "SELECTED"; ?> >In Files</option>
			<option value="3" <?php if($search_type=="3") echo "SELECTED"; ?> >In Blogs</option>
			<option value="4" <?php if($search_type=="4") echo "SELECTED"; ?> >In Photo Gallery</option>
			<option value="5" <?php if($search_type=="5") echo "SELECTED"; ?> >In Videos</option>
			<option value="6" <?php if($search_type=="6") echo "SELECTED"; ?> >In Audio</option>
		</select>
	</td>
	<td>&nbsp;&nbsp;&nbsp;<b>Category: </b>
	<div style="float:left;" id="c_type_div" >
	<select name="f_catid" id="f_catid">
		<option value="">.::   Select Category   ::.</option>
		<?php
		$c_name = "c_name";
		if($s_lang==1) $c_name = "c_ar_name";
		$qry = mysqli_query($sqlconnect,"select * from categories where c_type='".$search_type."' and c_parent=0 ".$cat_q." order by c_id");
		while($row=mysqli_fetch_array($qry)){
		?>
		<option value="<?php echo $row['c_id']?>" <?php if($category==$row['c_id']) echo "selected=true"?>><?php echo $row[$c_name]?></option>
		<?php
		$qry1 = mysqli_query($sqlconnect,"select * from categories where c_type='".$search_type."' and c_parent=".$row['c_id'] ." ".$cat_q." order by c_id");
		while($row1=mysqli_fetch_array($qry1)){
		
		?>
		<option value="<?php echo $row1['c_id']?>" <?php if($category==$row1['c_id']) echo "selected=true"?>> --<?php echo $row1[$c_name]; ?></option>
		<?php
		}//while
		}//while
		?>
	</select></div></td>
	<td><b>Language:</b>
		<select name="s_lang" id="s_lang" style='width:80px;' >
			<option value="2" <?php if($s_lang=="2") echo "SELECTED"; ?>>English</option>
			<option value="1" <?php if($s_lang=="1") echo "SELECTED"; ?>>Arabic</option>
		</select>
	</td>
	<td style="padding-left:10px;" ><input type="submit" value="  Search  " /></td>
	</tr>
</table>
</form>
</fieldset>
<?php
if(isset($_REQUEST['keyword'])){
	if($q !=""){
		$search_type = request($_REQUEST['f_c_type']);
		if($search_type=="1") echo "<div align=center style='color:red;font-size:15px;' >Search result in articles</div>";
		else if($search_type=="2") echo "<div align=center style='color:red;font-size:15px;' >Search result in files</div>";
		else if($search_type=="3") echo "<div align=center style='color:red;font-size:15px;' >Search result in blogs</div>";
		else if($search_type=="4") echo "<div align=center style='color:red;font-size:15px;' >Search result in Photo Gallery</div>";
		else if($search_type=="5") echo "<div align=center style='color:red;font-size:15px;' >Search result in videos</div>";
		else if($search_type=="6") echo "<div align=center style='color:red;font-size:15px;' >Search result in audio</div>";
		
		echo "<font color=red style='font-size:15px;'>Click on article title to select</font><br/><br/>";
		echo "<table cellpadding=2 cellspacing=1 width=100% style=\"background-color:".$bgbody."\">";
		echo "<tr style='background-color:".$bgtoptable.";height:30px;' align=center>";
		echo "<td class='wtitle' width=5% >#</td>";
		echo "<td class='wtitle' >Title</td>";
		echo "</tr>";

		if($search_type=="1"){
			
			
			$pages = mysqli_query($sqlconnect,"select distinct(pages.p_id),p_title,pages_categories.c_id from pages INNER JOIN pages_categories on pages.p_id=pages_categories.p_id where p_deleted=0 and (p_lang='".$s_lang."' or p_lang='0') ".$q." order by p_date desc,p_title ");
						
			$m=1;
			while($row = mysqli_fetch_array($pages)){
				$title = filterTitle($row['p_title']);
				
				if($s_lang =="2") $link = str_replace("/control","",$web_path)."en/Article/".genid($row['p_id'])."/".friendly_encode($title);
				else if($s_lang =="1") $link = str_replace("/control","",$web_path)."ar/Article/".genid($row['p_id'])."/".friendly_encode($title);
				
				if($m%2) echo "<tr  bgColor='". $td1 ."' style='height:25px;' onmouseover=\"this.bgColor='".$tdon."'\"  onmouseout=\"this.bgColor='".$td1."'\">";
				else echo "<tr bgColor='". $td2 ."' style='height:25px;' onmouseover=\"this.bgColor='".$tdon."'\"  onmouseout=\"this.bgColor='".$td2."'\">";
				
				echo "<td>".$row['p_id']."</td>";
				echo "<td><a href=\"javascript:AddLink('".$link."')\" >".$row['p_title']."</a></td>";
				
				echo "</tr>";
				$m++;
			}
		}
		else if($search_type=="2" || $search_type=="4"){
			$files = mysqli_query($sqlconnect,"select * from files where f_deleted=0 and f_file <>'' ".$q." order by f_id desc,f_priority");
			$m=1;
			while($row = mysqli_fetch_array($files)){
				//$title = filterTitle($row['f_title']);				
				if($s_lang =="2"){					
					$title = filterTitle($row['f_title']);
				}
				else if($s_lang =="1"){				
					$title = filterTitle($row['f_ar_title']);
				}
				$file = $row['f_file'];
				$file = str_replace("'","&lsquo;",$file);
				$file = str_replace("\"","&#34;",$file);
				
				if($m%2) echo "<tr  bgColor='". $td1 ."' style='height:25px;' onmouseover=\"this.bgColor='".$tdon."'\"  onmouseout=\"this.bgColor='".$td1."'\">";
				else echo "<tr bgColor='". $td2 ."' style='height:25px;' onmouseover=\"this.bgColor='".$tdon."'\"  onmouseout=\"this.bgColor='".$td2."'\">";
				
				echo "<td>".$row['f_id']."</td>";
				echo "<td><a href=\"javascript:AddLink('".str_replace("/control","/public",$web_path).$file."')\" >".$title."</a></td>";
				
				echo "</tr>";
				$m++;
			}
		}
		else if($search_type=="5" || $search_type=="6"){
			$files = mysqli_query($sqlconnect,"select * from files INNER JOIN categories on categories.c_id=files.f_catid where categories.c_type='".$search_type."' and f_deleted=0 ".$q." order by f_id desc,f_priority");
			
			$m=1;
			while($row = mysqli_fetch_array($files)){
				if($s_lang =="2"){
					if($search_type=="4") $link = str_replace("/control","",$web_path).$row['f_file'];
					else if($search_type=="5") $link = str_replace("/control","",$web_path)."en/Video/".genid($row['f_id'])."/".friendly_encode($row['f_title']);
					else if($search_type=="6") $link = str_replace("/control","",$web_path)."en/Audio/".genid($row['f_id'])."/".friendly_encode($row['f_title']);					
					$title = filterTitle($row['f_title']);
				}
				else if($s_lang =="1"){				
					if($search_type=="4") $link = str_replace("/control","",$web_path).$row['f_file'];
					else if($search_type=="5") $link = str_replace("/control","",$web_path)."ar/Video/".genid($row['f_id'])."/".friendly_encode($row['f_ar_title']);
					else if($search_type=="6") $link = str_replace("/control","",$web_path)."ar/Audio/".genid($row['f_id'])."/".friendly_encode($row['f_ar_title']);					
					$title = filterTitle($row['f_ar_title']);
				}				
				
				if($m%2) echo "<tr  bgColor='". $td1 ."' style='height:25px;' onmouseover=\"this.bgColor='".$tdon."'\"  onmouseout=\"this.bgColor='".$td1."'\">";
				else echo "<tr bgColor='". $td2 ."' style='height:25px;' onmouseover=\"this.bgColor='".$tdon."'\"  onmouseout=\"this.bgColor='".$td2."'\">";
				echo "<td>".$row['f_id']."</td>";
				echo "<td><a href=\"javascript:AddLink('".$link."')\" >".$title."</a></td>";
				echo "</tr>";
				$m++;
			}
		}
		echo '</table><Br><Br>';
	}
	else{
		echo "<div align=center class='msg' >You have to specify at least one search parameter...</div>";
	}
}
?>
<?php
$src_key = "";
$src_type = "";
$src_lang = "";
$q = "";
if(isset($_REQUEST['src_key'])){
	$src_key = request($_REQUEST['src_key']);
	$src_type = request($_REQUEST['src_type']);
	$src_lang = request($_REQUEST['src_lang']);
	if($src_key != "") $q = $q. " and (c_name like '%".$src_key."%' or c_ar_name like '%".$src_key."%' or c_description like '%".$src_key."%' or c_ar_description like '%".$src_key."%') ";
	if($src_type != "") $q = $q. " and c_type ='".$src_type."' ";
	if($src_lang !="") $q = $q. " and (c_lang='0' or c_lang='".$src_lang."')";
}

?>
<form name="form2" action = "" >
<input type="hidden" name="cat_search" value = "1">
<fieldset style="width:100%;">
<legend><b>Categories Search</b></legend>
<table border=0 cellspacing=5 cellpadding=0>
<tr>
	<td><b>Key:</b></td>
	<td><input type="text" class="txt_box" class="txt_box" value="<?php echo $src_key?>" name="src_key"></td>
	<td>
	<td><b>Type:</b></td>
	<td><select name="src_type" id="src_type">
	<option value="" <?php if($src_type=="") echo "SELECTED"?>></option>
	<?php
	$types = mysqli_query($sqlconnect,"select * from categories_types order by sym");
	while($rww = mysqli_fetch_array($types)){
		echo '<option value="'.$rww['sym'].'"';
		if($rww['sym']==$src_type)  echo "SELECTED";
		echo ' >'.$rww['name'].'</option>';
	}
	?>
	</td>
	<td><b>Language:</b></td>
	<td><select name="src_lang" id="src_lang">
		<option value="2" <?php if($src_lang=="2") echo "SELECTED"; ?>>English</option>
		<option value="1" <?php if($src_lang=="1") echo "SELECTED"; ?>>Arabic</option>
	</select></td>
	<td style="padding-left:10px;" ><input type="submit" value="  Search  " /></td>
</tr>
</table>
</fieldset><Br>

<?php
if(array_key_exists("cat_search",$_REQUEST)){
$qry = mysqli_query($sqlconnect,"select * from categories where c_parent=0 ".$q." and c_deleted=0 order by c_id desc,c_priority");

if (mysqli_num_rows($qry) > 0){
	echo '<font class="msg" >Click on the category name to return the link</font><Br>';
	echo "<table cellpadding=2 cellspacing=1 width=100% style=\"background-color:".$bgbody."\">";
	echo "<tr style=\"background-color:".$bgtoptable."\" align=center>";

	echo "<td width=3% class=wtitle>#</td>";
	echo "<td width=3% class=wtitle>Priority</td>";
	echo "<td width=65% class=wtitle>Title</td>";
	echo "<td width=20% class=wtitle>Category Type</td>";
	echo "</tr>";
	$m=1;
	$ii=0;
	while($row = mysqli_fetch_array($qry)){
		if($src_lang =="2") $c_name = $row['c_name'];
		else $c_name = $row['c_ar_name'];
		
		$c_name = str_replace("\"","",$c_name);
		$c_name = str_replace("\"","",$c_name);
		$c_name = friendly_encode($c_name);
				
		if($src_lang == "2") $link = str_replace("/control","",$web_path)."en/Category/".genid($row['c_id'])."/".$c_name;
		else $link = str_replace("/control","",$web_path)."Category/".genid($row['c_id'])."/".$c_name;
		
		if($m%2) echo "<tr  bgColor='". $td1 ."' onmouseover=\"this.bgColor='".$tdon."'\"  onmouseout=\"this.bgColor='".$td1."'\">";
		else echo "<tr bgColor='". $td2 ."' onmouseover=\"this.bgColor='".$tdon."'\"  onmouseout=\"this.bgColor='".$td2."'\">";
		
		//else echo "<td>&nbsp;</td>";
		echo "<td align=center>". $row['c_id'] ."</td>";
		echo "<td align=center>". $row['c_priority'] ."</td>";
		echo "<td><a  href=\"javascript:AddLink('".$link."')\" >". $row['c_name'] ."/". $row['c_ar_name'] ."</a></td>";
		echo "<td align=center>";
		if($row['c_type']=="1") echo "Page Category";
		else if($row['c_type']=="2") echo "Files Category";
		else if($row['c_type']=="3") echo "Blogs Category";
		else if($row['c_type']=="4") echo "Photo Gallery Category";
		else if($row['c_type']=="5") echo "Video Gallery Category";
		else if($row['c_type']=="6") echo "Audio Gallery Category";
		echo "</td>";
		echo "</tr>";

		//child here
		$qry1 = mysqli_query($sqlconnect,"select * from categories where c_parent='". $row['c_id'] ."' and c_deleted=0 ".$q." order by c_priority");
		if (mysqli_num_rows($qry1) > 0){
		
			echo "<tr valign=top>";
			echo "<td colspan=2 align=right style=\"background-image:url(images/bg_child.gif); background-repeat:repeat-y;\"><img src='../images/arrow.gif' border=0><br></td>";
			echo "<td colspan=5>";
			echo "<table cellpadding=2 cellspacing=1 width=100% style=\"background-color:".$bgbody."\">";
			while($row1 = mysqli_fetch_array($qry1)){
				if($src_lang == "2") $link = str_replace("/control","",$web_path)."en/category/".$row1['c_id']."/".$row1['c_type'];
				else $link = str_replace("/control","",$web_path)."category/".$row1['c_id']."/".$row1['c_type'];
			
				$ii++;
				echo "<tr  bgColor='". $td3 ."' onmouseover=\"this.bgColor='".$tdon."'\"  onmouseout=\"this.bgColor='".$td3."'\">";
				//add permission session here
				if($row1['c_editable']==0 || $_SESSION['uu_id']=="1") echo "<td width=3%><input type='checkbox' name='pend[]' id='ch_".$ii."' value='" . $row1['c_id'] . "'></td>";
				else echo "<td>&nbsp;</td>";
				echo "<td width=3% align=center>". $row1['c_id'] ."</td>";
				echo "<td width=3% align=center>". $row1['c_priority'] ."</td>";
				echo "<td width=85%><a  href=\"javascript:AddLink('".$link."')\" >". $row1['c_name'] ."/". $row1['c_ar_name'] ."</a></td>";
				echo "<td align=center>";
				echo "</tr>";
			}//while1
			echo "</table>";

			echo "</td>";
			echo "</tr>";
		}//if 
	//child here

	$m++;
	$ii++;
	}//while
}//if num > 0
else echo "<br><div align=center class=msg>No categories found</font></div><br>";
}
?>
</form>

<?php
$src_key1 = "";
$src_lang1 = "";
$q1 = "";
if(isset($_REQUEST['src_key1'])){
	$src_key1 = request($_REQUEST['src_key1']);
	$src_lang1  = request($_REQUEST['src_lang1']);
	if($src_key1 != "") $q1= $q1. " and (t_name like '%".$src_key1."%' or t_ar_name like '%".$src_key."%')";
	if($src_lang1 !="") $q1 = $q1. " and (t_lang =0 or t_lang='".$src_lang1."')";
}
?>
<form name="form3" action = "" >
<input type="hidden" name="tag_search" value = "1">
<fieldset style="width:100%;">
<legend><b>Tags Search</b></legend>
<table border=0 cellspacing=5 cellpadding=0>
<tr>
	<td><b>Key:</b></td>
	<td><input type="text" class="txt_box" class="txt_box" value="<?php echo $src_key1?>" name="src_key1"></td>
	<td>
	<td><b>Language:</b></td>
	<td><select name="src_lang1" id="src_lang1">
		<option value="2" <?php if($src_lang1=="2") echo "SELECTED"; ?>>English</option>
		<option value="1" <?php if($src_lang1=="1") echo "SELECTED"; ?>>Arabic</option>
	</select></td>
	<td style="padding-left:10px;" ><input type="submit" value="  Search  " /></td>
</tr>
</table>
</fieldset><Br>
<?php
if(array_key_exists("tag_search",$_REQUEST)){
	
	$qry = mysqli_query($sqlconnect,"select * from tags where t_deleted=0 ".$q1." order by t_id desc");
	if (mysqli_num_rows($qry) > 0){
		echo '<font class="msg" >Click on the tag name to return the link</font><Br>';
		echo "<table cellpadding=2 cellspacing=1 width=100% style=\"background-color:".$bgbody."\">";
		echo "<tr style=\"background-color:".$bgtoptable."\" align=center>";		
		echo "<td width=10% class=wtitle>#</td>";
		echo "<td width=80% class=wtitle>Tag Name</td>";
		echo "</tr>";
		$i=1;
		while($row = mysqli_fetch_array($qry)){
			if($src_lang1 =="1") $link = str_replace("/control","",$web_path)."Tag/".genid($row['t_id'])."/".friendly_encode($row['t_ar_name']);
			else $link = str_replace("/control","",$web_path)."en/Tag/".genid($row['t_id'])."/".friendly_encode($row['t_name']);
			
			if($i%2) echo "<tr  bgColor='". $td1 ."' onmouseover=\"this.bgColor='".$tdon."'\"  onmouseout=\"this.bgColor='".$td1."'\">";
			else echo "<tr bgColor='". $td2 ."' onmouseover=\"this.bgColor='".$tdon."'\"  onmouseout=\"this.bgColor='".$td2."'\">";
			
			echo "<td align=center>".$i."</td>";
			echo "<td align=center><a  href=\"javascript:AddLink('".$link."')\" >".$row['t_name']." / ".$row['t_ar_name']."</a></td>";
			
			echo "</tr>";
		}//while
		echo "</table>";
	}

}
?>
<form name="form3" action = "" >
<input type="hidden" name="tag_search" value = "1">
<fieldset style="width:100%;">
<legend><b>Others</b></legend>
<table border=0 cellspacing=5 cellpadding=0>
<tr>
	<td><select name="links" id="links">
		<option value="Photo-Gallery">Photo Gallery</option>
		<option value="Video-Gallery">Video Gallery</option>
		<option value="Audio-Gallery">Audio Gallery</option>		
	</select></td>
	<td><b>Language:</b></td>
	<td><select name="oth_lang" id="oth_lang">
		<option value="2">English</option>
		<option value="1">Arabic</option>
	</select></td>
	<td style="padding-left:10px;" ><input type="button" onclick="select_cat()" value="  Search  " /></td>
</tr>
</table>
</fieldset><Br>
</div>
</body>
</html>