<form method='post' action=''>
    <div style='margin:5px;font-size:18px;font-family:Arial;'> Инсталиране на < <b style='font-size:18px;'>
	<?php 
		$pl = mysqli_fetch_array(mysqli_query($_db,"SELECT `title` FROM `plugins` WHERE `plugin_name`='$title'"));
		echo $pl['title'];
	?>
	</b> ></div>
	
    <b>Заглавие</b> на страницата<br/>
	 <input type='text' name='page-title' value="Мобио - Смс админ" style='width:455px;'  />
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
	 
	 За да ползвате услугата \"СМС Админ\", Вие трябва да изпратите СМС с текст <b  class='sms-pay' >". $text ."</b> на номер <b  class='sms-pay' >". $number ."</b>. След успешно пращане на СМС-а, Вие ще получите обратно КОД, който трбва да въведете в поленцетo \"СМС код\" отдоло и да потвърдите чрез натискане на бутона \"Давай\". Вие получаване <u>пълни права във всички сървари</u> !
	 
	  -  <b>При успех</b> - заявката Ви ще бъде записана в сайта и ще имате правата си до 24 часа. Вашите права ще са валидни до <b>".$dni."</b> от дата на активиране.
	  
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
			 <b>Ник</b> в играта:  <br />   <input type='text' name='game-nick' style='width:350px;'  />
			</label>
			
			
				<br />
			 
			<label>
			 <b>Парола</b> в играта:  <br />  <input type='text' name='game-password' style='width:350px;'  />
			</label>
			
			
			
				<br />
			 
			 
			<label>
			 <b>СМС</b> код:  <br />  <input type='text' name='sms-code' maxlength=\"10\" />
			</label>

			
				<br />
			 
			 
			  <input type='submit'  name='add-my-sms-admin'  id='button' value=\"Давай\" />
			
				
			
			</form>
	   <?php
	   
	   if(isset(\$_POST['add-my-sms-admin']))
	   {
			\$game_nick = trim(htmlspecialchars(\$_POST['game-nick']));
			\$game_password = trim(htmlspecialchars(\$_POST['game-password']));
			\$sms_code = trim(htmlspecialchars(\$_POST['sms-code']));
			\$time = time();
			\$duration  =  ".((trim($_POST['duration']) * 86400) + time()).";
			if(\$_SESSION['is_logged'] == \"true\"){ \$author = \$_SESSION['user']['username'];  }else{ \$author = \$_SERVER['REMOTE_ADDR']; }
	   
		if(strlen(\$game_nick) < 3)
		{
		  error(\"Трябва да въведеш НИК в играта, с който искаш да бъдеш админ!\");
		}
		 else if(strlen(\$game_password) < 3)
			{
			error(\"Трябва да въведеш ПАРОЛА в играта, с която ще може да влизаш като админ !\");
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
								
								
								
								if(mobio_checkcode(\$servID, \$sms_code) == 1)
								{
								
								\$msg  = \" Здравейте, 
								 Аз ( \$author ) пратих СМС за да стана админ във вашите сървари.
								  - Моят ник за играта е : <b>\$game_nick</b>
								  - Моята парола за играта е : <b>\$game_password</b>
								  - Моят СМС код е : <b>\$sms_code</b> - ВЕРЕН
								  
								  
								  <b>* трябва да му дадеш пълни парва над всички сървари  !</b>
								\";
								
								  contact_admin(\"СМС АДМИН - \".\$author, $msg);
								   
								   ok(\"Готово, вашата реклама ще бъде видима до 3-4 мин. :)\");
								   
								}
								else
									{
									 
								\$msg  = \" Здравейте, 
								 Аз ( \$author ) пратих СМС за да стана админ във вашите сървари.
								  - Моят ник за играта е : <b>\$game_nick</b>
								  - Моята парола за играта е : <b>\$game_password</b>
								  - Моят СМС код е : <b>\$sms_code</b> - ГРЕШЕН
								  
								  
								  <b>* трябва да провериш дали е пратил СМС от мобио.бг и ако е партил да му дадеш парва !</b>
								\";
								
								  contact_admin(\"СМС АДМИН - \".\$author, $msg);
									   error('Кода, който въведе е невалиден или изтекъл. Ако не е така - съобщи на администратора !');
									}
									
									
					
					}
		   
	   }
	   
	   ?>
	  </div>
	 ";
// Създай нова папка ако НЕ съществува и сложи вътре файл -> index.php със съдържание -> $code (т'ва отгоре)
		$dir = "switch/sms-admin"; 
		if( !is_dir("../".$dir) ) { mkdir("../".$dir, 0777); }
		
		$f1 = fopen("../".$dir."/index.php", "w+");  // създавам файла, ако НЕ същестува, a ако съществува -> ГО ЗАМЕСТВАМ
		fwrite($f1, $code);// слагам съдържанието
		fclose($f1);// затварям файла
		
// Създай  линк в менюто
	  $link = "\n<a href='./?p=sms-admin'>". $wpage_title ."</a>";  // линка
	  $f2 = fopen("../includes/site/menu.php", "a+"); // създавам файла, ако НЕ същестува
	  fwrite($f2, $link); // слагам новият линк
	  fclose($f2); // затварям файла
	  
	// Готово ... 
			
	mysqli_query($_db,"UPDATE `plugins` SET `installed`='true', `menu_url`='".addslashes($link)."' WHERE `plugin_name`='$title'") or DIE(mysqli_error());
	ok("Плъгина беше инсталиран успешно :)");
	echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=plugins\" >"; // 
	}
