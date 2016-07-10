<?php
$w = trim(htmlspecialchars($_GET['w']));

switch($w)
{
  
 default:
 
$cntcs_msgs = mysqli_query($_db,"SELECT * FROM `contacts` WHERE `readed`='0' ORDER BY  `timestamp` DESC ");
$count = mysqli_num_rows($cntcs_msgs);
$i = $count;
echo "<div id='panel-top'>Съобщения до администраторите</div>
<div id='panel-bottom'>
		
	<div style='background:#540303;color:#160000;text-shadow:1px 1px #660202;padding:5px 3px;font-family:Arial;'># | Заглавие <span style='float:right;'>Прочети</span></div>";
	 
	 while($r = mysqli_fetch_array($cntcs_msgs))
	 {
	  
	  echo "<div style='padding:5px;'>$i. <a href='./?p=contact_msgs&w=read&i=".$r['id']."' title='От: ".$r['from']."  / ".maketime($r['timestamp'])."'>".$r['title']."</a><span style='float:right;'><a href='./?p=contact_msgs&w=read&i=".$r['id']."'>Прочети</a> </span></div>";
	  $i--;
	 }
	 if($count == 0)
	 { 
	  echo "<div align='center'> .. няма нови съобщения ..</div>";
	 }
	
	
echo "</div>";

break;




case "read":
    $id = (int)$_GET['i'];
	$s = mysqli_query($_db,"SELECT * FROM `contacts` WHERE `id`='$id'"); // взимаме информацията само за конкретното ИД
	mysqli_query($_db,"UPDATE `contacts` SET  `readed`='1' WHERE `id`='$id'"); // маркираме го като прочетено
	$r = mysqli_fetch_array($s); // изкарваме я
echo "<div id='panel-top'>Чете на съобщение до администраторите</div>
<div id='panel-bottom'>";
		
  echo "<b>Изпратил:</b> ".$r['from']." ( IP: ".$r['ip']." ) <br/>";
  echo "<b>Емаила му:</b> ".$r['from_email']." <br/>";
  echo "<b>Тема:</b> ".$r['title']." <br/>";
  echo "<b>Претено: </b> ".maketime($r['timestamp'])." <br/>";
  
  echo "<b>Съобщение:</b><div style='margin:5px 0px;border-top:1px solid #666;padding:7px;font-size:13px;font-family:Arial;'>".nl2br(htmlspecialchars_decode($r['msg']))."</div>";
	 
	  
	
	
echo "</div>";

break;
case "all":

	$cntcs_msgs = mysqli_query($_db,"SELECT * FROM `contacts`  ORDER BY  `timestamp` DESC  ");
	$count = mysqli_num_rows($cntcs_msgs);
	$i = $count;
	echo "<div id='panel-top'>Съобщения до администраторите</div>
	<div id='panel-bottom'>
			
		<div style='background:#540303;color:#160000;text-shadow:1px 1px #660202;padding:5px 3px;font-family:Arial;'># | Заглавие <span style='float:right;'>Прочети</span></div>";
		 
		 while($r = mysqli_fetch_array($cntcs_msgs))
		 {
		  
		  echo "<div style='padding:5px;'>$i. <a href='./?p=contact_msgs&w=read&i=".$r['id']."' title='От: ".$r['from']."  / ".maketime($r['timestamp'])."'>".$r['title']."</a><span style='float:right;'><a href='./?p=contact_msgs&w=read&i=".$r['id']."'>Прочети</a> </span></div>";
		  $i--;
		 }
		
	 if($count == 0)
	 { 
	  echo "<div align='center'> .. няма никакви съобщения ..</div>";
	 }
		
	echo "</div>";

break;

}
?>