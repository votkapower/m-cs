<?php
$cat_id = (int)trim(htmlspecialchars($_GET['c']));	
$post_id = (int)trim(htmlspecialchars($_GET['r']));	

$cinfo_q = mysqli_query($_db,"SELECT * FROM `forum-cats` WHERE `cat_id`='".$cat_id."'");
$c_num = mysqli_num_rows($cinfo_q);	
if($c_num == 0 )
{
 header("Location: ./?p=forum");
 exit;
}

$pinfo_q = mysqli_query($_db,"SELECT * FROM `forum-posts` WHERE `id`='".$post_id."'");
$p_num = mysqli_num_rows($pinfo_q);	
if($c_num == 0 )
{
 header("Location: ./?p=forum");
 exit;
}

$cat_info = mysqli_fetch_array($cinfo_q);
$rinfo = mysqli_fetch_array($pinfo_q);
?>

    <div id='forum-navigation-hron'><a href="./?p=forum">Форум</a> &raquo; <a href="./?p=forum&w=from&c=<?php echo $cat_info['cat_id'];?>"><?php echo $cat_info['title'];?></a> &raquo; Редактиране на тема</div>

	<div class='thead'>Редактиране на тема</div>
		
	<form method='post'> 
	 	<br/>
		<b>Заглавие</b> на темата: <br/>
		<input name='title-post' style='font-size:17px;min-width:900px;max-width:900px;width:900px;' value="<?php echo $rinfo['topic-title']?>"/>
		
		Твоят <b>Пост</b>: 

		<span  class='bbcode-floated-right'>
					   
			<a href="javascript:;" onClick="bbcode('[b]','[/b]', 'the-post')"  style='font-weight:bold;'>B</a> 
											
			<a href="javascript:;" onClick="bbcode('[i]','[/i]', 'the-post')"><i>I</i></a> 
			
			<a href="javascript:;" onClick="bbcode('[u]','[/u]', 'the-post')"><u>U</u></a> 
			<a href="javascript:;" onClick="doURL('the-post')">Линк</a> 
		
			
			<a href="javascript:;" onClick="doIMG('the-post')" style='color:#6cc926'>Снимка</a> 
		   
		</span>
		

		<br/>
		<textarea name="the-post"id="the-post" style='font-size:20px;min-width:900px;max-width:900px;width:900px;max-height:1000px;height:500px;'><?php echo $rinfo['text']?></textarea>
		<input type='hidden' name='forum-cat-id' value="<?php echo $rinfo['cat_id'];?>"/>
		<input type='hidden' name='forum-post-id' value="<?php echo $rinfo['id'];?>"/>
		
	

				<?php
				if($_SESSION['user']['type'] == "admin")
				{
				?>
			 <b>Премесети</b> в : <br />
				 <select name='category'>
					<?php
					 $cats_q = mysqli_query($_db,"SELECT * FROM `forum-cats` ORDER BY `cat_id` DESC");
					 while($c = mysqli_fetch_array($cats_q))
					 {
					  $selected ="";
					  if($c['cat_id'] == $cat_id) { $selected = " selected ";}
					  echo "<option value='".$c['cat_id']."' $selected >".$c['title']."</option>";
					 }
					?>
				 </select>
				
						<br />
				
			<b>Състояние</b> на темата : <br />
				 <select name='locked'>
					<option value='false' <?php if( $rinfo['locked'] == 'false'){ echo "selected ";} ?>>Отключена</option>
					<option value='true'  <?php if( $rinfo['locked'] == 'true' ){ echo "selected ";} ?>>Заключена</option>
				 </select>
				
				
				
				<?php
				}
				?>
				
				<button type='submit' name="edit-my-fuckcing-post" style='float:right;'>Редактирай темата</button>
		<br id='clear'/>
	</form>
	
<?php
if(isset($_POST['edit-my-fuckcing-post']))
{
   $title = trim(htmlspecialchars($_POST['title-post']));
   $user = $_SESSION['user']['username'];
   $text = trim(htmlspecialchars($_POST['the-post']));
   $cid = (int)trim($_POST['forum-cat-id']);
   $pid = (int)trim($_POST['forum-post-id']);
   $time = time();
   $me = $_SESSION['user']['username'];
   
   // Ako е админ .. 
   if($_SESSION['user']['type'] == 'admin')
   {
    $new_category_id = trim($_POST['category']); 
    $locked = trim($_POST['locked']); 
   }
   
   if(strlen($title) <= 5)
   {
     error("Заглавието ти трябва да е максимално обяснително, а не само 1-2 думи !");
   }
   else if(strlen($text) <= 5)
		{
		   error("Кратките мнения се считат за спам, такаче обясни малко по-подробно !");
		}
	   else if($cid != $cat_id )
			{
			   error("К'во направи, бе .. ?! Нещо не съответстват категориите тука .. !");
			} 
			else if($pid != $post_id )
			{
			   error("К'во направи, бе .. ?! Нещо не съответстват темите тука .. !");
			} 
			else 
				{
					
				 if($locked == "true" AND $setting['alarm-users-when-admin-lock-post'] == 'true')
				 {
				  $msg = "
				   Здравей, <b>".$rinfo['username']."</b>,
				   
				     Днес <b>".date("d.m.Y в h:iч.")."</b> администгратора <b>".$me."</b> заключи темата ти \"<b>".$title."</b>\".
					 
					 Причина за да е заключена за: 
					   - Псуване и/или убиди в  темата ти
					   - Спам
					   - Темата е била докладвана
					   - Поредната ти тема, която не си е на мястото(в съответната категория)
					   - Темата е приключена
					   - По твое желание
					 * Ако знаеш за това т.е. темата е заключена по твое мнение - извинявай за спама. 
					
				   Поздрви от екипа на сайта . :)
				  ";
				    echo user_pm("system", $rinfo['username'], "Темата ти е заключена !", $msg);
				 }
	
				 $dopulnitelno = " `cat_id`='$new_category_id', `locked`='$locked', ";
				 
				  mysqli_query($_db,"UPDATE `forum-posts` SET  `topic-title`='$title',`text`='$text',`last-change`='true',`last-change-from`='$user',`last-change-time`='$time', ".$dopulnitelno." `times-changed` = `times-changed` + 1 WHERE `id`='".$post_id."' ") or die(mysqli_error());
				  

				 
				ok("Отговора ти е записан усшещно ! Може да го видиш от <a href='./?p=forum&w=read&c=".$cat_id."&read=".$post_id."'>тук</a>.");
				  
				}
}

?>

	
