<?php
$cat_id = (int)trim(htmlspecialchars($_GET['c']));	
$post_id = (int)trim(htmlspecialchars($_GET['r']));	

$cinfo_q = mysqli_query($_db,"SELECT * FROM `forum-cats` WHERE `cat_id`='".$cat_id."'");
$c_num = mysqli_num_rows($cinfo_q);	
if($c_num == 0 )
{
 header("Location: ./?p=forum");
 exit;
}

$pinfo_q = mysqli_query($_db,"SELECT * FROM `forum-posts` WHERE `id`='".$post_id."'");
$p_num = mysqli_num_rows($pinfo_q);	
if($c_num == 0 )
{
 header("Location: ./?p=forum");
 exit;
}

$cat_info = mysqli_fetch_array($cinfo_q);
$rinfo = mysqli_fetch_array($pinfo_q);


				 if($locked == "true" AND $setting['alarm-users-when-admin-lock-post'] == 'true')
				 {
				  $msg = "
				   Здравей, <b>".$rinfo['username']."</b>,
				   
				     Днес <b>".date("d.m.Y в h:iч.")."</b> администгратора <b>".$me."</b> изтри темата ти \"<b>".$title."</b>\".
					 
					 Причина за изтриването може да е : 
					   - Псуване и/или убиди в  темата ти
					   - Спам
					   - Темата е била докладвана
					   - Поредната ти тема, която не си е на мястото(в съответната категория)
					   - Темата е приключена
					   - По твое желание
					   
					 * Ако знаеш за това т.е. темата е заключена по твое желание - извинявай за спама. 
					
				   Поздрви от екипа на сайта . :)
				  ";
				    echo user_pm("system", $rinfo['username'], "Темата ти е изтрита !", $msg);
				 }
	
				 $dopulnitelno = " `cat_id`='$new_category_id', `locked`='$locked', ";
				 
				  mysqli_query($_db,"DELETE FROM  `forum-posts` WHERE `id`='".$post_id."' ") or die(mysqli_error());
				  mysqli_query($_db,"DELETE FROM  `forum-answers` WHERE `post_id`='".$post_id."' ") or die(mysqli_error());
	
				 header("Location: ./?p=forum");
				 exit;
			


?>

	
