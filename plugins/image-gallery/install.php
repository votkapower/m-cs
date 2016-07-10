
<form method='post' action=''>
    <div style='margin:5px;font-size:18px;font-family:Arial;'> Инсталиране на < <b style='font-size:18px;'>
	<?php 
		$pl = mysqli_fetch_array(mysqli_query($_db,"SELECT `title` FROM `plugins` WHERE `plugin_name`='$title'"));
		echo $pl['title'];
	?>
	</b> ></div>
	
	
    <b>Кой</b> може да добавя снимки ?<br/>
    <select name='add-rights'  style='width:300px;' > 
		<option value="admins">Администраторите</option>
		<option value="users">Потребителите</option>
		<option value="all">Потребители И Администратори</option>
	</select>
	<br/>
	
	
    <b>Как</b> може да става добавянето ?<br/>
    <select name='way-to-add'  style='width:300px;' onchange="if(this.value == 'upload'){ $('#resize').show()} else{  $('#resize').hide()}"> 
		<option value="upload">Чрез качване на сникмата </option>
		<option value="link">Чрез директен линк до снимката</option>
	</select>
	
	
	<br/>
	
    <b>Име</b> на линка в менюто<br/>
    <input type='text' name='menu-link-name' style='width:350px;' value="Галерия" />
	<br/>

    <b>Име</b> на линка в потребителския/администраторския панел <br/>
    <input type='text' name='usercp-link' style='width:450px;' value="Качи снимка" />
	<br/>

 <button id='button' type='submit' name='go_install'>Инсталирай</button>
<form>
<?php

/* К'во трябва да направя ?
*   Да направя страница (галерия) , в която да се показват снимките  								-> 	 V
*   Да направя линк в администраторския и/или потребителски профил за добавяне на снимки			-> 	 V
*   Да напарвя страница (форма) за добавяне на самите снимки (от линк или от  компютъра)			-> 	 Х
*   Да създам линк в менюто за да може потребителя да се ориентира по-добре  						-> 	 V
*   Да създам БД, в която да записваме кой , кога  и как е качил дадена снимка .. ;) 				-> 	 V
*/

if(isset($_POST['go_install']))
{
  $who_can_upload		= trim(htmlspecialchars($_POST['add-rights'])); /// users / admins / all
  $way_to_upload 	    = trim(htmlspecialchars($_POST['way-to-add'])); // upload / link
  $allow_thumbnails 	= trim(htmlspecialchars($_POST['resize'])); // true / NULL
  $link_in_the_menu  	= trim(htmlspecialchars($_POST['menu-link-name'])); //  .... *
  $link_in_usercp  		= trim(htmlspecialchars($_POST['usercp-link'])); //  .... *
  
// Сложи начина на качване

if($way_to_upload  == "link")
{
	$f =  file_get_contents ("../plugins/image-gallery/upload-page.txt");
	$f = str_replace("\$way_to_upload = \"upload\"", "\$way_to_upload = \"".$way_to_upload."\"", $f);
	$f = str_replace("\$way_to_upload = \"link\"", "\$way_to_upload = \"".$way_to_upload."\"", $f);
	$fo = fopen("../plugins/image-gallery/upload-page.txt", "w+"); /// направо замествам файла
	fwrite($fo,$f); //  новот съдържание
	fclose($fo); // затарям файла ;)
}

// Направи нова База данни
  $sql = file_get_contents("../plugins/image-gallery/sql/sql.sql");
  mysqli_query($_db,$sql) or die(	error('Грешка при създаването на БД на линия: '. mysqli_error($_db) )	);
// Готово..
 
// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//Създай новата страница за листване на снимки
 $p_content = file_get_contents("../plugins/image-gallery/gallery-page.txt"); // взимам съдържанието на файла
 $p_content = str_replace("{{PLUGIN_TITLE}}", $link_in_the_menu , $p_content); // заменям  заглавието с името на линка в менюто

 if( !is_dir("../switch/gallery") )  { mkdir("../switch/gallery"); } // Създавам  папка ако НЕ съществува
 
  $fo = fopen("../switch/gallery/index.php", "a+"); // създавам файла, ако НЕ същестува
  fwrite($fo, $p_content); // слагам новото му съдържание
  fclose($fo); // затварям файла
 
// Готово... 
  
// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Създай  линк в менюто
$link = "<a href='./?p=gallery'>".$link_in_the_menu ."</a>\n"; 
 
  $fo = fopen("../includes/site/menu.php", "a+"); // създавам файла, ако НЕ същестува
  fwrite($fo, $link); // слагам новият линк
  fclose($fo); // затварям файла
// Готово ... 
   
// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Създай  линк в профила на потребителя / администратора / и двете
$link = "<a href='./?p=upload'>". $link_in_usercp ."</a>"; 
$lp_cont = file_get_contents("../includes/site/left-part.php");

  if($who_can_upload == "admins") //  users / admins / all
  {
  
    $lp_cont = str_replace("<!--loged-as-admin-plugin-place-->", $link . "\n<!--loged-as-admin-plugin-place-->",$lp_cont); //добавям новия линк -> АКО Е АДМИН
	
		$fo = fopen("../includes/site/left-part.php", "w"); // замествам файла .. 
		fwrite($fo, $lp_cont); // слагам новият линк
		fclose($fo); // затварям файла
		
  }
  else if( $who_can_upload == "users" )
	{
	
	 $lp_cont = str_replace("<!--loged-as-user-plugin-place-->", $link . "\n<!--loged-as-user-plugin-place-->",$lp_cont); //добавям новия линк -> ако НЕ е  админ
	
		$fo = fopen("../includes/site/left-part.php", "w"); // замествам файла .. 
		fwrite($fo, $lp_cont); // слагам новият линк
		fclose($fo); // затварям файла
		
	}
	else 
		{
		
		 ///  Пурво на потребителя даваме право да качва
		 $lp_cont = str_replace("<!--loged-as-user-plugin-place-->", "<span style='color:#66bf52;'>".$link . "</span>\n<!--loged-as-user-plugin-place-->",$lp_cont); //добавям новия линк -> ако НЕ е  админ
	
			$fo = fopen("../includes/site/left-part.php", "w"); // замествам файла .. 
			fwrite($fo, $lp_cont); // слагам новият линк
			fclose($fo); // затварям файла
		
		}

// Готово ... 
    
// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Създай страница с форма за качване
$upl_cont = file_get_contents("../plugins/image-gallery/upload-page.txt"); // Вземаме новата страница 

if( !is_dir("../switch/upload/")) {  mkdir("../switch/upload"); } //правим папка ако няма .. 
			$fo = fopen("../switch/upload/index.php", "a+"); // създавам файла .. 
			fwrite($fo, $upl_cont); // слагам новото съдържание
			fclose($fo); // затварям файла

// Готово  .. 
 
 
  
  
  
	
		mysqli_query($_db,"UPDATE `plugins` SET `installed`='true' WHERE `plugin_name`='$title'") or DIE(mysqli_error());
		ok("Плъгина беше инсталиран успешно :)"); // казваме ,че плъгина Е инсталиран 
		echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=plugins\" >"; // презареждаме страницата

}
