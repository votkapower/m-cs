<?php
$w = trim(htmlspecialchars($_GET['w']));
switch($w)
{


default:
?>

<div id='panel-top'>Добавяне на категории към форума</div>
<div id='panel-bottom'>

<div style='background:#540303;color:#160000;text-shadow:1px 1px #660202;padding:5px 3px;font-family:Arial;'> Категория <span style='float:right;'>Промени / Изтрий</span></div>

<?php
				$i=0;
				$fcats_q = mysqli_query($_db,"SELECT * FROM `forum-cats` ORDER BY `cat_id` DESC ");
				$fcats_n = mysqli_num_rows($fcats_q);
				while($f = mysqli_fetch_array($fcats_q))
				{
				 $i++;
				  echo "<div style='padding:5px;'><b>$i</b>.<b>".$f['title']."</b><span style='float:right;'><a href='./?p=forum-cats&w=edit&i=".$f['cat_id']."' style='color:green;'>Редактирай</a> / <a href='./?p=forum-cats&w=delete&i=".$f['cat_id']."'>Изтрий</a></span></div>";
				}
?>

<a href='./?p=forum-cats&w=add' style='text-decoration:none;font-weight:normal;'>
<div style='padding:10px;text-align:center;font-size:15px;font-family:Arial;background:#666;color:#000;'>Добави нова категория</div>
</a>

</div>


<?php
break;

case "add":
?><div id='panel-top'>Добавяне на категории към форума</div>
<div id='panel-bottom'>
		

			
		<form method='post' action='' style='font-size:16px;font-family:Arial;'>
			
	
			
			
			<b style='font-size:16px;'>Име</b> на категорията <br/>
			<input name='cat_name'  value='' style='width:300px;' /> <button name='add-forum-cat' type='submit'>Добави</button> <br/>
				
			<?php

			 if(isset($_POST['add-forum-cat']))
			 { 
			  // Всчиките връщат True / False !
			  $forum_cat_name = trim(htmlspecialchars($_POST['cat_name']));
			  
			  
			  if(strlen($forum_cat_name) < 5)
				{
					error("Името на категорията трябва да е по-дълго от 5 символа !");
				}
				else
					{
					
					mysqli_query($_db,"INSERT INTO `forum-cats` (`cat_id`, `title`) VALUES (NULL, '$forum_cat_name')");
					ok("Новата категория е добавена усшещно. :)");
				 echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"1;URL=./?p=".$_GET['p']."\" >";
					}	
			 }
			?>
		</form>
		
		
		<br/><br/>
		
<a href='./?p=forum-cats' style='text-decoration:none;font-weight:normal;'>&laquo; Към категориите</a>
</div>

<?php
break;


case "edit":
$i = trim(htmlspecialchars($_GET['i']));
$f = mysqli_fetch_array(mysqli_query($_db,"SELECT * FROM `forum-cats` WHERE `cat_id`='$i'"));
?><div id='panel-top'>Редактиране на категория от форума</div>
<div id='panel-bottom'>
		

			
		<form method='post' action='' style='font-size:16px;font-family:Arial;'>
			
	
			
			
			<b style='font-size:16px;'>Име</b> на категорията <br/>
			<input name='cat_name'  value='<?php echo $f['title']?>' style='width:300px;' /> <button name='edit-forum-cat' type='submit'>Добави</button> <br/>
				
			<?php

			 if(isset($_POST['edit-forum-cat']))
			 { 
			  // Всчиките връщат True / False !
			  $forum_cat_name = trim(htmlspecialchars($_POST['cat_name']));
			  
			  
			  if(strlen($forum_cat_name) < 5)
				{
					error("Името на категорията трябва да е по-дълго от 5 символа !");
				}
				else
					{
					
					mysqli_query($_db,"UPDATE `forum-cats` SET `title` = '$forum_cat_name' WHERE `cat_id`='$i'");
					ok("Kатегория е обновена усшещно. :)");
				 echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"1;URL=./?p=".$_GET['p']."\" >";
					}	
			 }
			?>
		</form>
		
		<br/><br/>
		
<a href='./?p=forum-cats' style='text-decoration:none;font-weight:normal;'>&laquo; Към категориите</a>
</div>

<?php
break;


case "delete":
 $i = trim(htmlspecialchars($_GET['i']));
 mysqli_query($_db,"DELETE FROM `forum-cats` WHERE `cat_id`='$i' LIMIT 1");
  header("Location: ./?p=".$_GET['p']);
break;
}
?>