<?php
$post_id = (int)trim(htmlspecialchars($_GET['r']));	

$pinfo_q = mysqli_query($_db,"SELECT `cat_id`,`id` FROM `forum-posts` WHERE `id`='".$post_id."'");
$p_num = mysqli_num_rows($pinfo_q);	
if($p_num == 0 )
{
 header("Location: ./?p=forum");
 exit;
}
$pinfo = mysqli_fetch_array($pinfo_q);

				  mysqli_query($_db,"UPDATE `forum-posts` SET  `reported`='true' WHERE `id`='".$post_id."' ") OR DIE(mysqli_error());
				 // ok("Отговора ти е редактиран  успешно :)");
				  $url = "./?p=forum&w=read&c=".$pinfo['cat_id']."&read=".$post_id;
				  header("Location: ".$url);
				  exit;


	
