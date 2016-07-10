
<div id='panel-top'>Адним панел - Добавки [ Plug-ins ]</div>
<div id='panel-bottom'>
<?php
$pln = htmlspecialchars(trim($_GET['pln']));
if(!$pln){ $pln = "list";}
switch ($pln)
{
case "list":
			 $dir = "../plugins";
			 $handle = opendir($dir);
			 $i=0;
				while (($plugin_f = readdir($handle))!== false) 
				{
					
					 if( strlen($plugin_f) > 3 && $plugin_f != "Thumb.db")
					 {
						 $i++;
						 $pl_info_file = $dir."/".$plugin_f."/info.txt";
						 $fo = fopen($pl_info_file, "r");
						 $plugin_info = fread($fo, filesize($pl_info_file));
						 fclose($fo);
						 $finded_rs = mysqli_query($_db,"SELECT * FROM `plugins` WHERE `plugin_name`='$plugin_f'");
						 $count = mysqli_num_rows($finded_rs);
						 $time = time();
						 
						  preg_match("/Автор: (.*)/", $plugin_info, $p_autor_matches);
						  preg_match("/Версия: ([0-9\.]+){0,10}/", $plugin_info, $p_vers_matches);
						  preg_match("/Име: (.+){0,".strlen($plugin_info)."}/", $plugin_info, $plugin_title);
						  preg_match("/Инфо: (.+){0,}/", $plugin_info, $pl_info);
						  $p_author = $p_autor_matches[1];
						  $p_version = $p_vers_matches[1];
						  $plugin_title = $plugin_title[1];
						  if(@file_exists("../switch/plugin-".$plugin_f."/index.php") OR @file_exists("../plugins/".$plugin_f."/install.php"))
						  {
							 if($count == 0) // `plugins` >>>>> `plugin_name`,`plugin_version`,`plugin_author`,`timestamp`,`installed`
							 {
							 
							  mysqli_query($_db,"INSERT INTO `plugins` (`plugin_name`,`title`,`plugin_version`,`plugin_author`,`timestamp`,`installed`)VALUES('".$plugin_f."','$plugin_title','$p_version','$p_author','$time','false')")or die(mysqli_error($_db));
							 }
						  }
						 $plugin_info = $pl_info[1];
?>

							<div onmouseover="$(this).next().css('background','#121212')" onmouseout="$(this).next().css('background','#333333')" style='background:#262424;padding:5px;color:#b5190e;font-family:Arial;border-bottom:1px solid #666;'>
								<b style='font-size:18px;'><?php echo $i.".".$plugin_title;?></b>
								<span style='float:right;color:#666;'>[
								<?php
								 $q = mysqli_fetch_array(mysqli_query($_db,"SELECT `installed` FROM `plugins` WHERE `plugin_name`='".$plugin_f."'"));
								 //echo $q['installed'];
								 if( $q['installed'] == 'false')
								 {
								?>
								<a href='./?p=plugins&pln=install&pnm=<?php echo $plugin_f;?>' style='color:green;'>Инсталирай</a> 
								<?php
								}
								else
									{
									?>
									<a href='./?p=plugins&pln=deinstall&pnm=<?php echo $plugin_f;?>'>Де-инсталирай</a>
									<?php
									}
									?>
								]</span>
							</div>
							<div onmouseover="this.style.background='#121212'" onmouseout="this.style.background='#333333'" style='background:#333;padding:5px;color:#ccc;font-size:11px;font-family:arial;border-bottom:0px solid #666;'>
								<i><?php echo nl2br($plugin_info);?></i>
								<div style='padding:0px 5px;margin-top:5px;'>
									<span>автор: <b style='font-size:9px;'><?php echo $p_author; ?></b></span>
									<span style='float:right;'>версия: <b style='font-size:9px;'><?php echo $p_version;?></b></span>
								</div>
							</div>
							
							<br>

<?php					 
					 }
					
				}

			closedir($handle);
break;

case "install":
	$title = trim(htmlspecialchars($_GET['pnm']));
	include "../plugins/".$title."/install.php";
break;

case "deinstall":
	$title = trim(htmlspecialchars($_GET['pnm']));
	include "../plugins/".$title."/deinstall.php";
break;
}
?>
</div>