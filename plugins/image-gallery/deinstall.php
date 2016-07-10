<?php
$plg_name = trim(htmlspecialchars($_GET['pnm']));
?>
<form method='post' action=''>

    Да изтрия  ли <b>Базата данни</b> ? <br />
	<select name='save-db'>
		<option value='true'>Да</option>
		<option value='false'>Не</option>
	</select>
	 <br /> <br />
	 
	Да изтрия ли <b>Снимките</b> (файловете) ? <br />
	<select name='save-images'>
		<option value='true'>Да</option>
		<option value='false'>Не</option>
	</select>
	
	<br />
	<input type='submit' id='button' name='deinstall-plugin' value="Деинсталирай !"/>
</form>
<?php
if(isset($_POST['deinstall-plugin']))
{

 $delete_db   = trim(htmlspecialchars($_POST['save-db'])); // true / false
 $delete_img  = trim(htmlspecialchars($_POST['save-images'])); // true / false
 
 if($delete_db == "true")
 {
   mysqli_query($_db,"DELETE FROM `image-gallery`"); // Delete *
   mysqli_query($_db'DROP TABLE IF EXISTS `image-gallery`') or die(mysqli_error());
 }
 
 if($delete_img == "true")
 {
  // Изразни и изтрик Папката със снимките
   if(is_dir("../images/image-gallery"))
   { 
    EmptyDir("../images/image-gallery");
	    $handle=opendir("../images/image-gallery");
		while (($file = readdir($handle))!==false) {
		
			if( is_dir("../images/image-gallery/".$file."/") && strlen($file) > 3)
			{
				EmptyDir("../images/image-gallery/".$file."/");
				rmdir("../images/image-gallery/".$file."/");
			}
		}
		closedir($handle);
   rmdir("../images/image-gallery");
   }
 }
// Изразни и изтрик Формата за качване
  @EmptyDir("../switch/upload");
  @rmdir("../switch/upload");
  
// Изразни и изтрик галерията
  @EmptyDir("../switch/gallery");
  @rmdir("../switch/gallery");

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Премахване на линковете от Потребителския панел и Менюто 


// ОТ менюто -> <a href='./?p=gallery'>".$link_in_the_menu ."</a>
$menu = file_get_contents("../includes/site/menu.php");
if(preg_match("/<a href='.\/\?p=gallery'>(.+)<\/a>/", $menu, $matches))
{
$menu = str_replace($matches[0], "", $menu);
//print_r($matches)."<br/><br/>";

$fo = fopen("../includes/site/menu.php", "w+"); // създавам файла, ако НЕ същестува
  fwrite($fo, $menu); // слагам новият линк
  fclose($fo); // затварям файла
}

// ОТ потребителския панел -> <a href='./?p=gallery'>".$link_in_the_menu ."</a>
$left_part = file_get_contents("../includes/site/left-part.php");
if(preg_match("/<span style='(.+)'><a href='.\/\?p=upload'>(.+)<\/a><\/span>/", $left_part, $matches))
{
$left_part = str_replace($matches[0], "", $left_part);

  $fo = fopen("../includes/site/left-part.php", "w+"); // създавам файла, ако НЕ същестува
  fwrite($fo, $left_part); // слагам новият линк
  fclose($fo); // затварям файла
}
$left_part = file_get_contents("../includes/site/left-part.php");
if(preg_match("/<a href='.\/\?p=upload'>(.+)<\/a>/", $left_part, $matches)){
$left_part = str_replace($matches[0], "", $left_part);
  $fo = fopen("../includes/site/left-part.php", "w+"); // създавам файла, ако НЕ същестува
  fwrite($fo, $left_part); // слагам новият линк
  fclose($fo); // затварям файла
}



			mysqli_query($_db,"UPDATE `plugins` SET `installed` = 'false' WHERE `plugin_name`='".$plg_name."'") OR DIE (mysqli_error()); // Упдате на ДБ-то
			
			 ok("Плъгина <u>$title</u>, бе успешно Де-инсталиран !");// казваме че  всичко е ОК
		  echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"1;URL=./?p=plugins\" >"; // Рефрешш ...


}

	