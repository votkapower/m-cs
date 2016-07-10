<?php
if($_SESSION['is_logged'] != true)
{
	header("Location: ./?p=index");
	exit;
}
$username = $_SESSION['user']['username'];
$m = trim(htmlspecialchars($_GET['m']));
switch ($m)
{
   case "delete":
	  $what = (int)$_GET['i'];
	  
	mysqli_query($_db,"DELETE FROM `user-pms` WHERE `id`='$what'") OR DIE (mysqli_error());
	header("Location: ./?p=pms");
		
   break;


   case "read":
	  $what = (int)$_GET['i'];
	  echo "<div id='panel-top'>Четене на съобщение</div> 
			<div id='panel-bottom'>";
			
			$get_pm = mysqli_query($_db,"SELECT * FROM `user-pms` WHERE `to_user`='$username' AND `id`='$what'");
			$pm_num = mysqli_num_rows($get_pm);
			$pm = mysqli_fetch_array($get_pm);
			mysqli_query($_db,"UPDATE `user-pms` SET `readed`='1' WHERE `to_user`='$username' AND `id`='$what'");
			if($pm_num == 1)
			{
			 echo "От: <b>".$pm['from_user']."</b> <br/>";
			 echo "Тема: <b>".$pm['msg-title']."</b> <br/>";
			 echo "Ипратено: <b>".maketime($pm['timestamp'])."</b> на (".date("d.m.Yг. в H:iч.",$pm['timestamp']).") <br/>";		
			 echo "Съобшение:<br/> <div style='border-top:1px solid #ccc;border-bottom:1px solid #ccc;margin-top:5px;padding:5px;'>".nl2br(htmlspecialchars_decode($pm['msg-text']))."</div>";
			 echo "<div style='padding:5px;'><a href='./?p=sendpm&t=".$pm['from_user']."' >Отговори</a> <a href='./?p=pms&m=delete&i=".$pm['id']."' style='float:right;color:red;'>Изтрий</a></div>";
			}
			else
				{
				  echo "<div align='center'> Това съобщение не съществува !</div>";
				}
			
	  echo "</div>";
   break;
   
   default:
	  echo "<div id='panel-top'>Съобщения</div> 
			<div id='panel-bottom'>";
			$get_pm = mysqli_query($_db,"SELECT * FROM `user-pms` WHERE `to_user`='$username' ORDER BY `timestamp` DESC");
			$pm_num = mysqli_num_rows($get_pm);
			while($pm = mysqli_fetch_array($get_pm))
			{
			  if($pm['readed'] == "0"){ $new_mark = "<img src='./images/icons/email_go.png' width='16' border='0' title=\"НОВО !\" />";}else{$new_mark = "<img src='./images/icons/email_open.png' width='16' border='0' title=\"Прочетено .. \" />"; }
			
			echo "<div id='pm-list' style='padding:10px;border-bottom:1px solid #ccc;'>$new_mark<a style='font-size:12px;' href='./?p=pms&m=read&i=".$pm['id']."' title='".$pm['msg-title']." - от: ".$pm['from_user']."'>".substr($pm['msg-title'],0,40)."..</a>  <span style='float:right;'>от:<b>".$pm['from_user']."</b> / ".maketime($pm['timestamp'])."</a></div>";
			
			}
			if($pm_num == 0)
			{
			 echo "<div align='center'> Няма нови съобшения ..</div>";
			}
	  echo "</div>";
   break;
}

?>
