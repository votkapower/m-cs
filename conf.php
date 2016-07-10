<?php
				$serv = "localhost"; // обикновенно е localhost
				$user = "root"; // обикновенно е root
				$pass = ""; // обикновенно е  празна , освен ако имаш парола на phpmyadmin-a
				$db = "m-cs-utf8"; // Името на ДБ-то / не променяй за да не си играеш да променяш и други работи по сайта ..  тва няма кой да го гледа .. ;) 
				$_db = mysqli_connect($serv,$user,$pass,$db) or die(" Не мога да се свържа с Сървъра! Въведени са грешни данни в <b>conf.php</b>  !");
				
				mysqli_query($_db,"SET NAMES utf8"); // ENCODING FIX
				
				error_reporting(E_ERROR | E_PARSE);
				
			     
				
				/// Update looged user timestamp
				if(isset($_SESSION['is_logged'] ) && $_SESSION['is_logged'] == true)
				{
				  $time = time() + 2*60; // 2 мин на преде
				  $ip = $_SERVER['REMOTE_ADDR'];
				  mysqli_query($_db,"UPDATE `users` SET `timestamp`='$time' , `user_ip`='$ip' WHERE  `username`='".$_SESSION['user']['username']."' "); // ъпдейт ...
				}

				
				