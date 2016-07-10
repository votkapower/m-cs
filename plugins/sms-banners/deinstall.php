<?php
$plg_name = trim(htmlspecialchars($_GET['pnm']));
						   

  
	
// Премахни нова папка ако НЕ съществува и сложи вътре файл -> index.php със съдържание -> $code (т'ва отгоре)
		$dir = "switch/sms-banners"; 
		EmptyDir("../".$dir);
		@rmdir("../".$dir);
		
// Премахни  линка в менюто
	  $l = mysqli_fetch_array(mysqli_query($_db,"SELECT * FROM `plugins` WHERE `plugin_name`='".$plg_name."'") );
	  $link = stripslashes(stripcslashes($l['menu_url']));
	  
	 // echo $link." <br/>".mysqli_error();
	  
	  $file = "../includes/site/menu.php";
			$cont = file_get_contents($file); // взимам всички линкове
			$cont = str_replace($link, "", $cont); // заменям  линка с  празно място :D
			
			$f0 = fopen($file, "w+"); // Отварям файла
			fwrite($f0,	$cont ); // Слагам новото(промененото)  съдържание
			fclose($f0); // затварям файла ..
	  
// Готово ... 

			
			mysqli_query($_db,"UPDATE `plugins` SET `installed` = 'false' WHERE `plugin_name`='".$plg_name."'") OR DIE (mysqli_error()); // Упдате на ДБ-то
			
			 ok("Плъгина <u>$title</u>, бе успешно Де-инсталиран !");// казваме че  всичко е ОК
		  echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"1;URL=./?p=plugins\" >"; // Рефрешш ...
		