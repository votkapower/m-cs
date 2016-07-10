<?php
session_start();
ob_start();

	if(!file_exists("../conf.php")) 
	{
	 header("Location: ../install/");
	 exit;
	}

    if( $_SESSION['user']['type'] == "admin" )
	 {
		 header("Location: ./ ");
		 exit;
	 }
	


 
require_once "../conf.php";
require_once "../functions.php";
require_once "../default_props.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" language="javascript" src="./scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" language="javascript" src="./scripts/rcm.js"></script>
<script type="text/javascript" language="javascript" src="./scripts/cpkr/colorpicker.js"></script>
<script type="text/javascript" language="javascript" src="./scripts/cpkr/eye.js"></script>
<script type="text/javascript" language="javascript" src="./scripts/cpkr/layout.js"></script>
<script type="text/javascript" language="javascript" src="./scripts/cpkr/utils.js"></script>
<link rel="stylesheet" href="./styles/cpkr/colorpicker.css" type="text/css" />
<link rel="stylesheet" href="./styles/cpkr/layout.css" type="text/css" />
<link rel="stylesheet" href="../styles/main.css" type="text/css" />
<title>Вход в Админ панела / <?php echo SITE_TITLE;?></title>
<?php //echo default_site_layout("../styles/my/white.css");?>
</head>
<body>
<div id='body-warrper'>
    <div id='main' style='margin-top:170px;'>
        <div id="header"><?php //mysqli_query($_db,"SET NAMES utf8");$get_settings = mysqli_query($_db,"SELECT * FROM `site-settings` ORDER BY `id` DESC LIMIT 1");$data = mysqli_fetch_array($get_settings); echo "<img src='.".$data['default_header']."' width='933'  border='0' / >";?></div>
      <!---  <div id="menu-conteinter"><?php require_once "../includes/site/menu.php"; ?></div> -->
        <div id='sides'>
           
            <div id="center-side" style='height:150px;color:#666;width:324px;margin-left:254px;border:0px solid #ccc;' align='right'>
               
					 <form method='post' action=''>
					 Потребител 
						<input type='text' name='username' value="<?php echo $_COOKIE['adm_user'];?>" maxlength='50'/> <br/>
					 Пaрoла
						<input type='password' name='password' value="<?php echo $_COOKIE['adm_pass'];?>" maxlength='50'/>
							<br />
					<div  align='left' style='margin-left:110px;'> <button type='submit' name='logme-as-admin'>Вход в системата</button> </div>
					<div align='center'>
						<?php
						if(isset($_POST['logme-as-admin']))
						{
						   $username = trim(htmlspecialchars($_POST['username']));
						   $password = trim(htmlspecialchars($_POST['password']));
						   
						   $real_user = mysqli_query($_db,"SELECT * FROM `users` WHERE `username`='$username' AND `password`='".md5($password)."' ");
						   if(mysqli_num_rows($real_user) == 1)
						   {
					
									  $row = mysqli_fetch_array($real_user);
									  $_SESSION['user'] = $row;
									  $_SESSION['is_logged'] = true;
									  header("Location: ./");
									  exit;
							
							}
							else
								{
								  error("Няма такъв потребител !");
								  exit;
								}
						}
						?>
						  </div>
					</form>
			 <div id="clear"></div>																	
            </div>
          
        <div id="clear"></div>
    </div>
</div>
</body>
</html>