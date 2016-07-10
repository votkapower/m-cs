<div id='panel-top'>Настроики на сайта </div>
<div id='panel-bottom'>

		
			
		<?php
		  FIX_ENCODING;
		  $get_settings = mysqli_query($_db,"SELECT * FROM `site-settings` ORDER BY `id` DESC LIMIT 1");
		  $sets_num = mysqli_num_rows($get_settings);
		  $data = mysqli_fetch_array($get_settings);
		  // $rata -> title 	keywords 	description 	publisher 	revisit 	encoding 	copyright  news_limit 	default_index_page   default_header
		?>
			
		<form method='post' action=''>
			<b>Заглавие</b> на сайта <br/>
			<input name='site-title' value="<?php echo $data['title'];?>" style='width:500px;' /> <br/>
			
			<b>Автор</b> на сайта <br/>
			<input name='site-author' value="<?php echo $data['publisher'];?>"  /> <br/>
			
			<b>Права</b> над сайта <br/>
			<input name='site-rights' value="<?php echo $data['copyright'];?>" /> <br/>
			
			Посещаване на <b>Гугъл бота</b> в сайта <br/>
			<input name='site-revisit' value="<?php echo $data['revisit'];?>" /> <br/>
			
			Страница по <b>подразбиране</b><br/>
			<select name='site-default-index-page' style='width:200px;'>
				<?php
				  $dir = "../switch/";
				  $handle = opendir($dir);
				  while(($file = readdir($handle)) != false)
				  {
				     if($file != "." && $file != ".." && $file != "Thumbs.db" && $file != "index.php")
					 {
					 
					  $q = mysqli_query($_db,"SELECT `title` FROM `pages` WHERE `url`='$file' LIMIT 1");
					  $n = mysqli_num_rows($q);
					  $pTitle = "";
					  
						   if($n == 1){
							 $r = mysqli_fetch_array($q);
							 $pTitle = " - ".$r['title'];
						   }
					   
						if($data['default_index_page'] == $file){ $selected = "selected"; }else{ $selected = ""; }
				       echo "<option value=\"".$file."\" $selected>".$file.$pTitle ."</option>";
	
					 }
	
				  }
				  closedir($handle);
				?>
			</select>
			<br/>
			
			<b>Ключови</b> думи на сайта <br/>
			<textarea name='site-keywords' style='width:500px;height:100px;'><?php echo $data['keywords'];?></textarea> <br/>
			
			
			<b>Описание</b> на сайта <br/>
			<textarea name='site-description' style='width:500px;height:70px;'><?php echo $data['description'];?></textarea> <br/>
			
			
			<b>Мах</b> новини <br/>
			<input name='site-max-news' style='width:50px;' value="<?php if($data['news_limit']) echo $data['news_limit']; else echo "5";?>" /> <br/>
			
			<Span style='position:absolute;margin-top:-54px;margin-left:80px;'>
				 <b>Чат</b> лимит  <br/>
				<input name='site-max-chatbox-msgs' style='width:50px;' value="<?php if($data['chatbox_limit']) echo $data['chatbox_limit']; else echo "10";?>" /> <br/>
			</span>	
			
			<Span style='position:absolute;margin-top:-55px;margin-left:160px;'>
			  <b>Хедър</b> на сайта<br/>
				<select name='site-default-header' style='width:200px;'>
				<?php
				  $dir = "../images/logo/";
				  $handle = opendir($dir);
				  while(($file = readdir($handle)) != false)
				  {
				     if($file != "." && $file != ".." && $file != "Thumbs.db" && $file != "index.php")
					 {
						if($data['default_header'] == "./images/logo/".$file){ $selected = "selected"; }else{ $selected = "";}
				       echo "<option  value=\"./images/logo/".$file."\" $selected >".$file."</option>";
					 }
	
				  }
				  closedir($handle);
				?>
			</select>
			</span>
			
			
			<Span style='position:absolute;margin-top:-55px;margin-left:370px;'>
			  <b>Стил</b> на сайта<br/>
				<select name='default-site-style' style='width:250px;' 
				onmousedown="$('.edit-style').fadeIn().attr('href','./?p=site_style&w=edit&title='+document.getElementById(this.value).value)"onClick="$('.edit-style').fadeIn().attr('href','./?p=site_style&w=edit&title='+document.getElementById(this.value).value)"onMouseOver="$('.edit-style').fadeIn().attr('href','./?p=site_style&w=edit&title='+document.getElementById(this.value).value)"onChange="$('.edit-style').fadeIn().attr('href','./?p=site_style&w=edit&title='+document.getElementById(this.value).value)">
				<?php
				  $dir = "../styles/my/";
				  $handle = opendir($dir);
				  while(($file = readdir($handle)) != false)
				  {
				    if($file != "." && $file != ".." && $file != "Thumbs.db" && $file != "index.php")
					{
				      if($data['default_site_style'] == "./styles/my/".$file){$selected = "selected";}else{$selected = "";}
				      echo "<option  value=\"./styles/my/".$file."\" $selected >".$file."</option>";
				    }
	
				  }
				  closedir($handle);
				?>
			</select> <a class='edit-style' id='button' href="javascript:;"  style='display:none;'>Редактирай</a>
			</span>
			
			<button name='save-web-settings' type='submit'>Запази</button> <button name='restart-web-settings' type='submit'>Върни фабричните настройки</button>
<?php
		// generira speciqlno INPUT pole .. 
 $dir = '../styles/my/';
	  $handle = opendir($dir);
	  while(($file = readdir($handle)) != false)
	  {
		if($file != "." && $file != ".." && $file != "Thumbs.db" && $file != "index.php")
		{
		 $file1 = $file;
		 $file1 = str_replace(".css","",$file1);
		  echo "<input type='hidden' value=\"".$file1."\" id=\"./styles/my/".$file."\" />";
		}

	  }
	  closedir($handle);
			
			 if(isset($_POST['save-web-settings']))
			 { 
			  // table -> site-settings
				 $site_title = trim($_POST['site-title']);
				 $site_author = trim($_POST['site-author']);
				 $site_rights = trim($_POST['site-rights']);
				 $site_revisit = trim($_POST['site-revisit']);
				 $site_keywords = trim($_POST['site-keywords']);
				 $site_desc = trim($_POST['site-description']);
				 
				 $site_default_index_page = trim(htmlspecialchars($_POST['site-default-index-page']));
				 $site_header_image = trim($_POST['site-default-header']);
				 $site_default_style = trim($_POST['default-site-style']);
				 $site_news_limit = (int)$_POST['site-max-news'];
				 $site_chatbox_limit = (int)$_POST['site-max-chatbox-msgs'];
				 
				 if(!empty($site_title) and  !empty($site_author) and  !empty($site_rights) and  !empty($site_revisit)  and  !empty($site_keywords)  and  !empty($site_desc) and  !empty($site_news_limit) and  !empty($site_default_style) and  !empty($site_header_image) and  !empty($site_chatbox_limit))
				  {
						 mysqli_query($_db,"UPDATE `site-settings` SET `title`='$site_title ',`keywords`='$site_keywords',`description`='$site_desc',`publisher`='$site_author',`revisit`='$site_revisit',`copyright`='$site_rights',`news_limit`='$site_news_limit',`chatbox_limit`='$site_chatbox_limit',`default_index_page`='$site_default_index_page',`default_site_style`='$site_default_style',`default_header`='$site_header_image'  WHERE `id`='1'");
						 ok("Настройките на сайта са успешно променени :)");
						 echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=".$_GET['p']."\" >";
				  }
				  else
					  {
					    error("Ако искаш сайта ти да стане популярен трябва да попълниш всички полета !");
					  }
			 }
			 else if(isset($_POST['restart-web-settings']))
			 {
			    mysqli_query($_db,"DELETE FROM `site-settings`");  // DELETE *
				mysqli_query($_db,"INSERT INTO `site-settings` (`id`)VALUES('1')"); // Insert new row .. :)
				 ok("Настройките на сайта бяха успешно рестартирани!"); // success
				echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=".$_GET['p']."\" >"; //refresh in 2 sec
 			 }
			?>
		</form>
		
</div>