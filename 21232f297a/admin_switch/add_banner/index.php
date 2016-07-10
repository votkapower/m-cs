
<div id='panel-top'>Добавяне на банер</div>
<div id='panel-bottom'>
		<form method='post' action=''>
							<b>Заглавие</b> <br/>
							<input type='text' name='banner-title' style='width:200px;' value='' maxlength='100' /> <br/>
							
						<b>Тескт</b> на линка <br/>
							<input type='text' name='banner-alt' style='width:240px;' value='' maxlength='100' /> <br/>
							
						
							<b>Избери</b> банер<br/>
							<select  name='banner-image' style='width:200px;'>
								<?php
								 $dir = "../images/banners/";
								 $handle = opendir($dir);
								 while(($file = readdir($handle)) != false)
								 { 
								   if($file != "." && $file != ".." &&  $file != "Thumbs.db" && $file != "index.php" )
								   {
								   echo "<option value='./images/banners/".$file."'>".$file."</option>";
								   }
								 }
								?>
							</select><br/>
					
					 
					 До къде ще<b>води</b> <br/>
							<input type='text' name='banner-url' style='width:260px;' value='<?php echo $_POST['banner-url'];?>' maxlength='255' /> <br/>
							
						
						<b>Избери</b> размер<br/>
							<select  name='banner-size' style='width:200px;'>
								<option>120x240</option>
								<option>468x60</option>
							</select>
							<br/>
					 <div id='clear'></div>
				 <button type='submit' name='add_new_banner'>Добави банера</button>
				 <?php
				  if(isset($_POST['add_new_banner']))
				  {
				    $username = $_SESSION['user']['username'];
				    $banner_title = trim(htmlspecialchars($_POST['banner-title']));
				    $banner_alt = trim(htmlspecialchars($_POST['banner-alt']));
				    $banner_image = trim(htmlspecialchars($_POST['banner-image']));
				    $banner_url = trim(htmlspecialchars($_POST['banner-url']));
				    $banner_size = trim(htmlspecialchars($_POST['banner-size']));
					$time = time();

				    
					if(empty( $banner_title ) || empty( $banner_alt ) || empty( $banner_image ) || empty( $banner_url ) || empty( $banner_size ))
					{
					  error("Попълни всички полета .. !");
					}
					 else
						{
						   mysqli_query($_db,"INSERT INTO `banners` (`title`,`image`,`time_added`,`razmer`,`alt`,`url`,`author`)VALUES('$banner_title','$banner_image','$time','$banner_size','$banner_alt','$banner_url','$username')")or die(mysqli_error($_db));
						   ok("Банера е добавен успешно .. :)");
						   echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=".$_GET['p']."\" >";
						}
				  }
				 ?>
		</form>
</div>