	<div id='login-panel' class='drag'>
			<div id='panel-top'>Логин</div>
			<div id='panel-bottom'>
			<?php
			 if($_SESSION['is_logged'] != true)
			{
			?>
				<form action="" method="post">
					Потребител<br />
					<input type='text' name='username' value="<?php echo $_COOKIE['adm_user'];?>"  maxlength="50"/>
					<br />
					Парола<br />
					<input type='password' name='password' value="<?php echo $_COOKIE['adm_pass'];?>"  maxlength="100" />
					<br />
					<button type='submit' name='log-me-in' >Вход</button>
					или <a href="./?p=register">регисрация</a>.
				</form>
			<?php

				 if(isset($_POST['log-me-in']))
					{
							$username = trim(htmlspecialchars($_POST['username']));
							$password = trim(htmlspecialchars($_POST['password']));
							$u_check = mysqli_num_rows(mysqli_query($_db,"SELECT `username` FROM `users` WHERE `username` = '".$username."' "));
							//if($u_check == 1)
						//	{
							   $login = mysqli_query($_db,"SELECT * FROM `users` WHERE `username` = '".$username."' AND `password` = '".md5($password)."' ")or die(error("Системна Грешка! Немога да те Логна! Опитай пак по-късно."));	
										 if(mysqli_num_rows($login) > 0 )
											{
													$row = mysqli_fetch_array($login);
													$_SESSION['user'] = $row;
													$_SESSION['is_logged'] = true;
													$referer = $_SERVER['HTTP_REFERER'];
													header("Location: ".$referer);
											}
											else
												{ 
												 
													error("Грешно <b>потребителско</b> име или <b>парола</b> !");	// WRONG PASSWORD OR USERNAME
												}
						//	}
						//	else
							//	{
							//	  error("Такъв потребител НЕ съществува !"); // NO SUCH USERNAME
						//		}
					}

			}
			else
				{
			?>  
			<div style="margin-bottom:5px;">Здр, <a href='./?p=viewprofile&u=<?php echo $_SESSION['user']['username'];?>'><?php echo $_SESSION['user']['username'];?></a></div>
			   <div id='clear'></div>
			  <div style='float:left;margin-right:5px;border:1px solid #000;'>
				<a href='./?p=settings' title='Кликни за да я промениш'><img src='<?php echo $_SESSION['user']['avatar'];?>' width='80px' border='0' alt='image'/></a>
			  </div>
			  
			  <div id='users-option-links'>
			  <?php if($_SESSION['user']['type'] == "admin"){?> 
				<a href="./21232f297a/" target="_balnk">Админ панел</a>



			

<!--loged-as-admin-plugin-place-->
			  <?php } ?>
				<a href="./?p=pms">Съобщения: <?php $pms = mysqli_num_rows(mysqli_query($_db,"SELECT `id` FROM `user-pms` WHERE `to_user`='".$_SESSION['user']['username']."' AND `readed`='0'")); $pms_total = mysqli_num_rows(mysqli_query($_db,"SELECT `id` FROM `user-pms` WHERE `to_user`='".$_SESSION['user']['username']."'")); echo $pms." / ".$pms_total;?></a>
			   <a href="./?p=forum&w=fromuser&u=<?php echo $_SESSION['user']['username'];?>">Моите форум теми: <?php $my_temi = mysqli_num_rows(mysqli_query($_db,"SELECT `id` FROM `forum-posts` WHERE `username`='".$_SESSION['user']['username']."'")); echo $my_temi;?></a>
			   <a href="./?p=settings">Настроики</a>
			   
<!--loged-as-user-plugin-place-->
			   <a href="./logout.php" id='button' class="exit">Изход</a>
			  </div>
			  
			  <div id='clear'></div>
			<?php
				}
			?>
			</div>
	</div>

	<div id="clear"></div>
	
	
	<div id='online-users' class='drag'>
		<div id='panel-top'>Кой е онлайн ?</div>
		<div id='panel-bottom'>
		<?php
		 $sega =  time() - 2*60; // 2 мин
		 $online_users = mysqli_query($_db,"SELECT `username` FROM `users` WHERE `timestamp` > '$sega'");
		 while($u = mysqli_fetch_array($online_users))
		 {
		   
		   echo "<div id='online_user' style='margin:0px; -4px'><a href='./?p=viewprofile&u=".$u['username']."'>".$u['username']."</a> <span style='float:right;'><img src='./images/icons/online.png' width='16' border='0' /></span></div>";
		 }
		 if(mysqli_num_rows($online_users) == 0)
		 {
		   echo "<div  align='center'> няма онлайн потребители .. </div>";
		 }
		?>
			
		</div>
	</div>

	<div id="clear"></div>
	
	<div id='poll-panel' class='drag'>
		<div id='panel-top'>Анкета</div>
		<div id='panel-bottom'>
		<?php
		 include 'conf.php';
	 	 $ip = $_SERVER["REMOTE_ADDR"];
   
        $poll_query = mysqli_query($_db, "SELECT * FROM `poll` ORDER BY `id` DESC LIMIT 1");
        $poll       = mysqli_fetch_array($poll_query);
        $poll_broi  = mysqli_num_rows($poll_query);
    
	    if ($poll_broi > 0) 
	    { // ако изобщо съществува анкета
	            $dali_si_glasuval = mysqli_num_rows(mysqli_query($_db, "SELECT `id` FROM `ips` WHERE `ip` = '$ip' AND `poll_id` = '" . $poll['id'] . "'"));
	                if ($dali_si_glasuval == 0) 
	                { 
	                     // проверяваме дали потребителя е гласувал. Ако не е му позволяваме да гласува
	                    if (isset($_POST['submit']) && isset($_POST['vote']) && is_numeric($_POST['vote'])) 
	                    { // малко защити :P
	                        $vote            = $_POST['vote'];
	                      
	                            mysqli_query($_db, "UPDATE `otgovori` SET `broi` = `broi` + 1 WHERE `id` = '$vote' LIMIT 1");
	                            mysqli_query($_db, "INSERT INTO `ips` (`poll_id`,`ip`) VALUES ('" . $poll['id'] . "','$ip')");
	                             $order_by =  "ORDER BY `id` DESC";
	                            if ($poll['podrejdane'] == 1) {
	                                $order_by = "ORDER BY `id` ASC";
	                            } // ако е избран тип стандартно подреждане
	                            elseif ($poll['podrejdane'] == 2) {
	                                $order_by = "ORDER BY `broi` DESC";
	                            } // ако е избран тип подреждане по гласове
	            

	                            $query          = mysqli_query($_db, "SELECT SUM(broi) as `kolko` FROM `otgovori` WHERE `id_poll` = '" . $poll['id'] . "' GROUP BY id_poll");
	                            $votes          = mysqli_fetch_array($query);
	                            $votes          = $votes['kolko'];
	                        ?>
	                        <b><?= $poll['vapros'] ?></b><br> 
	                        <table border="0" width="100%">
	                        <?php
	                            // изкарваме резултатите от анкетата 
	                            $query_otgovori = mysqli_query($_db, "SELECT * FROM `otgovori` WHERE `id_poll` = '" . $poll['id'] . "' $order_by");
	                            while ($row_otgovori = mysqli_fetch_array($query_otgovori)) 
	                            {
	                                $procent = $row_otgovori['broi'] * (100 / $votes); // смятаме процентите
	                                $procent = round($procent); // закръгляме ги
	                        ?>
	                        <tr><td><?= $row_otgovori['otgovor'] ?><div class="clear"></div><div style="margin-bottom: 5px;background: darkred; height: 10px;  width:<?php echo $procent;?>%; float:left;"></div><div class="clear"></div></td><td align="right"><?= $row_otgovori['broi'] ?>гл.</td></tr>
	                        <?php
	                            }
	                        ?>
	                        </table><br>
	                        <?php
	                    } 
	                    else 
	                        {
	                            
	                            $query_otgovori = mysqli_query($_db, "SELECT * FROM `otgovori` WHERE `id_poll` = '".$poll['id']."' ORDER BY `id` ASC");
	                            ?>
	                            <b><?= $poll['vapros'] ?></b><br><br>
	                            <form action="" method="post">
	                            <?php
	                            // тук извеждаме формата за гласуване с възможните отговори
	                            while ($row_otgovori = mysqli_fetch_array($query_otgovori)) 
	                            {
	                            ?>
	                            <label><input type="radio" name="vote" value="<?= $row_otgovori['id'] ?>"> <?= $row_otgovori['otgovor'] ?></label><br>
	                            <?php
	                            }
	                            ?>
	                            <button  id='button' type="submit" name="submit" >Гласувай</button>
	                            </form>
	                            <?php
	                        }
	            } 
	            else 
	            {
	             // ако е гласувал му извеждаме резултатите
	            	    
	                            $query          = mysqli_query($_db, "SELECT SUM(broi) as `kolko` FROM `otgovori` WHERE `id_poll` = '" . $poll['id'] . "' GROUP BY `id_poll`");
	                            $votes          = mysqli_fetch_array($query);
	                            $votes          = $votes['kolko'];
	                        ?>
	                        <b><?= $poll['vapros'] ?></b><br> 
	                        <table border="0">
	                        <?php
	                            // изкарваме резултатите от анкетата 
	                            $query_otgovori = mysqli_query($_db, "SELECT * FROM `otgovori` WHERE `id_poll` = '" . $poll['id'] . "' $order_by");
	                            while ($row_otgovori = mysqli_fetch_array($query_otgovori)) 
	                            {
	                                $procent = $row_otgovori['broi'] * (100 / $votes); // смятаме процентите
	                                $procent = round($procent); // закръгляме ги
	                        ?>
	                        <tr><td><?= $row_otgovori['otgovor'] ?><div class="clear"></div><div style="margin-bottom: 5px;background: darkred; height: 10px;  width:<?php echo $procent;?>%; float:left;"></div><div class="clear"></div></td><td align="right"><?= $row_otgovori['broi'] ?>гл.</td></tr>
	                        <?php
	                            }
	                        ?>
	                        </table>
	                        <?php
	            }
	            
	        
	    } else {
	        echo "Все още няма добавени анкети!"; // изкарваме съобщение, че няма такава анкета или изобщо не сме добавили
	    }
  		  ?>
			
		</div>	
	</div>

	<div id="clear"></div>
	
<div id='chatbox' class='drag'>
		<div id='panel-top'>Чат бокс</div>
		<div id='panel-bottom'>

			<form action="" method="post">
				<textarea maxlength="500" name='user-comment' id='chat-msg-insert-mini' style='width:220px;height:70px;'></textarea>
				<br />
				<button type='submit' name='write-that-in' >Напиши</button>
				<span style='float:right' id='emoes-linkster-mini'><a href='javascript:;' id='emoticons-shower-mini'>емотиконки</a></span>
			</form>
			<?php
			 if(isset($_POST['write-that-in']))
							{
							   if($_SESSION['is_logged'] == true)
										{
											
												$comment =  trim(htmlspecialchars($_POST['user-comment']));
												$username = $_SESSION['user']['username']; 	
												$time = time();
												if(strlen($comment) < 2)
												{
														error("Прекалено кратко мнение !");	
												}
												else if(strstr($comment,"asd")) // проверка за спам .. :)
												{
														error("Мнението ти е безсмисленно !");	 
												}
												else
															{
																 mysqli_query($_db,"SET NAMES utf8");
																	mysqli_query($_db,"INSERT INTO `chatbox` (`username`,`comment`,`timestamp`)VALUES('$username','$comment','$time')");
																	ok("Готово! Успешно написано.");
																	header("Location: ".$_SERVER['REQUEST_URI']);
															}
										}
										else
													{
													  error("Трабва да си логнат !");	
													}
							}
						?>
		   
				   <div id='chat-msg' >
				<?php
				 mysqli_query($_db,"SET NAMES utf8"); // Encoding Fix
				$chatbox_q = mysqli_query($_db,"SELECT `username`,`comment`,`timestamp` FROM `chatbox` ORDER BY `timestamp` DESC LIMIT ".CHATBOX_LIMIT); // Лимит 10 , но ти можеш да го махнеш .. :)
				$i=0;
				while($chat = mysqli_fetch_array($chatbox_q))
				{
				$i++;
				  $border_bottom = "";
				  if($i == CHATBOX_LIMIT) {$border_bottom = "style='border-bottom:0px;'"; }
				  echo "<div id='user-msg' $border_bottom >
				  <div id='user-and-date'>от <a href='./?p=viewprofile&u=".$chat['username']."'>".$chat['username']."</a> <span style='float:right;'> ".maketime($chat['timestamp'])."</span></div>
				  <div style='padding:5px;'>".emoticons($chat['comment'])."</div>
				  </div>";
				  
				}
				?>
			  </div>
		</div>
</div>
<div id="clear"></div>