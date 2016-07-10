<?php
$what = trim(htmlspecialchars(trim($_GET['w'])));
if(!$what || strlen($what) < 2) { $what = "news";}
if( $what == "news")
{
  $panel_title = " Новина";
}
else if($what == "polls")
	{
	 $panel_title = " Анкетa";
	}
	else if($what == "servers")
		{
		 $panel_title = " Сървърите";

		}
		else if($what == "menu_links")
			{
			 $panel_title = " Линковете в меюто";
			}
			else if($what == "banners")
				{
				 $panel_title = " Банер";
				}
				else if($what == "users")
					{
					 $panel_title = " Потребител";
					}
?>
<div id='panel-top'>Редактиране на <?php echo  $panel_title;?> </div>
<div id='panel-bottom'>
		<?php
		 switch ($what) {
		 
		  case "news":
		         $id = (int)$_GET['i'];
				$news_q = mysqli_query($_db,"SELECT * FROM `news`  WHERE `id` ='$id'");
				$news_n = mysqli_num_rows($news_q);
				$n = mysqli_fetch_array($news_q);
				
				  echo "<form method='post' action=''>
							<b>Заглавие</b> на новината <br/>
							<input type='text' name='news-title' style='width:500px;' value='".$n['title']."' maxlength='255' /> <br/>
							
							<b>Текст</b> на новината <br/>
							<textarea name='news-text'  style='width:500px;height:250px;' >".$n['text']."</textarea> <br/>
							
							<b>Автор</b> на новината <br/>
							<input type='text' name='news-author' style='width:150px;' maxlength='50' value='".$n['author']."' /> <br/>
						<span style='position:absolute; margin-left:350px; margin-top:-53px;'>	
							<b>Дата</b>  - <span style='font-size:9px;'>Ден . Месец . Година (с числа)</span><br/>
							<input type='text' name='news-date' style='width:150px;' maxlength='10' value='".date("d.m.Y",$n['timestamp'])."' /> <br/>
					 </span>
					 <div id='clear'></div>
				 <button type='submit' name='edit_my_news'>Промени новината</button>";
				 if(isset($_POST['edit_my_news']))
				 {
				    $id = (int)$_GET['i'];
				    $news_title = trim(htmlspecialchars($_POST['news-title']));
				    $news_text = trim(htmlspecialchars($_POST['news-text']));
				    $news_author = trim(htmlspecialchars($_POST['news-author']));
				    $news_date = trim(htmlspecialchars($_POST['news-date']));
					$exp = explode(".",$news_date);
					$day = $exp[0];// DAY
					$month = $exp[1];// MONTH
					$year = $exp[2];// YEAR
					$date = mktime(date("H"),date("i"),date("s"), $month,$day,$year); // H, I, S, MONTH,  DAY, YEAR
					if(empty($news_title) or empty($news_text) or empty($news_author) or empty($news_date))
					{
					  error("Попълни всички полета .. !");
					}
					else
						{
						   mysqli_query($_db,"UPDATE `news` SET `title`='$news_title',`text`='$news_text',`timestamp`='$date',`author`='$news_author' WHERE  id='$id' ");
						   ok("Новината е успешно променена .. :)");
						   echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=".$_GET['p']."&w=news&i=".$id."\" >";
						}
				}
		  break;	

		  
		  
		  case "polls":

		  echo "<form method='post' action=''>";	
				$id = (int)$_GET['i'];
				$polls_q = mysqli_query($_db,"SELECT * FROM `poll` WHERE `id`='$id' ");
				$polls_n = mysqli_num_rows($polls_q);
				$p = mysqli_fetch_array($polls_q);
				
				  echo "Въпрос<br/><input name='vapros' value='".$p['vapros']."' style='width:450px;'/> <br/> <hr/>";
				  $poll_otg = mysqli_query($_db,"SELECT * FROM `otgovori` WHERE `id_poll`='".$id."'");
				  while($otg = mysqli_fetch_array($poll_otg))
				  {
				   
				    echo "Отговор ".$otg['id']." <br/><input name='otgovor-".$otg['id']."' value='".$otg['otgovor']."' > <br/>";
				  }
		  echo "<button name='poll_edit' type='submit'>Едит</button>";
		  echo "</form>";
		  
		   if(isset($_POST['poll_edit']))
			{
			 $id = (int)$_GET['i'];
			 $vapros = trim(htmlspecialchars($_POST['vapros'])); 	 
			 mysqli_query($_db,"UPDATE `poll` SET `vapros`='$vapros' WHERE `id`='$id'")or die( mysqli_error($_db));
				$poll_otg = mysqli_query($_db,"SELECT * FROM `otgovori` WHERE `id_poll`='$id'");
				 while($otg = mysqli_fetch_array($poll_otg))
				  {
				   if(!empty( $_POST["otgovor-".$otg['id']] ))
					{
					  mysqli_query($_db,"UPDATE `otgovori` SET `otgovor` = '".$_POST["otgovor-".$otg['id']]."' WHERE `id`='".$otg['id']."' and `id_poll`='$id'") or die(mysqli_error($_db));
					}
				  }
		
				ok("Анкетата е успешно променена !");
				 echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"1;URL=./?p=list_of&w=polls\" >";
			}
		  
		  break;
		  

		
		  case "servers":
				$server_file = "../lgsl/lgsl_servers.txt";
				$fo = fopen($server_file, "r");
				$content = @fread($fo, @filesize($server_file));
				fclose($fo);
				echo "<br/><form method='post' action=''><textarea name='servers' style='width:400px;height:250px;' >$content</textarea> <br /> <button type='submit' name='edit-the-servers'> Едит </button></form>";
				if(isset($_POST['edit-the-servers']))
				{
				   $content = (trim($_POST['servers']));
				   unlink("../lgsl/lgsl_module_cache.dat");
				   $fo = fopen($server_file, "w+");
				   fwrite($fo, $content);
				   fclose($fo);
				   ok("Сървърите са успешно променени !");
				   echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=".$_GET['p']."&w=servers\" >";
				  
				}
		  break;
		  
		  
		  case "menu_links":
				$menu_file = "../includes/site/menu.php";
				$fo = fopen($menu_file, "r");
				$content = fread($fo, filesize($menu_file));
				fclose($fo);
				echo "<form method='post' action=''><textarea name='menu-links' style='width:400px;height:250px;' >$content</textarea> <br /> <button type='submit' name='edit-the-menu'> Едит </button></form>";
				if(isset($_POST['edit-the-menu']))
				{
				   $content = stripcslashes($_POST['menu-links']);
				   $menu_file = "../includes/site/menu.php";
				   @unlink($menu_file);
				   $fo = fopen($menu_file, "a+");
				   fwrite($fo, $content);
				   fclose($fo);
				   ok("Линковете в менюто са успешно променени !");
				   echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=".$_GET['p']."&w=menu_links\" >";
				  
				}
		  break;
		  
		  
		  
		    
		  case "banners":
		        $id = (int)$_GET['i'];
				$banners_q = mysqli_query($_db,"SELECT * FROM `banners` WHERE `id`='$id' ");
				$banners_n = mysqli_num_rows($banners_q);
				$b = mysqli_fetch_array($banners_q);
				?>
				<form method='post' action=''>
							<b>Заглавие</b> <br/>
							<input type='text' name='banner-title' style='width:200px;' value='<?php echo $b['title']; ?>' maxlength='100' /> <br/>
							
						<b>Тескт</b> на линка <br/>
							<input type='text' name='banner-alt' style='width:240px;' value='<?php echo $b['alt']; ?>' maxlength='100' /> <br/>
							
						
							<b>Избери</b> банер<br/>
							<select  name='banner-image' style='width:200px;'>
								<?php
								 $dir = "../images/banners/";
								 $handle = opendir($dir);
								 while(($file = readdir($handle)) != false)
								 { 
								   if($file != "." && $file != ".." &&  $file != "Thumbs.db" && $file != "index.php" )
								   { 
									 $selected = "";
								     if($b['image'] == "./images/banners/".$file.""){ $selected = "selected";}
								     echo "<option value='./images/banners/".$file."' $selected >".$file."</option>";
								   }
								 }
								?>
							</select><br/>
					
					 
					 До къде ще<b>води</b> <br/>
							<input type='text' name='banner-url' style='width:260px;' value='<?php echo $b['url'];?>' maxlength='255' /> <br/>
							
					 
					 <b>Добавил</b> <br/>
							<input type='text' name='banner-author' style='width:260px;' value='<?php echo $b['author'];?>' maxlength='255' /> <br/>
							
						
						<b>Избери</b> размер<br/>
							<select  name='banner-size' style='width:200px;'>
								<option <?php if($b['razmer'] == "120x240"){ echo "selected";}?>>120x240</option>
								<option <?php if($b['razmer'] == "468x60"){ echo "selected";}?>>468x60</option>
							</select>
							<br/>	
						
						<b>Показвай</b> банера<br/>
							<select  name='banner-show' style='width:200px;'>
								<option <?php if($b['show'] == "true"){ echo "selected";}?> value='true'>Да</option>
								<option <?php if($b['show'] == "false"){ echo "selected";}?> value='false'>НЕ</option>
							</select>
							<br/>
					 <div id='clear'></div>
				 <button type='submit' name='edit_banner'>Промени банера</button>
				<?php	
				if(isset($_POST['edit_banner']))
				  {
				    $id = (int)$_GET['i'];
				    $user = $_POST['banner-author'];
				    $title = trim(htmlspecialchars($_POST['banner-title']));
				    $alt = trim(htmlspecialchars($_POST['banner-alt']));
				    $image = trim(htmlspecialchars($_POST['banner-image']));
				    $url = trim(htmlspecialchars($_POST['banner-url']));
				    $size = trim(htmlspecialchars($_POST['banner-size']));
				    $show = trim(htmlspecialchars($_POST['banner-show']));

				    
					if(empty(  $user ) || empty(  $title ) || empty( $alt ) || empty( $image ) || empty( $url )|| empty( $show )|| empty( $size ))
					{
					  error("Попълни всички полета .. !");
					}
					 else
						{
						   mysqli_query($_db,"UPDATE `banners`  SET `title`='$title',`image`='$image',`razmer`='$size',`alt`='$alt',`url`='$url',`author`='$user',`show`='$show' WHERE `id`='$id'")or die(mysqli_error($_db));
						   ok("Банера е  успешно  променен .. :)");
						   echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=".$_GET['p']."&w=banners&i=$id\" >";
						}
				  }	
		
				break;
		  
		  
		  
		  
		  
		    
		  case "users":
		        $id = (int)$_GET['i'];
				$users_q = mysqli_query($_db,"SELECT * FROM `users` WHERE `id`='$id'");
				$users_n = mysqli_num_rows($users_q);
				$u = mysqli_fetch_array($users_q);
				if($u['type'] == "admin" ) { $selected1  = ""; $selected2='selected';}else{ $selected1  = 'selected'; $selected2=""; }
				 
				 echo "<form method='post' action=''>
							<b>Потребителско</b> име <br/>
							<input type='text' name='user-name' style='width:200px;' value='".$u['username']."' maxlength='255' /> <br/>

							<b>Парола</b>  <br/>
							<input type='text' name='user-pass' style='width:200px;' maxlength='7' value='' /> <span style='font-size:10px;font-family:arial;'> - Остави празно, ако няма да я променяш !</span> <br/>
						
							<b>Емейл</b>  <br/>
							<input type='text' name='user-email' style='width:200px;' value='".$u['email']."' maxlength='255' /> <br/>

						
							<b>Описание</b>  <br/>
							<textarea  name='user-desc' style='width:450px;height:120px;' >".$u['desc']."</textarea> <br/>

						
							<b>Права</b> <br/>
							<select name='user-type' >
								<option value='user' $selected1>Обикновенни</option>
								<option value='admin' $selected2>Администраторски</option>
							</select> <br/>
					
					 <div id='clear'></div>
					 <button type='submit' name='edit_user'>Едит потребителя</button>";
					 
				  if(isset($_POST['edit_user']))
				  {
				     $id = (int)$_GET['i'];
				     $username = trim(htmlspecialchars($_POST['user-name']));
				     $password = trim(htmlspecialchars($_POST['user-pass']));
				     $email = trim(htmlspecialchars($_POST['user-email']));
				     $desc = trim(htmlspecialchars($_POST['user-desc']));
				     $type = trim(htmlspecialchars($_POST['user-type']));
					 
					 if( empty($username) || empty($email) || empty($desc) || empty($type)  )
					 {
					    error("Попълни всичко.. ОСВЕН ПАРОЛАТА  !");
					 }
					 else{
					        if(empty($password))
							{
							  mysqli_query($_db,"UPDATE `users` SET `username`='$username', `email`='$email', `desc`='$desc',`type`='$type' WHERE `id`='$id'");
							}
							else	
								{
								  mysqli_query($_db,"UPDATE `users` SET `username`='$username',`password`='".md5($password)."', `email`='$email', `desc`='$desc',`type`='$type' WHERE `id`='$id'");
								}
								ok("Потребителя е успешно редактиран .. !");
								echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=".$_GET['p']."&w=users&i=$id\" >";
						 }
				  }
				
		  break;
		  
		 
		 }
		?>
		 
		
</div>