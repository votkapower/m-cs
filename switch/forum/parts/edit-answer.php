<?php
$cat_id = (int)trim(htmlspecialchars($_GET['c']));	
$answer_id = (int)trim(htmlspecialchars($_GET['i']));	



$cinfo_q = mysqli_query($_db,"SELECT * FROM `forum-cats` WHERE `cat_id`='".$cat_id."'");
$c_num = mysqli_num_rows($cinfo_q);	
if($c_num == 0 )
{
 header("Location: ./?p=forum");
 exit;
}


$pinfo_q = mysqli_query($_db,"SELECT * FROM `forum-answers` WHERE `id`='".$answer_id."'");
$p_num = mysqli_num_rows($pinfo_q);	
if($c_num == 0 )
{
 header("Location: ./?p=forum");
 exit;
}

$rinfo = mysqli_fetch_array($pinfo_q);

$cat_info = mysqli_fetch_array($cinfo_q);
?>

    <div id='forum-navigation-hron'><a href="./?p=forum">Форум</a> &raquo; <a href="./?p=forum&w=from&c=<?php echo $cat_info['cat_id'];?>"><?php echo $cat_info['title'];?></a> &raquo; Редактиране на отговор</div>

	<div class='thead'>Редактиране на отговор</div>
		
	<form method='post'>
			<br/>
		Твоят <b>Пост</b>: 
		
		<span  class='bbcode-floated-right'>
					   
			<a href="javascript:;" onClick="bbcode('[b]','[/b]', 'the-answer')"  style='font-weight:bold;'>B</a> 
											
			<a href="javascript:;" onClick="bbcode('[i]','[/i]', 'the-answer')"><i>I</i></a> 
			
			<a href="javascript:;" onClick="bbcode('[u]','[/u]', 'the-answer')"><u>U</u></a> 
			<a href="javascript:;" onClick="doURL('the-answer')">Линк</a> 
		
			
			<a href="javascript:;" onClick="doIMG('the-answer')" style='color:#6cc926'>Снимка</a> 
		   
		</span>
		
		<br/>
		<textarea name="the-answer" id="the-answer" style='font-size:20px;min-width:900px;max-width:900px;width:900px;max-height:1000px;height:500px;'><?php echo stripcslashes($rinfo['text']);?></textarea>
		<button type='submit' name="edit-my-answer" style='float:right;'>Редактирай си отговора</button>
	
				
				
		<br id='clear'/>
	</form>
	
<?php
if(isset($_POST['edit-my-answer']))
{

   $me = $_SESSION['user']['username'];
   $text = trim(htmlspecialchars($_POST['the-answer']));
   $pid = (int)trim($_POST['post-id']);
   $time = time();


    if(strlen($text) < 5)
		{
		   error("Кратките мнения се считат за спам, такаче обясни малко по-подробно !");
		} 
		else{
			
				 
				  mysqli_query($_db,"UPDATE `forum-answers` SET  `text`='$text', `last-change`='true',`last-change-from`='$me',`last-change-time`='$time' WHERE `id`='".$answer_id."' ");
				  
				  //$find_id = mysqli_fetch_array(mysqli_query($_db,"SELECT `id` FROM `forum-answers` WHERE `last-change-time`='$time' AND `last-change-from`='$me'"));
				  ok("Отговора ти е редактиран  успешно :)");
				  $url = "./?p=forum&w=read&c=".$cat_id."&read=".$rinfo['post_id']."#".$answer_id."";
				  header("Location: ".$url);
			}
}

?>

	
