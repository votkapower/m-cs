<?php
session_start();
ob_start();

if(!file_exists("../conf.php")) 
{
 header("Location: ../install/");
 exit;
}

if($_SESSION['is_logged'] == true )
 { 
     if( $_SESSION['user']['type'] != "admin" )
	 {
		 header("Location: ../?p=index");
		 exit;
	 }
		
 }
 else if($_SESSION['is_logged'] != true )
 {
    header("Location: ./login.php");
	exit;
 }
 
require_once "../conf.php";
require_once "../functions.php";
require_once "../default_props.php";

mysqli_query($_db,"DELETE FROM `banners` WHERE `time_added` => `time-end`"); // Трий всички банери на които дата им е изтекла
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="./styles/cpkr/colorpicker.css" type="text/css" />
<link rel="stylesheet" href="./styles/cpkr/layout.css" type="text/css" />
<link rel="stylesheet" href="../styles/main.css" type="text/css" />
<title>Админ панел / <?php echo SITE_TITLE;?></title>
</head>
<body>
<style type="text/css">
	a{ color:#E31111 !important; }
</style>
<div id='body-warrper'>
    <div id='main'>
        <div id="header"><?php mysqli_query($_db,"SET NAMES utf8");$get_settings = mysqli_query($_db,"SELECT * FROM `site-settings` ORDER BY `id` DESC LIMIT 1");$data = mysqli_fetch_array($get_settings); echo "<img src='.".$data['default_header']."' width='933'  border='0' / >";?></div>
        <div id='sides'>
            <div id="left-side" style='width:200px;'>
                <?php require_once "./includes/control_menu.php";?>
            </div>
            <div id="center-side" style='width:724px;'>
                <?php 
																
				//	require_once "includes/site/center-part.php";
				
				$p = trim(htmlspecialchars($_GET['p']));
				if(!$p)
				{
				  	include "./admin_switch/index/index.php"; 
				
				}
				else{
						
					  if(@file_exists("./admin_switch/".$p."/index.php"))
								{
									  include "./admin_switch/".$p."/index.php";
									
								}
								else
									{
									 include "./admin_switch/error/index.php";	
											
									}
					
				}	
					
			
				?>																						
            </div>
            <div id="right-side">
                <?php //require_once "../includes/site/right-part.php";?>
			</div>
        <div id="clear"></div>
    </div>
</div>
<div id='footer'><?php require_once "../includes/site/footer.php";?></div>

<script type="text/javascript" language="javascript" src="./scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" language="javascript" src="../scripts/bbcode.js"></script>
<script type="text/javascript" language="javascript" src="../scripts/rcm.js"></script>
<script type="text/javascript" language="javascript" src="./scripts/cpkr/colorpicker.js"></script>
<script type="text/javascript" language="javascript" src="./scripts/cpkr/eye.js"></script>
<script type="text/javascript" language="javascript" src="./scripts/cpkr/layout.js"></script>
<script type="text/javascript" language="javascript" src="./scripts/cpkr/utils.js"></script>

</body>
</html>