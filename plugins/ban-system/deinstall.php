<?php
$plg_name = trim(htmlspecialchars($_GET['pnm']));
						   
// Първо да премахнем линка от Потребителския панел
$user_link = "<!--Added Link--><a href='./21232f297a/?p=ban-system' target='_blank'>$link_name</a><!--Added Link-->\n<!--loged-as-admin-plugin-place-->"; //  в профила на Сесията
 
 //  ПРЕМАХВАНЕ на линк  ОТ Профила на потребителя -> Бан система
		$file = "../includes/site/left-part.php"; // Лявата колон на сайта -> там е логин панела
	    $cont =  file_get_contents($file); // взимам съдържанието на файла
		preg_match("/<!--(.*)--><a href='(.*)' target='(.*)'>(.*)<\/a>\<!--(.*)-->/",$cont, $matches); // търся за подобен линк по дадени критерии
		$link = $matches[0]; // the link
		$cont = str_replace($link, "", $cont); // изтривам линка
		$fo = fopen($file, "w"); // Отварям файла за писане и заместване
		fwrite($fo, $cont); // замествам съдържанието му с новото -> без линка
		fclose($fo); // и го затварямм .. 

// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
// Сега да премахнем линка от Админ панела :)
$adm_link = "<!--Added Link--><a href='./?p=ban-system'><img src='../images/icons/lock_add.png' width='16' /> $link_name</a> <br/><!--Added Link-->\n<!----plugin-place-1--->"; //в админ панела

 // ПРЕМАХВАНЕ на линк от Админ менюто -> Настройки 	
	   $file = "./includes/control_menu.php"; // Сега сме в админ панела ..  
	   $cont =  file_get_contents($file); // взимам съдържанието на файла
	   preg_match("/<!--(.*)--><a href='(.*)'><img src='(.*)' width='(.*)' > Бан система<\/a> <br\/><!--(.*)-->/",$cont, $matches); // търся за 
	   $adm_lnk = $matches[0]; // the ilinkkk
	   $cont = str_replace($adm_lnk, "" , $cont); // МАХАМ линка  Бан системат ОТ Място за плугини 1
	   
		$fo = fopen($file, "w"); // отварям файла за писане и четене - > замества го
		fwrite($fo , $cont); // слагам новото съдържание
		fclose($fo); // затварям файла .. 
	  
      
	// Премахване на създадената папка и файл
	  @EmptyDir("./admin_switch/ban-system");// изправане на папката
	  @rmdir("./admin_switch/ban-system");// премахване и на папката

	  $old_bans = file_get_contents("../.htaccess");
	  $old_bans = str_replace("order allow,deny", "\n",  $old_bans);
	  $old_bans = str_replace("#deny from ip-то-тука <- това е коментар", "\n",  $old_bans);
	  $old_bans = str_replace("deny from", "\n",  $old_bans);
	  $old_bans = str_replace("allow from all", "\n",  $old_bans);
	  
	  // направи нов файл, в който да са записане баннатите ИП-та
	  $ba = fopen("../баннати-ип-та.txt","w"); // prawi 1 fail
	  fwrite($ba,trim($old_bans)); // заместа съдържанеето му
	  fclose($ba); // ии затварям го 
	  
	 // Махаме и htaccess файла за да не стоят бановете и така .. 
	  @unlink("../.htaccess"); // Премахваме htaccess файла 
	
	
			mysqli_query($_db,"UPDATE `plugins` SET `installed` = 'false' WHERE `plugin_name`='".$plg_name."'") OR DIE (mysqli_error($_db)); // Упдате на ДБ-то
			
			 ok("Плъгина <u>$title</u>, бе успешно Де-инсталиран !");// казваме че  всичко е ОК
		  echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"1;URL=./?p=plugins\" >"; // Рефрешш ...
