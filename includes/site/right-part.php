		<div id='servers' class='drag'>
				<div id='panel-top'>Сървари</div>
				<div id='panel-bottom'>
				
				<?php include "lgsl/lgsl_module.php";?>
		<!----
						<div style="float:left;width:100px;height:100px;border:1px solid #000;margin-right:5px;"> 
						<img src="./images/no-server-image.png" width='100' border='0' />
						</div> 
						<div style='color:#666;'>
						IP: <b>169.254.138.23</b><br />
						Играчи: 14 / 32 <br />
						Карта: <b>de_dust2</b><br />
						Статус: <b style='color:darkgreen;'>Онлайн</b>
						</div>

		  ---->
								<div id="clear"></div>
								
				</div>
		</div>

			<!-- REKLAME -->
		<div id='reclame' class='drag'>
				<div id='panel-top'>Реклама</div>
				<div id='panel-bottom' align='center'>
				<?php
				  $rand_banner = mysqli_fetch_array(mysqli_query($_db,"SELECT `url`,`alt`,`image` FROM  `banners` WHERE `razmer`='120x240' AND `show`='true' ORDER BY rand() LIMIT 1"));
				  echo "<a href='".$rand_banner['url']."'><img src='".$rand_banner['image']."'  width='120'  title='".$rand_banner['alt']."' alt='".$rand_banner['alt']."' border='0' /></a>";
				?>
				</div>
		</div>
			<!-- REKLAME -->

		<div id='statistics' class='drag'>
			<div id='panel-top'>Статистика</div>
			<div id='panel-bottom'>
			<?php
			 // Фолямото броене започва .. :D
			 $users = mysqli_num_rows(mysqli_query($_db,"SELECT `id` FROM `users` ")); //  Колко потребителя
			 $online = mysqli_num_rows(mysqli_query($_db,"SELECT `id` FROM `users` WHERE `timestamp` > '".(time()-1*60)."' ")); //  Колко потребителя
			 $news = mysqli_num_rows(mysqli_query($_db,"SELECT `id` FROM `news` ")); //  Колко новини
			 
			 //  Броим сърварите .. 
			 $server_file = "./lgsl/lgsl_servers.txt"; // пътя до файла
			 $fo = fopen($server_file,"r"); //отварям файла .. да пречета записите
			 $servers = @fread($fo,@filesize($server_file)); // прочитам го целия .. 
			 fclose($fo); // и го затвярям .. 
			 $servers = explode("\n",$servers); // разделям сърварите  
			 $servers = count($servers)-1; // и ги броя .. :Д
			 
			 // Последния потребител
			 $last_user = mysqli_fetch_array(mysqli_query($_db,"SELECT `username` FROM `users` ORDER BY `id` DESC LIMIT  1"));
			 $last_user = $last_user['username'];
			 ?> 	
				   <div style='padding:5px;font-size:11px;font-family:Arial;'>Новини: <b><?php echo $news;?></b> </div>
					<div style='padding:5px;font-size:11px;font-family:Arial;'>Сървъри: <b><?php echo $servers;?></b> </div>
					<div style='padding:5px;font-size:11px;font-family:Arial;'>Oнлайн: <b><?php echo $online;?></b> </div>
					<div style='padding:5px;font-size:11px;font-family:Arial;'>Потребители: <b><?php echo $users;?></b> </div>
					<div style='padding:5px;font-size:11px;font-family:Arial;'>Най-нов: <b><a href='./?p=viewprofile&u=<?php echo $last_user;?>'><?php echo $last_user;?></a></b> </div>
					
					
					
			</div>
		</div>



