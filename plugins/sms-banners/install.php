<form method='post' action=''>
    <div style='margin:5px;font-size:18px;font-family:Arial;'> Инсталиране на < <b style='font-size:18px;'>
	<?php 
		$pl = mysqli_fetch_array(mysqli_query($_db,"SELECT `title` FROM `plugins` WHERE `plugin_name`='$title'"));
		echo $pl['title'];
	?>
	</b> ></div>
	
    <b>Заглавие</b> на страницата<br/>
	 <input type='text' name='page-title' value="Мобио - Смс банери" style='width:455px;'  />
	<br/>

  <b>Ид</b> на услугата ( servID )<br/>
	 <input type='text' name='servid' value="" style='width:155px;'  />
	<br/>
	
  <b>Номер</b> на услугата<br/>
	 <input type='text' name='phone' value="" style='width:155px;' maxlength='7'  />
	<br/>
	
  <b>Какво</b> трябва да пишат потребителите в SMS-а ?<br/>
	 <input type='text' name='text' value="" style='width:355px;' maxlength='100'  />
	<br/>
	
	<b>Цена</b> на SMS-a: <br/>
			<select name='sms-price' style='width:155px;'>	
				<option>0.30 ст.</option>
				<option>0.60 ст.</option>
				<option>1.20 лв.</option>
				<option>2.40 лв.</option>
				<option>4.80 лв.</option>
				<option>6.00 лв.</option>
				<option>12.00 лв.</option>
			<select>
	<br/>
	
	<b>Времетраене</b> на рекламата: <br/>
			<select name='duration' style='width:155px;'>	
				<option value="7">7 дена</option>
				<option value="14">14 дена</option>
				<option value="30">30 дена</option>
				<option value="60">60 дена</option>
				<option value="999999">Постоянно</option>
			<select>

	<br/>
		

 <button id='button' type='submit' name='go_install'>Инсталирай</button>
<form>
<?php
if(isset($_POST['go_install']))
{

													  
	$wpage_title  = trim($_POST['page-title']); // Мобио - смс банери
	$servID = trim($_POST['servid']); // ИД на услугата
	$number = trim($_POST['phone']); // 1964 или нещо такова
	$text = trim($_POST['text']); // pay m-cs banner или нещо такова
	$price = trim($_POST['sms-price']); // Цена -> 0.30 - 12.00 лв.
	$dni = trim($_POST['duration']); // за колко време ще стои рекламата в сайта
	if( $dni > 60){ $dni = "9 999 999 дни";}else{ $dni = $dni." дни";}
	$duration = trim($_POST['duration'] * 86400) + time(); // за колко време ще стои рекламата в сайта

	 $page_sms_text = nl2br("
	 <center><b style='color:darkred;'>Важно !</b></center>
	 
	 За да ползвате услугата \"СМС реклама\", Вие трябва да изпратите СМС с текст <b  class='sms-pay' >". $text ."</b> на номер <b  class='sms-pay' >". $number ."</b>. След успешно пращане на СМС-а, Вие ще получите обратно КОД, който трбва да въведете в поленцетo \"СМС код\" отдоло и да потвърдите чрез натискане на бутона \"Давай\". 
	 
	  -  <b>При успех</b> - рекламата Ви ще бъде добавена до 3 мин. в сайта. Вашата реклама ще е валидна до <b>".$dni."</b> от днес.
	  
	  -  <b>При грешка</b> - трябва да <a href='./?p=contacts'>съобщите на администратора</a> на сайта, като му дадете полученият код, за да го провери и да оправи проблема .
	  
		
	 <span style='float:right;'>Цена на услугата: <b class='sms-pay' >".$price."</b> с ДДС</span>
	 
	 
	 ");
		
      // razmeri -> 120x240','468x60
	 $code = "
	  <div id='panel-top'>".$wpage_title ."</div>
	  <div id='panel-bottom'>
		   <style type='text/css'>
			b.sms-pay { line-height:30px; padding:2px 7px; background:#f8f8f8; color: darkred; font-family: Arial; font-size:12px;}
		   </style>
	   <div id='sms-text' style='padding:5px; border-bottom:1px dashed darkred;margin-bottom:10px;'>". $page_sms_text ."</div>
	   
			<form method='post' action=''>
			 
			<label>
			 <b>Линк</b> до банера: <br /> <input type='text' name='image-url' style='width:350px;' value=\"http://твоят-сайт.com/images/моят-банер.jpg\" />
			</label>
			
				<br />
			 
			<label>
			 <b>Линк</b> до сайта:  <br />   <input type='text' name='sait-url' style='width:350px;'   value=\"http://твоят-сайт.com/\" />
			</label>
			
			
				<br />
			 
			<label>
			 <b>Размер</b> на банера:  <br />  <select name='image-size'><option value='120x240'>120px шир. на 240px вис.</option><option value='468x60'>468px шир. на 60px вис.</option></select>
			</label>
			
			
			
				<br />
			 
			 
			<label>
			 <b>СМС</b> код:  <br />  <input type='text' name='sms-code' maxlength=\"10\" />
			</label>

			
				<br />
			 
			 
			  <input type='submit'  name='add-my-sms-banner'  id='button' value=\"Давай\" />
			

			
			</form>
	   <?php
	   
	   if(isset(\$_POST['add-my-sms-banner']))
	   {
			\$site_url = trim(htmlspecialchars(\$_POST['sait-url']));
			\$image_url = trim(htmlspecialchars(\$_POST['image-url']));
			\$image_size = trim(htmlspecialchars(\$_POST['image-size']));
			\$itype = strtolower(trim(end(explode(\".\",\$image_url))));
			\$sms_code = trim(htmlspecialchars(\$_POST['sms-code']));
			\$time = time();
			\$duration  =  ".((trim($_POST['duration']) * 86400) + time()).";
			if(\$_SESSION['is_logged'] == \"true\"){ \$author = \$_SESSION['user']['username'];  }else{ \$author = \$_SERVER['REMOTE_ADDR']; }
	   
		if(strlen(\$site_url) < 7)
		{
		  error(\"Трябва да въведеш ЛИНК до сайта, до който искаш банера да води !\");
		}
		else if(strlen(\$image_url) < 10  AND ( \$itype != \"jpg\"  OR  \$itype != \"png\" OR  \$itype != \"gif\" ) )
			{
			error(\"Трябва да въведеш ЛИНК до снимката на банера и той да е от следните формати - jpg, png или gif !\");
			}
			   else	
					{
					   
								function mobio_checkcode(\$servID, \$code, \$debug=0)
								{

									\$res_lines = file(\"http://www.mobio.bg/code/checkcode.php?servID=\$servID&code=\$code\");

									\$ret = 0;
									if(\$res_lines) {

										if(strstr(\"PAYBG=OK\", \$res_lines[0])) {
											\$ret = 1;
										}else{
											if(\$debug)
												echo \$line.\"\n\";
										}
									}else{
										if(\$debug)
											echo \"Unable to connect to mobio.bg server.\n\";
										\$ret = 0;
									}

									return \$ret;
								}
								
								if(@fopen(\$image_url,'r'))
								{
								  \$iname = end(explode('/',\$image_url));
								  \$c = file_get_contents(\$image_url); //вземам снимката
								  \$fo = fopen(\"./images/banners/\".\$iname.\".jpg\", 'w+');
								  fwrite(\$fo, \$c);
								  fclose(\$fo);
								}
					
							
								if(@mobio_checkcode(\$servID, \$sms_code) == 1)
								{
								     mysqli_query(\"INSERT INTO `banners` (`title`,`image`,`time_added`,`time-end`,`author`,`razmer`,`alt`,`url`,`show`)VALUES('СМС банер - \$author (код: ВЕРЕН) ','\$d','\$time','\$duration','\$author','\$image_size','Посети този сайт - няма да съжеляваш !', '\$site_url','true')\") OR DIE(mysqli_error());
								   
								   ok(\"Готово, вашата реклама ще бъде видима до 3-4 мин. :)\");
								   
								}
								else
									{
									
									 if(@fopen(\$image_url,'r'))
									 {
									    mysqli_query(\"INSERT INTO `banners` (`title`,`image`,`time_added`,`time-end`,`author`,`razmer`,`alt`,`url`,`show`)VALUES('СМС банер - \$author (код: Грешен (провери го !))','\$d','\$time','\$duration','\$author','\$image_size','Посети този сайт - няма да съжеляваш !', '\$site_url','false')\") OR DIE(mysqli_error());
									  }
									   error('Кода, който въведе е невалиден или изтекъл. Ако не е така - съобщи на администратора !');
									}
					
					}
		   
	   }
	   
	   ?>
	  </div>
	 ";
// Създай нова папка ако НЕ съществува и сложи вътре файл -> index.php със съдържание -> $code (т'ва отгоре)
		$dir = "switch/sms-banners"; 
		if( !is_dir("../".$dir) ) { mkdir("../".$dir, 0777); }
		
		$f1 = fopen("../".$dir."/index.php", "w+");  // създавам файла, ако НЕ същестува, a ако съществува -> ГО ЗАМЕСТВАМ
		fwrite($f1, $code);// слагам съдържанието
		fclose($f1);// затварям файла
		
// Създай  линк в менюто
	  $link = "\n<a href='./?p=sms-banners'>". $wpage_title ."</a>";  // линка
	  $f2 = fopen("../includes/site/menu.php", "a+"); // създавам файла, ако НЕ същестува
	  fwrite($f2, $link); // слагам новият линк
	  fclose($f2); // затварям файла
	  
	// Готово ... 
			
	mysqli_query($_db,"UPDATE `plugins` SET `installed`='true', `menu_url`='".addslashes($link)."' WHERE `plugin_name`='$title'") or DIE(mysqli_error());
	ok("Плъгина беше инсталиран успешно :)");
	echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=plugins\" >"; // 
	}
