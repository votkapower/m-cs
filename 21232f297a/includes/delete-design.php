<?php
require_once("../../conf.php");
	// DELETE DESIGN !
$name = trim(htmlspecialchars($_POST['name']));
$c = mysqli_query($_db,"SELECT `title`,`css-path`,`id` FROM `site-styles` WHERE `title`='$name'") OR DIE(mysqli_error($_db));
$check = mysqli_num_rows($c);
$err[] = "";
if(strlen($name) < 3)
{
  $err[0] = "error";
  $err[1] = "Името е прекалено кратко .. !";
}
else if($check < 1)
	{
	  $err[0] = "error";
	  $err[1] = "Няма такъв резултат .. ?!";
	}
	else 
		{
		   $r = mysqli_fetch_array($c);
		//   css-path 	title , id
		   $path = trim("../../".trim($r['css-path']));
		   $css_id = $r['id'];
		   
		  unlink($path);
		  
		  mysqli_query($_db,"DELETE FROM `site-styles` WHERE `id`='$css_id' AND `title`='$name' LIMIT 1");
		  $err[0] = "ok";
		  $err[1] = "Дизайна бе изтрит успешно :)";
		}

 echo $err[0];