<?php 
require_once("../functions.php");
?>
<div id='panel-top'>Направи нова страничка</div>
<div id='panel-bottom'>
<?php
$w = htmlspecialchars(trim($_GET['w']));
if(!$w){ $w = "add";}
switch ($w)
{
case "add":				 
$n = rand(5,100); // някква стойност която да трансформира
$l = 10; //  колко брой символи  да върне
$url = randomname($n,$l);
?>

 <form method='post' action="">
    URL на страничката <br/>
    <input name='page_url'  readonly style='width:500px;' value="http://<?php echo $_SERVER['HTTP_HOST'];?>/?p=<?php echo $url; ?>"  />

	<br/>
	
	Заглавие на страничката <br/>
    <input name='page_title'   style='width:350px;' value="Моята страничка" maxlength="150"/>
	
	<br/>
	
	Съдържание на страничката <br/>
    <textarea name='page_text' style='max-height:10000px;max-width:690px;width:690px;height:350px;'></textarea>
	
	<button id='button' type='submit' name='make-the-new-page'>Направи новата страница</button>
 </form>
 
<?php
if(isset($_POST['make-the-new-page']))
{
  $page_title = trim(htmlspecialchars($_POST['page_title']));
  $page_text = trim(htmlspecialchars($_POST['page_text']));
  $who = $_SESSION['user']['username'];
  $time = time();
  
  if(strlen($page_title) < 3)
  {
    echo error("Трябва да въведеш заглавие на страницата !");
  } 
  else  if(empty($page_text))
  {
    echo error("Трябва да въведеш някакво съдържание на страницата !");
  }
  else
	{
		$what_link = addslashes("<a href='./?p=".$url."'>".$page_title."</a>");
	   mysqli_query($_db,"INSERT INTO `pages` (`url`,`title`,`text`,`timestamp`,`author`,`text_in_menu`)VALUES('$url','$page_title','$page_text','$time','$who','$what_link')") or die(mysqli_error($_db)); // вкарайй всичко в ДБ за всеки склучай ..
	 
	   
	   // Добавям линк до страницата в Менюто .. 
						   $file = "../includes/site/menu.php";
						   $fo = fopen($file,"a+");
						   fwrite($fo, stripcslashes(htmlspecialchars_decode(stripslashes($what_link))));
						   fclose($fo);
						   
	    // направи новата страница
	   $folder_name = $url;
	   $dir = "../switch/".$folder_name;
	   
	   mkdir($dir, 0777);
	   
	   $fo = fopen($dir."/index.php", "a+");
	   
	   $cont = "<div id='panel-top'>".$page_title."</div>\r
	   <div id='panel-bottom'>\r\r"
	  . htmlspecialchars_decode(stripcslashes(stripslashes($page_text))).
	  "\r\r\r</div>";
	   
	   fwrite($fo, $cont);
	   fclose($fo);
	   
	   // всичко е ок .. покажи го
	  echo ok("Новата страница вече е готова за ползване :)");
	  echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"1;URL=./?p=".$_GET['p']."&w=list\" >";
	}
  
}

break;

case "list":
 
  $q = mysqli_query($_db,"SELECT * FROM `pages` ORDER BY `timestamp` DESC");
  $i=0;
  while($r = mysqli_fetch_array($q))
  {
   $i++;
	echo "<div style='padding:5px;'><b>$i</b>.<b style='font-size:12px;color:#ccc;'>".$r['title']."</b> <span style='font-size:9px;'> / от ".maketime($r['timestamp'])." /  от: <b style='font-size:9px;'>".$r['author']."</b></span> <span style='float:right;'><a href='./?p=new_page&w=edit&url=".$r['url']."'>Редактирай</a> / <a href='./?p=new_page&w=delete&url=".$r['url']."'>Изтрий</a></span></div>";
 }

break;

case "delete":
	$url = trim(htmlspecialchars($_GET['url']));
	
	$r = mysqli_fetch_array(mysqli_query($_db,"SELECT `text_in_menu` FROM `pages` WHERE `url`='$url'"));
	mysqli_query($_db,"DELETE FROM `pages` WHERE `url`='$url'") or die(mysqli_error($_db));
	
	 //премахни стария линк от менюто .. 
	   
	   
			$file = "../includes/site/menu.php";
			$cont = file_get_contents($file); // взимам всички линкове
			$cont = str_replace(stripslashes($r['text_in_menu']), "", $cont); // заменям  линка с  празно място :D

			
			$fo = fopen($file, "w"); // Отварям файла
			fwrite($fo,	$cont ); // Слагам новото(промененото)  съдържание
			fclose($fo); // затварям файла ..
			
 // ПРЕМАХНИИИ страницата
	   $folder_name = $url;
	   $dir = "../switch/".$folder_name;
       EmptyDir($dir);
	   //unlink($dir."/index.php"); // delete нa директорията
	   rmdir($dir); // трийй я и нея
// всичко е ок .. покажи го
	  echo ok("Страницата бе изтрита успешно :)");
	  header("Location: ./?p=new_page&w=list");
			
	
break;

case "edit":
$url = trim(htmlspecialchars($_GET['url']));
$r = mysqli_fetch_array(mysqli_query($_db,"SELECT * FROM `pages` WHERE `url`='$url'"));

?>
	
	 <form method='post' action="">
    URL на страничката <br/>
    <input name='page_url'  readonly style='width:500px;' value="http://<?php echo $_SERVER['HTTP_HOST']; ?>/?p=<?php echo $r['url']; ?>"  /> &nbsp; <a href='/?p=<?php echo $r['url']; ?>'>Виж</a>

	<br/>
	
	Заглавие на страничката <br/>
    <input name='page_title'   style='width:350px;' value="<?php echo $r['title']; ?>" maxlength="150"/>
	
	<br/>
	
	Съдържание на страничката <br/>
    <textarea name='page_text' style='max-height:10000px;max-width:690px;width:690px;height:350px;'><?php echo $r['text']; ?></textarea>
	
	<button id='button' type='submit' name='edit-the-page'>Редактрай страницата</button>
 </form>
 
	
	
   <?php
   if(isset($_POST['edit-the-page']))
{
  $page_title = trim(htmlspecialchars($_POST['page_title']));
  $page_text = trim(htmlspecialchars($_POST['page_text']));
  $who = $_SESSION['user']['username'];
  $time = time();
  $url =  $r['url'];
  
  if(strlen($page_title) < 3)
  {
    echo error("Трябва да въведеш заглавие на страницата !");
  } 
  else  if(empty($page_text))
  {
    echo error("Трябва да въведеш някакво съдържание на страницата !");
  }
  else
	{
	
	$what_link = addslashes("<a href='./?p=$url'>".$page_title."</a>");
	  mysqli_query($_db,"UPDATE `pages` SET `title`='$page_title', `text`='$page_text',`text_in_menu`='$what_link' WHERE  `url`='$url'") OR DIE(mysqli_error($_db));
	   
	   //премахни стария линк от менюто .. 
	   
	   
			$file = "../includes/site/menu.php";
			$cont = file_get_contents($file); // взимам всички линкове
			$cont = str_replace(stripslashes($r['text_in_menu']), "", $cont); // заменям  линка с  празно място :D
			$cont = str_replace(stripslashes($what_link), "", $cont); // заменям  линка с  празно място :D
			
			$fo = fopen($file, "w"); // Отварям файла
			fwrite($fo,	$cont ); // Слагам новото(промененото)  съдържание
			fclose($fo); // затварям файла ..
			
			
	//тури линк от менюто .. 
	   
	   
			$file = "../includes/site/menu.php";
			$cont = file_get_contents($file); // взимам всички линкове
			$cont = stripcslashes(stripslashes($what_link)); // заменям  линка с  празно място :D
			
			$fo = fopen($file, "a+"); // Отварям файла
			fwrite($fo,	$cont ); // Слагам новото(промененото)  съдържание
			fclose($fo); // затварям файла ..
			
	   
	    // направи новата страница
	   $folder_name = $url;
	   $dir = "../switch/".$folder_name;
	   
	  if(!file_exists( $dir."/index.php" ))
	   {	
		mkdir($dir, 0777);
	   }
	   $fo = fopen($dir."/index.php", "w+");
	   
	   $cont = "<div id='panel-top'>".$page_title."</div>\r
	   <div id='panel-bottom'>\r"
	  . htmlspecialchars_decode(stripcslashes($page_text)).
	  "\r</div>";
	   
	   fwrite($fo, $cont);
	   fclose($fo);
	   
	   // всичко е ок .. покажи го
	  echo ok("Страницата вече е готова за ползване :)");
	  echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"1;URL=./?p=".$_GET['p']."&w=".$_GET['w']."&url=".$_GET['url']."\" >";
	}
  
}

   
   
break;
}
?>
</div>