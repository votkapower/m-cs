<?php
$cat_id = (int)trim(htmlspecialchars($_GET['c']));	
$post_id = (int)trim(htmlspecialchars($_GET['read']));	

$cinfo_q = mysqli_query($_db,"SELECT * FROM `forum-cats` WHERE `cat_id`='".$cat_id."'");
$c_num = mysqli_num_rows($cinfo_q);	
if($c_num == 0 )
{
 header("Location: ./?p=forum");
 exit;
}

$pinfo_q = mysqli_query($_db,"SELECT * FROM `forum-posts` WHERE `id`='".$post_id."'");
$p_num = mysqli_num_rows($pinfo_q);	
if($p_num == 0 )
{
 header("Location: ./?p=forum");
 exit;
}

if($_SESSION['is_logged'] !== true)
{
 header("Location: ./?p=forum");
 exit;
}

$cat_info = mysqli_fetch_array($cinfo_q);
$pst_info = mysqli_fetch_array($pinfo_q );

if($pst_info['locked'] == "true")
{
 header("Location: ./?p=forum");
 exit;
}
?>

    <div id='forum-navigation-hron'><a href="./?p=forum">Форум</a> &raquo; <a href="./?p=forum&w=from&c=<?php echo $cat_info['cat_id'];?>"><?php echo $cat_info['title'];?></a> &raquo; Разширен отговор</div>

	<div class='thead'>Разширен отговор</div>
		<br/>
	<form method='post'>

		Твоят <b>отговор</b>: 
		
		
		<span  class='bbcode-floated-right'>
					   
			<a href="javascript:;" onClick="bbcode('[b]','[/b]', 'the-answer')"  style='font-weight:bold;'>B</a> 
											
			<a href="javascript:;" onClick="bbcode('[i]','[/i]', 'the-answer')"><i>I</i></a> 
			
			<a href="javascript:;" onClick="bbcode('[u]','[/u]', 'the-answer')"><u>U</u></a> 
			<a href="javascript:;" onClick="doURL('the-answer')">Линк</a> 
		
			
			<a href="javascript:;" onClick="doIMG('the-answer')" style='color:#6cc926'>Снимка</a> 
		   
		</span>
		
		
		<br/>
		<?php
		 // За цитатите ..
		 $qpid = (int)trim(htmlspecialchars($_GET['qpid']));
		 $ptime = (int)trim(htmlspecialchars($_GET['t']));
		 $quote_code = "";
		 $qu_q = mysqli_query($_db,"SELECT `text`,`username` FROM `forum-answers` WHERE `id`='".$qpid."'");
		 $qu_n = mysqli_num_rows($qu_q);
		 if($qu_n > 0 AND !$ptime )
		 { 
		   $qu_r = mysqli_fetch_array($qu_q);
		   $quote_code =  trim("[q='".$qu_r['username']."']".htmlspecialchars(addslashes($qu_r['text']))."[/q] ");
		 }
		 else {
				 $qu_qp = mysqli_query($_db,"SELECT `text`,`username` FROM `forum-posts` WHERE `id`='".$qpid."' AND `timestamp`=' $ptime'");
				 $qu_np = mysqli_num_rows($qu_q);
				 if($qu_np == 1)
				 { 
				   $qu_rp = mysqli_fetch_array($qu_qp);
				   $quote_code =  trim(" [q='".$qu_rp['username']."']".htmlspecialchars(addslashes($qu_rp['text']))."[/q] ");
				 }
			}
		?>
		
		<textarea name="the-answer" style='font-size:20px;min-width:900px;max-width:900px;width:900px;max-height:1000px;height:500px;'><?php echo $quote_code;?></textarea>
		<input type='hidden' name='forum-cat-id' value="<?php echo $cat_info['cat_id'];?>"/>
		<input type='hidden' name='forum-post-id' value="<?php echo $post_id;?>"/>
		<button type='submit' name="post-my-answer" style='float:right;'>Отговори</button>
		
		<br id='clear'/>
	</form>
	
<?php
if(isset($_POST['post-my-answer']))
{
// forum-answers -> username 	text 	timestamp 	post_id
 
  $answer_text =  trim(htmlspecialchars(addslashes($_POST['the-answer'])));
  $username = $_SESSION['user']['username'];
  $time = time();
  $pid = trim($_POST["forum-post-id"]);
  $cid = trim($_POST["forum-cat-id"]);
  
  if(strlen($answer_text) < 10)
  {
    error("Няма смисал за 1 изречение да спамиш, по-добре си запази мнението за себе си !");
  }
  else if ( empty($username))
		{
		 error("К'во направии бе .. ?! Как така ще пускаш мнения, апък не си логнат  .. ?!");
		}
	  else if ( $cid  !=  $cat_id)
			{
			 error("К'во направии бе .. ?! Как ще пускаш отговор в категория, която НЕ съществува .. ?!");
			}
		  else
			{
			  mysqli_query($_db,"INSERT INTO `forum-answers` (`username`,`text`,`timestamp`,`post_id`)VALUES('$username','$answer_text','$time','$pid')");
			  
			  $find_id = mysqli_fetch_array(mysqli_query($_db,"SELECT `id` FROM `forum-answers` WHERE `timestamp`='$time' AND `username`='$username' "));
			  ok("Отговора ти е записан усшещно ! Може да го видиш от <a href='./?p=forum&w=read&c=".$cid."&read=".$pid."#".$find_id['id']."'>тук</a>.");
			}
}

?>

	
