<?php
$plg_name = trim(htmlspecialchars($_GET['pnm']));
						   

		 $new_row = "<!--sitefxplugin--><script type='text/javascript' src='./scripts/site-fx.js'></script><!--sitefxplugin-->\n"; // kakwo e dobawil plugina 
		 
	
					    $file = "../index.php";
						$cont  =  file_get_contents($file);
						$cont  = str_replace($new_row, "", $cont);
						$fo = fopen($file,"w+");
						fwrite($fo,$cont);
						fclose($fo);
			
			$ff = "../scripts/site-fx.js";
			if( file_exists($ff)) { @unlink($ff); @unlink($ff); }
			
			mysqli_query($_db,"UPDATE `plugins` SET `installed` = 'false' WHERE `plugin_name`='".$plg_name."'") OR DIE (mysqli_error()); // Упдате на ДБ-то
			
			 ok("Плъгина <u>$title</u>, бе успешно Де-инсталиран !");// казваме че  всичко е ОК
		  echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"1;URL=./?p=plugins\" >"; // Рефрешш ...
		