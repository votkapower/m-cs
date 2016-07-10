<?php
error_reporting(E_ERROR | E_PARSE);
ob_start();
require_once "functions.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="./styles/css.css" type="text/css" />
<script type="text/javascript" language="javascript" src="../scripts/jquery-1.8.2.min.js"></script>
<script type="text/javascript" language="javascript" src="../scripts/rcm.js"></script>
<title>Инсталация на системата от Димитър Папазов [ voTkaPoweR ]</title>
</head>
<body>
	<div id='body-warrper'>
	     
		<div id='main-conteinerr'>
		
				
		         <div>	
					<?php
					  $conf_file = "../conf.php"; 
					  if(file_exists($conf_file)) // Ако има създаден кофинг
					  {
					     
						  include $conf_file; // Добавям  Кофинка
						  if(mysqli_query($_db,"SELECT `id` FROM `site-settings")) // Ако има ДБ
						  {
						    include "./install-steps/step3.php"; // Стъпка 3
						  }
						  else
							  {
							   include "./install-steps/step2.php"; // Стъпка 2
							  }
	
					}
					else
						{
						 include "./install-steps/step1.php";// Стъпка 1
						}
					  
					?>
				 </div>
				
				
		</div>

	</div>
	<div style='margin-top:10px;font-family:Arial;font-size:10px;color:#ccc;' align='center'>* Ако евентуално имаш проблеми с инсталацията или имаш проблеми - <a href="https://www.youtube.com/playlist?list=PLRAQNYB3kdjz0DwrrJd7vzxnRqqqXZOiH">прегледай уроците</a> или в краен случай се свържи с мен и опиши всичк тук: <b><a href="http://vtk.pw/contacts?mcs-install-errors">http://vtk.pw/contacts</a></b>
	 <div style="margin-top:15px;text-align: center;">Коди дизайн: <a href="http://vtk.pw/">Димитър Папазов [voTkaPoweR]</a></div>
	</div>
    
</body>     
</html>     