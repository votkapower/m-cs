<div id='header'><b>Стъпка 1:</b> Връзка с Базата данни<span style='float:right;'>1 от 3</span></div>
<form method='post' action=''>
					
						<table cellpadding='3' cellspacing='3' border='0'>
						
						
							 <tr>
							   <td>
								 Сървър: <br/>
								 <input type='text' name='server_name' value='localhost' />
								</td>
								<td>
								<span id='info_text'> * тук обикновенно е <b>localhost</b> </span>
								</td>
							</tr>
							
						
							 <tr>
							   <td>
								 Потребител: <br/>
								 <input type='text' name='server_user' value='root' />
								</td>
								<td>
								<span id='info_text'> * тук обикновенно е <b>root</b>, а ако си на хостинг ще е друго ... </span>
								</td>
							</tr>
							
						
							 <tr>
							   <td>
								 Парола: <br/>
								 <input type='password' name='server_pass' value='' />
								</td>
								<td>
								<span id='info_text'> * Тук напиши паролата на <b>PHPMyadmin-a</b>, ако имаш де .. </span>
								</td>
						
							 <tr>
							   <td>
								 Име на Базата Данни: <br/>
								 <input type='text' name='server_db_name' value='m-cs' />
								 <br/>
								 <label>Базата данни ТРЯБВА да съществува !!! </label>
								</td>
								<td>
								<span id='info_text' style='margin-top:-13px;'> * Тук напиши  <b>името</b>  на <u><b>съществуваща</b></u> Базата Данни, с която сайта да осъществява връзка.. </span>
								</td>
							</tr>
							
							
							
						</table>	 
						<?php
if(isset($_POST['make_config']))
{
  $system_host = htmlspecialchars(trim($_POST['server_name']));
  $system_user = htmlspecialchars(trim($_POST['server_user']));
  $system_pass = htmlspecialchars(trim($_POST['server_pass']));
  $system_db_name = htmlspecialchars(trim($_POST['server_db_name']));
  $create_table = $_POST['create_server_db']; // true / NULL
  if( empty( $system_host ) )
  {
    error("Напиши си <b>Хоста</b>, или го остави <i>localhost</i>, ако си на локален хост.");
  }
 else if( empty( $system_user ) )
	  {
		  error("Напиши си <b>Потребителя</b>, или го остави <i>root</i>, ако си на локален хост.");
	  }
	 else if( empty(  $system_db_name ) )
		  {
			  error("Напиши <b>ДБ</b>-то, това е задължително !");
		  }
		  else
			  {

			  $serv = $system_host; // обикновенно е localhost
	$user = $system_user; // обикновенно е root
	$pass = $system_pass; // обикновенно е  празна , освен ако имаш парола на phpmyadmin-a
	$db = $system_db_name; // Името на ДБ-то / не променяй за да не си играеш да променяш и други работи по сайта ..  тва няма кой да го гледа .. ;) 
	$_db = mysqli_connect($serv,$user,$pass,$db) or die(" Не мога да се свържа с Сървъра! Въведени са грешни данни за Връзка с Базата данни, изтрий <b>conf.php</b>(ако съществъва) и инсталирай на ново !");
	mysqli_query($_db,"SET NAMES utf8"); // ENCODING FIX
 



	 $file = "../conf.php";
	 if(!file_exists($file))
	 {
					$fo = fopen($file, "a+");
				$cont = ("<?php
				\$serv = \"".$system_host."\"; // обикновенно е localhost
				\$user = \"".$system_user."\"; // обикновенно е root
				\$pass = \"".$system_pass."\"; // обикновенно е  празна , освен ако имаш парола на phpmyadmin-a
				\$db = \"".$system_db_name."\"; // Името на ДБ-то / не променяй за да не си играеш да променяш и други работи по сайта ..  тва няма кой да го гледа .. ;) 
				\$_db = mysqli_connect(\$serv,\$user,\$pass,\$db) or die(\" Не мога да се свържа с Сървъра! Въведени са грешни данни в <b>conf.php</b>  !\");
				
				mysqli_query(\$_db,\"SET NAMES utf8\"); // ENCODING FIX
				
				error_reporting(E_ERROR | E_PARSE);
				");
							
					fwrite($fo, $cont);
					fclose($fo);

					
					
					
					/// wmukwane na dolnata chast
				$fa = fopen( $file , "a+");
					
			    $cont_bottom = ("
			     
				
				/// Update looged user timestamp
				if(isset(\$_SESSION['is_logged'] ) && \$_SESSION['is_logged'] == true)
				{
				  \$time = time() + 2*60; // 2 мин на преде
				  \$ip = \$_SERVER['REMOTE_ADDR'];
				  mysqli_query(\$_db,\"UPDATE `users` SET `timestamp`='\$time' , `user_ip`='\$ip' WHERE  `username`='\".\$_SESSION['user']['username'].\"' \"); // ъпдейт ...
				}

				
				");
					fwrite($fa, $cont_bottom);
					fclose($fa);
					
					ok("Стъпка 1: Приключена успешно :)");
					$url="";
					echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=$url\" >"; //рефрешш след 2 сек.
					
		 }
		 else
			{
			 error("Вече съществува <b>Конфигурационен</b> файл !!");
			}
	  }

}
?>
<div style='float:right;'><button id='button' type='submit' name='make_config'>Напред &raquo;</button></div>
						<div class='clear'></div>
					</form>
					
