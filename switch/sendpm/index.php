<?php
if($_SESSION['is_logged'] != true)
{
	header("Location: ./?p=index");
	exit;
}

$to = trim(htmlspecialchars($_GET['t']));
$check = mysqli_num_rows(mysqli_query($_db,"SELECT `id` FROM `users` WHERE `username`='$to'"));
if($check == 0 || !$to || strlen($to) < 2)
{
 header("Location: ./?p=index");
  exit;
}
?>
  <div id='panel-top'>Пращане на Лично Съобщение до <?php echo $to;?></div>
   <div id='panel-bottom'>
		<form method='post' action=''>
		    <b>Заглавие</b> на съобщението <br />
			<input type='text' value="" name='msg-title' style='width:300px;'/> <br/>
			
			
		    <b>Съобщението</b>  <br />
			<textarea name='msg-text'  style='width:385px;height:430px;'></textarea> <br/>
			
			<button type='submit' name='send-pm'>Изпрати</button>	
		</form>
		<?php
		 if(isset($_POST['send-pm']))
		 {
		    $time = time();
			$from = $_SESSION['user']['username'];
			$msg_title = trim(addslashes(htmlspecialchars($_POST['msg-title'])));
			$msg_text = trim(addslashes(htmlspecialchars($_POST['msg-text'])));
			
			if( empty($msg_title) ||  empty($msg_text)  )
			{
			  error("Попълни всички полета !");
			}
			else if( $from == $to)
				{
				 error("Не може да пращаш съобщения до себеси !");
				}
				else
					{
					  mysqli_query($_db,"INSERT INTO `user-pms` (`from_user`,`to_user`,`msg-title`,`msg-text`,`timestamp`,`readed`)VALUES('$from','$to','$msg_title','$msg_text','$time','0')") or die(mysqli_error);
					  ok("Съобщението е пратено успешно !");
					   echo "<meta http-equiv='refresh' content='2;URL=./?p=viewprofile&u=$to' >";
					}
		 }
		?>
  </div>