<?php
$plg_name = trim(htmlspecialchars($_GET['pnm']));
						   

		 $new_row = "<!--sitefxplugin--><script type='text/javascript' src='./scripts/bg-music-plugin.js'></script><!--sitefxplugin-->\n"; // kakwo e dobawil plugina 
		 
	
					    $file = "../index.php";
						$cont  =  file_get_contents($file);
						$cont  = str_replace($new_row, "", $cont);
						$fo = fopen($file,"w+");
						fwrite($fo,$cont);
						fclose($fo);
						
			$f = "../scripts/bg-music-plugin.js"; // maham suzdadeniq fail
			if( file_exists($f) ) { @unlink($f); @unlink($f); }
			
			$f1 = "../jw-player.swf"; // maham suzdadeniq fail
			if( file_exists($f1) ) { @unlink($f1); @unlink($f1); }
			
			mysqli_query($_db,"UPDATE `plugins` SET `installed` = 'false' WHERE `plugin_name`='".$plg_name."'") OR DIE (mysqli_error()); // РЈРїРґР°С‚Рµ РЅР° Р”Р‘-С‚Рѕ
			
			 ok("РџР»СЉРіРёРЅР° <u>$title</u>, Р±Рµ СѓСЃРїРµС€РЅРѕ Р”Рµ-РёРЅСЃС‚Р°Р»РёСЂР°РЅ !");// РєР°Р·РІР°РјРµ С‡Рµ  РІСЃРёС‡РєРѕ Рµ РћРљ
		  echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"1;URL=./?p=plugins\" >"; // Р РµС„СЂРµС€С€ ...
		