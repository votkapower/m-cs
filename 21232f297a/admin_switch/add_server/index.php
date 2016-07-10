
<div id='panel-top'>Добавяне на сървар</div>
<div id='panel-bottom'>
		<form method='post' action=''>
							<b>Ip</b> на сървара <br/>
							<input type='text' name='server-ip' style='width:230px;' value='<?php echo $_POST['server-ip'];?>' maxlength='255' /> <br/>
							
						<span style='position:absolute; margin-left:250px; margin-top:-53px;'>	
							<b>Порт</b> на сървара<br/>
							<input type='text' name='server-port' style='width:100px;' maxlength='7' value='<?php echo $_POST['server-port'];?>' /> <br/>
					 </span>
					 <div id='clear'></div>
				 <button type='submit' name='add_new_server'>Добави сървара</button>
				 <?php
				  if(isset($_POST['add_new_server']))
				  {
				    $server_ip = $_POST['server-ip'];
				    $server_port = $_POST['server-port'];
				    
					if(empty( $server_ip) or empty($server_port))
					{
					  error("Попълни всички полета .. !");
					}
					else
						{
						   $file = "../lgsl/lgsl_servers.txt";
						   @unlink("../lgsl/lgsl_module_cache.dat");
						   $what = $server_ip.":".$server_port.":halflife2:on";
						   $fo = fopen($file,"a+");
						   fwrite($fo, "\n".$what."\n");
						   fclose($fo);
						   ok("Сървара е успешно добавен .. :)");
						   echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=".$_GET['p']."\" >";
						}
				  }
				 ?>
		</form>
</div>