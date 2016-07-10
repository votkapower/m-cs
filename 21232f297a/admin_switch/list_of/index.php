<?php
$what = trim(htmlspecialchars(trim($_GET['w'])));
if(!$what || strlen($what) < 2) { $what = "news";}
if( $what == "news")
{
  $panel_title = " Новините ";
  $head_title = "Новини";
  $database = "news";
  
}
else if($what == "polls")
	{
	 $panel_title = " Анкетите";
	 $head_title = "Анкети";
	 $database = "poll";
	}
	else if($what == "servers")
		{
		 $panel_title = " Сървърите";
		 $head_title = "Сървъри";
		 $database = ""; /// няма ДБ .. тука ще ги изкарвам от файл .. 
		}
		else if($what == "menu_links")
			{
			 $panel_title = " Линковете в меюто";
			 $head_title = "Линкове в меюто";
			 $database = "";/// няма ДБ .. тука ще ги изкарвам от файл .. 
			}
			else if($what == "banners")
				{
				 $panel_title = " Банерите";
				 $head_title = "Банери";
				 $database = "banners";
				}
				else if($what == "users")
					{
					 $panel_title = " Потребителите";
					 $head_title = "Потребители";
					 $database = "users";
					}
?>
<div id='panel-top'>Списък със <?php echo  $panel_title;?> </div>
<div id='panel-bottom'>
<div style='background:#540303;color:#160000;text-shadow:1px 1px #660202;padding:5px 3px;font-family:Arial;'><?php echo $head_title;?> <span style='float:right;'>Промени / Изтрий</span></div>
		<?php
		 switch ($what) {
		 
		  case "news":
				$news_q = mysqli_query($_db,"SELECT * FROM `news` ORDER BY `id` DESC ");
				$news_n = mysqli_num_rows($news_q);
				while($n = mysqli_fetch_array($news_q))
				{
				 $i++;
				  echo "<div style='padding:5px;'><b>$i</b>.<b>".$n['title']."</b><span style='float:right;'><a href='./?p=edit&w=news&i=".$n['id']."' style='color:green;' >Редактирай</a> / <a href='./?p=delete&w=news&i=".$n['id']."'>Изтрий</a></span></div>";
				}
		  break;	

		  
		  
		  case "polls":
				$polls_q = mysqli_query($_db,"SELECT * FROM `poll` ORDER BY `id` DESC ");
				$polls_n = mysqli_num_rows($polls_q);
				while($p = mysqli_fetch_array($polls_q))
				{
				 $i++;
				  echo "<div style='padding:5px;'><b>$i</b>.<b>".$p['vapros']."</b><span style='float:right;'><a href='./?p=edit&w=polls&i=".$p['id']."'  style='color:green;' >Редактирай</a> / <a href='./?p=delete&w=polls&i=".$p['id']."'>Изтрий</a></span></div>";
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
				$banners_q = mysqli_query($_db,"SELECT * FROM `banners` ORDER BY `id` DESC ");
				$banners_n = mysqli_num_rows($banners_q);
				while($b = mysqli_fetch_array($banners_q))
				{
				 $i++;
				  echo "<div style='padding:5px;'><b>$i</b>.<b style='font-size:12px;color:#ccc;'>".$b['title']."</b> <span style='font-size:9px;'> / от ".maketime($b['time_added'])." /  от: <b style='font-size:9px;'>".$b['author']."</b></span> <span style='float:right;'><a href='./?p=edit&w=banners&i=".$b['id']."'  style='color:green;' >Редактирай</a> / <a href='./?p=delete&w=banners&i=".$b['id']."'>Изтрий</a></span></div>";
				}
		  break;
		    
		  case "users":
				$users_q = mysqli_query($_db,"SELECT * FROM `users` ORDER BY `id` ASC ");
				$users_n = mysqli_num_rows($users_q);
				while($u = mysqli_fetch_array($users_q))
				{ 
				 $i++;
				  $markup  = "";
				  if($u['type'] == "admin" ) { $markup  = "<img src='../images/icons/admin.gif' width='32' boredr='0' />";}
				  echo "<div style='padding:5px;'><b>$i</b>.<b style='font-size:12px;color:#ccc;'>".$u['username']." $markup </b><span style='float:right;'><a href='./?p=edit&w=users&i=".$u['id']."' style='color:green;' >Редактирай</a> / <a href='./?p=delete&w=users&i=".$u['id']."'>Изтрий</a></span></div>";
				}
		  break;
		  
		 
		 }
		?>
		 
		
</div>