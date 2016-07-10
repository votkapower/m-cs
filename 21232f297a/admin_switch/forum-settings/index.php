<div id='panel-top'>Настроики на вградения форум</div>
<div id='panel-bottom'>
		
			
		<?php
		  FIX_ENCODING;
		  $get_settings = mysqli_query($_db,"SELECT * FROM `forum-settings` ORDER BY `id` DESC LIMIT 1");
		  $sets_num = mysqli_num_rows($get_settings);
		  $data = mysqli_fetch_array($get_settings);
		  // $data -> 	id 	 use-forum    hide-locked-posts 	allow-user-to-edit-own-posts 	allow-quick-answer 
		?>
			
		<form method='post' action='' style='font-size:16px;font-family:Arial;'>
			<style type='text/css'>
				b { font-size:15px;}
			</style>
			
			
			
			<b>Използвай</b> вградения форум <br/><br/>
			<label style='margin-right:20px;'><input name='use-forum' type='radio' value='true'  <?php if($data['use-forum'] == "true") { echo "checked";}?> /> Да</label> 
			<label><input name='use-forum' type='radio' value='false' <?php if($data['use-forum'] == "false") { echo "checked";}?>> Не, искам <b>АЗ</b> да си вградя  свой форум</label> 
			
			
			<br/><br/>
			
			<b>Скривай</b> заключените теми <br/><br/>
			<label style='margin-right:20px;'><input name='hide-locked-posts' type='radio' value='true' <?php if($data['hide-locked-posts'] == "true") { echo "checked";}?>/> Да</label> 	
			
			<label><input name='hide-locked-posts' type='radio' value='false' <?php if($data['hide-locked-posts'] == "false") { echo "checked";}?> > Не</label> 
			
			<br/><br/>
			
			<b>Разреши</b> на потребителите да си редактират темите <br/><br/>
			<label style='margin-right:20px;'><input name='allow-user-to-edit-own-posts' type='radio' value='true' <?php if($data['allow-user-to-edit-own-posts'] == "true") { echo "checked";}?> /> Да</label> 	

			<label><input name='allow-user-to-edit-own-posts' type='radio' value='false' <?php if($data['allow-user-to-edit-own-posts'] == "false") { echo "checked";}?>> Не, искам само <b>АДМИНИСТРАТОРИ</b> да мога да редактират мнения</label> 
			
			<br/><br/>
			
			
			<b>Разреши</b> бързите отговори във форума <br/><br/>
			<label style='margin-right:20px;'><input name='allow-quick-answer' type='radio' value='true' <?php if($data['allow-quick-answer'] == "true") { echo "checked";}?> /> Да</label> 	<label><input name='allow-quick-answer' type='radio' value='false'  <?php if($data['allow-quick-answer'] == "false") { echo "checked";}?>> Не</label> 
			
			<br/><br/>
			
			
			<b>Усведоми</b> потребителя когато Администратор заключи негова тема <br/><br/>
			<label style='margin-right:20px;'><input name='alarm-users-when-admin-lock-post' type='radio' value='true' <?php if($data['alarm-users-when-admin-lock-post'] == "true") { echo "checked";}?> /> Да</label> 	<label><input name='alarm-users-when-admin-lock-post' type='radio' value='false'  <?php if($data['alarm-users-when-admin-lock-post'] == "false") { echo "checked";}?>> Не</label> 
			
			<br/><br/>
			
		
			
			<button name='save-forum-settings' type='submit'>Запази</button> 
				
<?php

			 if(isset($_POST['save-forum-settings']))
			 { 
			  // Всчиките връщат True / False !
			  $use_forum = $_POST['use-forum'];
			  $hide_locked_posts = $_POST['hide-locked-posts'];
			  $allow_user_to_edit_own_posts =  $_POST['allow-user-to-edit-own-posts'];
			  $allow_quick_answer = $_POST['allow-quick-answer'];
			  $alarm_users_when_admin_lock_post = $_POST['alarm-users-when-admin-lock-post'];
			  
			  if($use_forum == "false")
				{
					// ОТ менюто -> <a href='./?p=forum'>Форум</a>
					$menu = file_get_contents("../includes/site/menu.php");
					if(preg_match("/<a href='.\/\?p=forum'>(.+)<\/a>/", $menu, $matches))
					{
					$menu = str_replace($matches[0], "", $menu);
					//print_r($matches)."<br/><br/>";

				      $fo = fopen("../includes/site/menu.php", "w+"); // създавам файла, ако НЕ същестува
					  fwrite($fo, $menu); // слагам новият линк
					  fclose($fo); // затварям файла
					}
				}
				else
					{
					
							// ОТ менюто -> <a href='./?p=forum'>Форум</a>
							$menu = file_get_contents("../includes/site/menu.php");
							if(preg_match("/<a href='.\/\?p=forum'>(.+)<\/a>/", $menu, $matches))
							{
							$menu = str_replace($matches[0], "", $menu);
							//print_r($matches)."<br/><br/>";

							  $fo = fopen("../includes/site/menu.php", "w+"); // създавам файла, ако НЕ същестува
							  fwrite($fo, $menu); // слагам новият линк
							  fclose($fo); // затварям файла
							}
					
					
						  $new_link = "\n <a href='./?p=forum'>Форум</a> \n"; // Новият линк
						  $fo = fopen("../includes/site/menu.php", "a+"); // създавам файла, ако НЕ същестува
						  fwrite($fo, $new_link); // слагам новият линк
						  fclose($fo); // затварям файла
					}
					
				
					
				
				
				$c = mysqli_num_rows(mysqli_query($_db,"SELECT `id` FROM `forum-settings`"));
				if($c >= 1)
				{
				mysqli_query($_db,"UPDATE `forum-settings` SET `use-forum`='$use_forum',    `hide-locked-posts`='$hide_locked_posts',  	`allow-user-to-edit-own-posts`='$allow_user_to_edit_own_posts', 	`allow-quick-answer`='$allow_quick_answer' , 	`alarm-users-when-admin-lock-post`='$alarm_users_when_admin_lock_post' WHERE `id`='1' ");
				}
				else
					{
					mysqli_query($_db,"INSERT INTO `forum-settings` (`use-forum`, `hide-locked-posts`,`allow-user-to-edit-own-posts`,`allow-quick-answer`,`alarm-users-when-admin-lock-post`)VALUES('$use_forum','$hide_locked_posts', '$allow_user_to_edit_own_posts', '$allow_quick_answer','$alarm_users_when_admin_lock_post')");
					}
				
					ok("Промените бяха записани усшещно. :)");
				 echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"1;URL=./?p=".$_GET['p']."\" >";
			 }
			?>
		</form>
		
</div>