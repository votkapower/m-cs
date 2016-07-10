
<div id='panel-top'>Добавяне на линк в меюто</div>
<div id='panel-bottom'>
		<form method='post' action=''>
							<b>Тескт</b> на линка <br/>
							<input type='text' name='link-text' style='width:200px;' value='<?php echo $_POST['link-text'];?>' maxlength='100' /> <br/>
							
						<span style='position:absolute; margin-left:220px; margin-top:-53px;'>	
							 До къде ще <b>води</b> линка ?<br/>
							<input type='text' name='link-url' style='width:230px;' maxlength='255' value='' /> <br/>
					 </span>
					 
						<span style='position:absolute; margin-left:470px;margin-top:-53px;'>	
							 Ако е до <b>страница от сайта</b> избери от тук<br/>
							<select  name='link-url2' style='width:200px;'>
								<?php
								 $dir = "../switch/";
								 $handle = opendir($dir);
								 while(($file = readdir($handle)) != false)
								 { 
								   if($file != "." && $file != ".." && $file != "index.php" )
								   {
								   
								   
								      $q = mysqli_query($_db,"SELECT `title` FROM `pages` WHERE `url`='$file' LIMIT 1");
									  $n = mysqli_num_rows($q);
									  $pTitle = "";
									  
										   if($n == 1){
											 $r = mysqli_fetch_array($q);
											 $pTitle = " - ".$r['title'];
										   }
										   
								   echo "<option value='./?p=".$file."'>".$file.$pTitle."</option>";
								   }
								 }
								?>
							</select>
							<br/>
					</span>
					 <div id='clear'></div>
				 <button type='submit' name='add_new_link'>Добави линка</button>
				
				 <?php
				  if(isset($_POST['add_new_link']))
				  {
				    $link_text = trim(htmlspecialchars($_POST['link-text']));
				    $link_url  = trim(htmlspecialchars($_POST['link-url']));
				    $link_url2 = trim(htmlspecialchars($_POST['link-url2']));
				    
					if(empty(  $link_text ) && empty( $link_url ))
					{
					  error("Попълни всички полета .. !");
					}
					 else
						{
						   if ( !empty($link_text) && empty($link_url)) {  $link_url = $link_url2; }
						   $file = "../includes/site/menu.php";
						   $what = "<a href='".$link_url."'>".$link_text."</a>\n";
						   $fo = @fopen($file,"a+");
						   @fwrite($fo,$what);
						   @fclose($fo);
						   ok("Линка е успешно добавен към останалите .. :)");
						   echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=".$_GET['p']."\" >";
						}
				  }
				 ?>
		</form>
</div>