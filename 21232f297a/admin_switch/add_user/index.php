<div id='panel-top'>Добавяне на потребител</div>
<div id='panel-bottom'>
		<form method='post' action=''>
							<b>Потребителско</b> име <br/>
							<input type='text' name='new-user-name' style='width:200px;' value='<?php echo $_POST['new-user-name'];?>' maxlength='255' /> <br/>
							
						
							<b>Парола</b> <br/>
							<input type='text' name='new-user-pass' style='width:200px;' maxlength='7' value='<?php echo $_POST['new-user-pass'];?>' /> <br/>
						
							<b>Права</b> <br/>
							<select name='new-user-type' >
								<option value='user'>Обикновенни</option>
								<option value='admin'>Администраторски</option>
							</select> <br/>
					
					 <div id='clear'></div>
					 <button type='submit' name='add_new_user'>Добави потребителя</button>
				
		</form>
		 <?php
				  if(isset($_POST['add_new_user']))
				  {
				    $new_user_name = trim(htmlspecialchars($_POST['new-user-name']));
				    $new_user_pass = trim(htmlspecialchars($_POST['new-user-pass']));
				    $new_user_type = trim(htmlspecialchars($_POST['new-user-pass']));
					$user_num = mysqli_num_rows(mysqli_query($_db,"SELECT * FROM `users` WHERE `username` = '".$new_user_name."' "));
				    
					if(empty($new_user_name) or empty($new_user_pass) or empty($new_user_type))
					{
					  error("Попълни всички полета .. !");
					}
					else if( $user_num == 1 )
						{
						   error("Потребителя вече съществува !");
						}
						else
							{
						
							  mkdir("../user-avatars/".$new_user_name); // правим папка с името му..
							  make_thumb("../images/no-server-image.png", "../user-avatars/".$new_user_name."/".$new_user_name.".jpg", 100); // слагаме му дифаулт снимка 
							  $fo = fopen("../user-avatars/".$new_user_name."/index.php","a+"); // правим един файл 
							  fwrite($fo,"<?php \r header('Location: '.\$_SERVER['HTTP_REFERER']); \n exit; ");  // вътре слагаме препратка
							  @fclose($fo); // и го затваряме
							  mysqli_query($_db,"INSERT INTO `users` (`username`,`password`,`avatar`)VALUES('$new_user_name', '".md5( $new_user_pass)."','./user-avatars/".$new_user_name."/".$new_user_name.".jpg') ") or die(mysqli_error());// вкарваме резултатите в ДБ - то
							  ok("Потребителя е успешно добавен .. :)"); // казваме ,че всичко е ОК
							  echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=".$_GET['p']."\" >"; // резареждаме
							}
				  }
				 ?>
</div>