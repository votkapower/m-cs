
<form method='post' action=''>
    <div style='margin:5px;font-size:18px;font-family:Arial;'> Инсталиране на < <b style='font-size:18px;'>
	<?php 
		$pl = mysqli_fetch_array(mysqli_query($_db,"SELECT `title` FROM `plugins` WHERE `plugin_name`='$title'"));
		echo $pl['title'];
	?>
	</b> ></div>
	
	
    От <b>Къде</b> ще може да се БАН-ва<br/>
    <select name='ban-from'  style='width:300px;' > 
		<option value="admin-panel">Администраторският панел</option>
		<option value="user-admin-profile">Администраторските профили</option>
		<option value="both">И двете</option>
	</select>
	<br/>

    <b>Име</b> на линка<br/>
    <input type='text' name='link_name' style='width:350px;' value="Бан система" />
	<br/>

 <button id='button' type='submit' name='go_install'>Инсталирай</button>
<form>
<?php
/* К'во тряя да напрая ?
// Трябва да създам ДБ, в която да записвам Бановете 
// Трябва да направя страница в админ панела  за да имам достъп до Бан системата от  Менюто
// Трябва да направя страница в сайта - евентуално ако искаш .. 
*/

if(isset($_POST['go_install']))
{

													  
	//$ban_rights  = $_POST['ban-rights']; // admin , user
	$ban_from = $_POST['ban-from'];		 ////  admin-panel ,  user-admin-profile, both
	$link_name = $_POST['link_name'];		 ////  Бан система

			
		

//  1.  Да проверя каде `Сесията` иска  да сложи линк до Бан системата .. (в админ панела или в профила си /или и в двете/)
  if( $ban_from == "admin-panel" ) // тук в админ панела
  {
    // ДОбавяне на линк в Админ менюто -> Настройки 
	   $file = "./includes/control_menu.php"; // Сега сме в админ панела ..  
	   $cont =  file_get_contents($file); // взимам съдържанието на файла
	   $add_new_link = "<!--Added Link--><a href='./?p=ban-system'><img src='../images/icons/lock_add.png' width='16' > $link_name</a> <br/><!--Added Link-->\n<!----plugin-place-1--->"; // какво ще вкарваме във фахла
	   $cont = str_replace("<!----plugin-place-1--->", $add_new_link , $cont); // слагам линка до Бан системата на Място за плугини 1
	   
	   $fo = fopen($file, "w"); // отварям файла за писане и четене - > замества го
	   fwrite($fo , $cont); // слагам новото съдържание
	   fclose($fo); // затварям файла .. 
	   
	 // Добавяне на плугина към страниците на Админ панела -> admin_switch -> ban_system -> index.php
	   $new_page = "../plugins/ban-system/plugin-content.php"; // пътя до  темплейта на системата
	   $new_page_cont = file_get_contents($new_page); // вземи му  кода
	   
	   mkdir("./admin_switch/ban-system",0777);// направи папка в  admin_switch  ,с права 0777
	   
	// Поставяне на новия файл вътре ..   $new_page_cont
	  $no = fopen("./admin_switch/ban-system/index.php", "a+"); // Отваря файла за четене и писане, НОо ако НЕ съществува файла ГО създава
	  fwrite($no,	$new_page_cont); //  Слагаме в новия файл съдържанието на бан-системата
	  fclose($no); // ии .. го затваряме .. ест .
	  
	 // Админ панела е готов ..  {{{{sun}}}}
	   
  }
  else if( $ban_from == "user-admin-profile" ) // тук в профилите
  {
    // ДОбавяне на линк в Профила на потребителя -> Бан система
	   $file = "../includes/site/left-part.php"; // Лявата колон на сайта -> там е логин панела
	   $cont =  file_get_contents($file); // взимам съдържанието на файла
	   $add_new_link = "<!--Added Link--><a href='./21232f297a/?p=ban-system' target='_blank'>$link_name</a><!--Added Link-->\n<!--loged-as-admin-plugin-place-->"; // какво ще вкарваме във фахла
	   $cont = str_replace("<!--loged-as-admin-plugin-place-->", $add_new_link , $cont); // слагам линка до Бан системата на Място за плугини 1
	   
	   $fo = fopen($file, "w"); // отварям файла за писане и четене - > замества го
	   fwrite($fo , $cont); // слагам новото съдържание
	   fclose($fo); // затварям файла .. 

	 // Готово, поставихме линк в потребителския профил  ..  {{{{sun}}}}
	   
  }
  else if( $ban_from == "both" ) // и в профилите , и в админ панела
  {
    // Дoбавяне на линк в Профила на потребителя -> Бан система
	   $file = "../includes/site/left-part.php"; // Лявата колон на сайта -> там е логин панела
	   $cont =  file_get_contents($file); // взимам съдържанието на файла
	   $add_new_link = "<!--Added Link--><a href='./21232f297a/?p=ban-system' style='color:#ba8300;' target='_blank'>$link_name</a><!--Added Link-->\n<!--loged-as-admin-plugin-place-->"; // какво ще вкарваме във фахла
	   $cont = str_replace("<!--loged-as-admin-plugin-place-->", $add_new_link , $cont); // слагам линка до Бан системата на Място за плугини 1
	   
	   $fo = fopen($file, "w"); // отварям файла за писане и четене - > замества го
	   fwrite($fo , $cont); // слагам новото съдържание
	   fclose($fo); // затварям файла .. 

					// Готово, поставихме линк в потребителския профил  ..  {{{{sun}}}}
	 
// Дoбавяне на линк в Админ менюто -> Настройки 
	   $file = "./includes/control_menu.php"; // Сега сме в админ панела ..  
	   $cont =  file_get_contents($file); // взимам съдържанието на файла
	   $add_new_link = "<!--Added Link--><a href='./?p=ban-system'><img src='../images/icons/lock_add.png' width='16' > $link_name</a> <br/><!--Added Link-->\n<!----plugin-place-1--->"; // какво ще вкарваме във фахла
	   $cont = str_replace("<!----plugin-place-1--->", $add_new_link , $cont); // слагам линка до Бан системата на Място за плугини 1
	   
	   $fo = fopen($file, "w"); // отварям файла за писане и четене - > замества го
	   fwrite($fo , $cont); // слагам новото съдържание
	   fclose($fo); // затварям файла .. 
	   
// Добавяне на плугина към страниците на Админ панела -> admin_switch -> ban_system -> index.php
	   $new_page = "../plugins/ban-system/plugin-content.php"; // пътя до  темплейта на системата
	   $new_page_cont = file_get_contents($new_page); // вземи му  кода
	   
	   mkdir("./admin_switch/ban-system",0777);// направи папка в  admin_switch  ,с права 0777
	   
// Поставяне на новия файл вътре ..   $new_page_cont
	  $no = fopen("./admin_switch/ban-system/index.php", "a+"); // Отваря файла за четене и писане, НОо ако НЕ съществува файла ГО създава
	  fwrite($no,	$new_page_cont); //  Слагаме в новия файл съдържанието на бан-системата
	  fclose($no); // ии .. го затваряме .. ест .
	  
	 // Админ панела е готов ..  {{{{sun}}}}
	   
  }
  

// Заместваме  индекс-а защото трябва да добавим малко проверки 
$htaccess = "../.htaccess";
$cont = trim("

order allow,deny

#deny from ip-то-тука <- това е коментар
deny from 192.168.44.201
deny from 224.39.163.12

allow from all

");	 // съдържанието - което трябва да се добави в индекс.пхп
$fa = fopen($htaccess,"a+"); // създаваме  .htaccess файл, ако НЕ съществува
fwrite($fa,$cont); // слагаме новото му съдържание
fclose($fa); // затваряме файла
	
	
	 mysqli_query($_db,"UPDATE `plugins` SET `installed`='true' WHERE `plugin_name`='$title'") or DIE(mysqli_error($_db));
	 ok("Плъгина беше инсталиран успешно :)"); // казваме ,че плъгина Е инсталиран 
	echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=plugins\" >"; // презареждаме страницата
	}
