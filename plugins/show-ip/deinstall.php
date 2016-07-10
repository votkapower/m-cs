<?php
$plg_name = trim(htmlspecialchars($_GET['pnm']));
						   
		
			
			
			$file = "../includes/site/menu.php";
			$cont = file_get_contents($file); // взимам всички линкове
			$p = "<!--IP-plugin--><span style='float:right;font-size:11px;'>IP: <?php echo \$_SERVER['REMOTE_ADDR'];?></span><!--IP-plugin-->\n";
			$cont = str_replace($p, "", $cont); // заменям  линка с  празно място :D
			
			$fo = fopen($file, "w"); // Отварям файла
			fwrite($fo,	$cont ); // Слагам новото(промененото)  съдържание
			fclose($fo); // затварям файла ..
			
			
			
			
			mysqli_query($_db,"UPDATE `plugins` SET `installed` = 'false' WHERE `plugin_name`='".$plg_name."'") OR DIE (mysqli_error()); // Упдате на ДБ-то
			
			   ok("Плъгина <u>$title</u>, бе успешно Де-инсталиран !");// казваме че  всичко е ОК
			  echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"1;URL=./?p=plugins\" >"; // Рефрешш ...