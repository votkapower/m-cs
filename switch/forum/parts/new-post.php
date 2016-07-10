<?php
$cat_id = (int)trim(htmlspecialchars($_GET['c']));	

$cinfo_q = mysqli_query($_db,"SELECT * FROM `forum-cats` WHERE `cat_id`='".$cat_id."'");
$c_num = mysqli_num_rows($cinfo_q);	
if($c_num == 0 )
{
 header("Location: ./?p=forum");
 exit;
}

$cat_info = mysqli_fetch_array($cinfo_q);
?>

    <div id='forum-navigation-hron'><a href="./?p=forum">Форум</a> &raquo; <a href="./?p=forum&w=from&c=<?php echo $cat_info['cat_id'];?>"><?php echo $cat_info['title'];?></a> &raquo; Нова тема</div>

	<div class='thead'>Нова тема</div>
		
	<form method='post'>
		<br/>
		<b>Заглавие</b> на темата: <br/>
		<input name='title-post' style='font-size:17px;min-width:900px;max-width:900px;width:900px;' />
		
		Твоят <b>Пост</b>: 
		
		<span  class='bbcode-floated-right'>
					   
			<a href="javascript:;" onClick="bbcode('[b]','[/b]', 'the-post')" style='font-weight:bold;'>B</a> 
											
			<a href="javascript:;" onClick="bbcode('[i]','[/i]', 'the-post')"><i>I</i></a> 
			
			<a href="javascript:;" onClick="bbcode('[u]','[/u]', 'the-post')"><u>U</u></a> 
			<a href="javascript:;" onClick="doURL('the-post')">Линк</a> 
		
			
			<a href="javascript:;" onClick="doIMG('the-post')" style='color:#6cc926'>Снимка</a> 
		   
		</span>
		
		
		<br/>
		<textarea name="the-post" id="the-post" class="the-post" style='font-size:20px;min-width:900px;max-width:900px;width:900px;max-height:1000px;height:500px;'></textarea>

		
		
		<b>Разрешаваш</b> ли <b>отговарите</b> в темата ?<br/>
		<select name='allow-answers'>
		 <option value="true">Да, разрешавам</option>
		 <option value="false">Не, забранявам ги</option>
		</select>
		
		
		
		<input type='hidden' name='forum-cat-id' value="<?php echo $cat_info['cat_id'];?>"/>
		<button type='submit' name="post-my-new-post" style='float:right;'>Добави новата тема</button>
		
		<br id='clear'/>
	</form>
	
<?php
if(isset($_POST['post-my-new-post']))
{
   $title = trim(htmlspecialchars($_POST['title-post']));
   $text = trim(htmlspecialchars($_POST['the-post']));
   $allow_answers = trim(htmlspecialchars($_POST['allow-answers']));
   $pcid = (int)trim($_POST['forum-cat-id']);
   $time = time();
   $me = $_SESSION['user']['username'];
   
   if(strlen($title) <= 5)
   {
     error("Заглавието ти трябва да е максимално обяснително, а не само 1-2 думи !");
   }
   else if(strlen($text) <= 5)
		{
		   error("Кратките мнения се считат за спам, такаче обясни малко по-подробно !");
		}
	   else if($pcid != $cat_id )
			{
			   error("К'во направи, бе .. ?! Нещо не съответстват темите тука .. !");
			} 
			else 
				{
				  mysqli_query($_db,"INSERT INTO `forum-posts` (`username`,`topic-title`,`text`,`cat_id`,`views`,`timestamp`,`allow-answers`)VALUES('$me','$title','$text','$pcid','0','$time','$allow_answers')");
				  $p_id = mysqli_fetch_array(mysqli_query($_db,"SELECT `id` FROM `forum-posts` WHERE `timestamp`='$time'"));
				  $pid = $p_id['id'];
				  ok("Темата ти е пусната успешно. Можеш да я видиш то <a href='./?p=forum&w=read&c=". $pcid ."&read=". $pid . "'>тук</a>.");
				}
}

?>

	
