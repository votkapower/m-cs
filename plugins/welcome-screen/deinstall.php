<?php
$plg_name = trim(htmlspecialchars($_GET['pnm']));
						   

  
		$fname = "../welcome-screen.php";
			$sname = "./welcome-screen.php";
	
	
	

						$new_row = "// -- Tuk mqsto za proverki -- 
						   if(strlen(\$_GET['p']) < 1 OR !\$_GET['p']){ header(\"Location: ".$sname."\"); exit;}";
						
	
					    $file = "../index.php";
						$cont  =  file_get_contents($file);
						$cont  = str_replace($new_row, "", $cont);
						$fo = fopen($file,"w+");
						fwrite($fo,$cont);
						fclose($fo);
			
		
			if( file_exists($fname)) { @unlink($fname); @unlink($fname); }
			
			mysqli_query($_db,"UPDATE `plugins` SET `installed` = 'false' WHERE `plugin_name`='".$plg_name."'") OR DIE (mysqli_error()); // Упдате на ДБ-то
			
			 ok("Плъгина <u>$title</u>, бе успешно Де-инсталиран !");// казваме че  всичко е ОК
		  echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"1;URL=./?p=plugins\" >"; // Рефрешш ...
		