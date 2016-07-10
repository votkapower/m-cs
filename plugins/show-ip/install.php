<?php
    
		$txt_in_menu = "IP:";
		$plug_name = $title; // Imeto na stranicata .. [		 a-z A-Z 0-9 - _		]
				// Добавям линк до страницата в Менюто .. 
						  $file = "../includes/site/menu.php";
						   $what_link = "<!--IP-plugin--><span style='float:right;font-size:11px;'>".$txt_in_menu." <?php echo \$_SERVER['REMOTE_ADDR'];?></span><!--IP-plugin-->\n";
						   $fo = fopen($file,"a+");
						   fwrite($fo,$what_link);
						   fclose($fo);
						   					   
	  mysqli_query($_db,"UPDATE `plugins` SET `installed` = 'true'  WHERE `plugin_name`='$plug_name'") or DIE(mysqli_error());
	 ok("Плъгина беше инсталиран успешно :)");
	  echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=plugins\" >"; //  refresh ..

