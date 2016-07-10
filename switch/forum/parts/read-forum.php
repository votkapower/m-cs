<?php
/*
DB:
 forum-answers
 forum-cats
 forum-posts
 forum-settings
 
*/

$forum_cat_id = (int)trim(htmlspecialchars($_GET['c']));
$post_id = (int)trim(htmlspecialchars($_GET['read']));

// Проверка дали поста съществува !
		$num_q = mysqli_query($_db,"SELECT `id` FROM `forum-posts` WHERE `id`='$post_id'");
		$num = mysqli_num_rows($num_q);

		if($num == 0 OR $num > 1)
		{
		  header("Location: ./?p=forum");
		  exit;
		}

mysqli_query($_db,"UPDATE `forum-posts` SET `views` =  `views` + 1  WHERE `id`='$post_id'"); // Ъпдейтни гледанията на  темата !


$forum_cat_info_q = mysqli_query($_db,"SELECT * FROM `forum-cats` WHERE `cat_id`='$forum_cat_id'");
$forum_cat = mysqli_fetch_array($forum_cat_info_q);


$post_info_q = mysqli_query($_db,"SELECT * FROM `forum-posts` WHERE `cat_id`='$forum_cat_id' AND `id`='$post_id'");
$post = mysqli_fetch_array($post_info_q);


$user_info_q = mysqli_query($_db,"SELECT * FROM `users` WHERE `username`='".$post['username']."'");
$user = mysqli_fetch_array($user_info_q);

 if($user['type'] == "admin" ) { $type = "<img src='./images/icons/king.jpg' width='15'  border='0' title='Админ'/> <b class='center'>Админ</b>";}else{ $type = "Потребител";}
 
 if($user['timestamp'] > (time() - 1*60) ) { $status = "<img src='./images/icons/status_online.png' width='15'  border='0' title='Онлайн'/>";}else{ $status = "<img src='./images/icons/status_offline.png' width='15'  border='0' title='Офлайн'/>";}
?>


  <div id='forum-navigation-hron'><a href='./?p=forum'>Форум</a> &raquo; <a href='./?p=forum&w=from&c=<?php echo $forum_cat['cat_id'];?>'><?php echo $forum_cat['title'];?></a> &raquo; <?php echo $post['topic-title']; ?></div>
  
  
 <div class='thead'><?php  if($post['locked'] == 'true')
						{
						 $locked_img = "<img src='./images/icons/lock.png' width='16'  border='0' alt='Заключена'/> ";
						}
						else
							{
							 $locked_img = "<img src='./images/icons/nonew_small.png' width='16'  border='0' alt='Заключена'/> ";
							} echo $locked_img;?> <?php echo $post['topic-title']; ?> </div>
 
						 <div class='forum-read-post-user-info-left center'>
							  <?php   echo $status; ?> <a href='./?p=viewprofile&u=<?php echo $post['username'];?>'><?php echo $post['username'];?></a>
							
								<br/><br/>
							 <img src='<?php echo $user['avatar']; ?>' width='120'/>
							 
								<br/><br/>
							 <?php  echo $type; ?>
								<br/> 
							<small>
								<?php 
								  
								  echo  mysqli_num_rows(mysqli_query($_db,"SELECT `id` FROM `forum-answers` WHERE `username`='".$user['username']."' ORDER BY `id` DESC"));
								
								 ?> мнения 
							</small>
							
						 
						 </div>
						
						<div class='forum-read-post'>
						<?php echo nl2br(bbcode(stripcslashes(htmlspecialchars_decode($post['text'])))); ?>
						
					 <?php
					  if($post['last-change'] == "true")
					  {
					 ?>
					 <div id='post-has-benn-edited'>Този пост е редактиран за последно от <b><?php echo $post['last-change-from'];?></b> -  <b><?php echo maketime($post['last-change-time']);?></b> <i><small>(на <?php echo date("d.m.Y в H:i", $post['last-change-time'])?>ч.)</i></small></div>
					 <?php
					 }
					 ?>
						
						</div>
						
							<?php
							if($_SESSION['is_logged'] == true)
							{
							?>	
								<div class='under-post-buttons'>
								
										<?php
										 if($_SESSION['user']['type'] == "admin" )
										 {
										?>
										
										<a href='./?p=forum&w=del&c=<?php echo $forum_cat_id;?>&r=<?php  echo $post_id;?>'  id='button'  style='padding:13px;' ><u>Изтрий</u> темата</a> 
										 
										<?php
										 }
										?>
										
										
										<?php 
										 //Ползвамм масива $setting от майчиният файл, в който е инклуууднат този !
										if(($setting["allow-user-to-edit-own-posts"] == "true" AND  $_SESSION['user']['username'] == $post['username']) OR $_SESSION['user']['type'] == "admin" ) {?>
										
										<a href='./?p=forum&w=edit&c=<?php  echo $forum_cat_id;?>&r=<?php  echo $post_id;?>'  id='button'  style='padding:13px;' >Редактирай</a> 
										
										<?}?>
								<?php
								if ($post['allow-answers'] == "true" )
								{
								?>	
										<a href='./?p=forum&w=advanced-reply&c=<?php  echo $forum_cat_id;?>&read=<?php  echo $post_id;?>&qpid=<?php echo $post['id']; ?>&t=<?php echo $post['timestamp']; ?>' id='button'  style='padding:13px;'>Цитирай</a>
								<?php
								}
								?>
										
										<?php if( $post['reported'] != "true" AND $_SESSION['user']['username'] != $post['username']) { ?><a href="./?p=forum&w=report-post&r=<?php  echo $post_id;?>"  id='button'  style='padding:13px;'>Докладвай</a> <?php } ?>
								</div>
							<?php
							}
							?>
	
					<div class='clear-between-forum-answers'></div>	
														
															<?php 
															 /// Вземамее отговорите от forum-answers за този пост
															 $f_answers_q = mysqli_query($_db,"SELECT * FROM `forum-answers` WHERE `post_id`='".$post['id']."' ORDER BY `timestamp` ASC ");
															 while($answer = mysqli_fetch_array( $f_answers_q ))
															 {

																$user_info_q = mysqli_query($_db,"SELECT * FROM `users` WHERE `username`='".$answer['username']."'");
																$user = mysqli_fetch_array($user_info_q);
																
																
																 if($user['type'] == "admin" ) { $type = "<img src='./images/icons/king.jpg' width='15'  border='0' title='Админ'/> <b class='center'>Админ</b>";}else{ $type = "Потребител";}
																 
																 if($user['timestamp'] > (time() - 1*60) ) { $status = "<img src='./images/icons/status_online.png' width='15'  border='0' title='Онлайн'/>";}else{ $status = "<img src='./images/icons/status_offline.png' width='15'  border='0' title='Офлайн'/>";}
															?>
															 <a name="<?php echo $answer["id"];?>" id="<?php echo $answer["id"];?>"></a>
																	 <div class='forum-read-post-user-info-left center'>
																	  <?php   echo $status; ?> <a href='./?p=viewprofile&u=<?php echo $answer['username'];?>'><?php echo $answer['username'];?></a>
																	
																		<br/><br/>
																	 <img src='<?php echo $user['avatar']; ?>' width='120'/>
																	 
																		<br/><br/>
																	 <?php  echo $type; ?>
																		<br/> 
																	<small>
																		<?php 
																		  echo  mysqli_num_rows(mysqli_query($_db,"SELECT `id` FROM `forum-answers` WHERE `username`='".$user['username']."'"));
																		 ?> мнения 
																	</small>
																	
																 
																 </div>
																
																<div class='forum-read-post'>
																	<div class='post-time-added'><?php echo date("на d.m.Y в h:iч.",$answer['timestamp']); ?>(<small><?php echo maketime($answer['timestamp']); ?></small>) </div>
																<?php echo bbcode(nl2br(stripcslashes(htmlspecialchars_decode($answer['text'])))); ?>
																
																 	 <?php
																	  if($answer['last-change'] == "true")
																	  {
																	 ?>
																	 <div id='post-has-benn-edited'>Този отговор е редактиран за последно от <b><?php echo $answer['last-change-from'];?></b> -  <b><?php echo maketime($answer['last-change-time']);?></b> <i><small>(на <?php echo date("d.m.Y в H:i", $answer['last-change-time'])?>ч.)</i></small></div>
																	 <?php
																	 }
																	 ?>
																
																			
																
																</div>
																		<?php
																		if($_SESSION['is_logged'] == true)
																		{
																		?>	
																			<div class='under-post-buttons'>
																					<?php
																					 //Ползвамм масива $setting от майчиният файл, в който е инклуууднат този !
																					if(($setting["allow-user-to-edit-own-posts"] == "true" AND  $_SESSION['user']['username'] == $answer['username']) OR $_SESSION['user']['type'] == "admin" ) {?><a href='./?p=forum&w=edit-answer&c=<?php  echo $forum_cat_id;?>&r=<?php  echo $post_id;?>&i=<?php echo $answer['id']; ?>' id='button'  style='padding:13px;'>Редактирай</a> <?}?>
																				<?php
																				if ($post['allow-answers'] == "true" )
																				{
																				?>	
																					<a href='./?p=forum&w=advanced-reply&c=<?php  echo $forum_cat_id;?>&read=<?php  echo $post_id;?>&qpid=<?php echo $answer['id']; ?>' id='button'  style='padding:13px;'>Цитирай</a>
																				<?php 
																				}
																				?>
																						
																				
																			</div>
																		<?php
																		}
																		?>
																
												 <div class='clear-between-forum-answers'></div>	
				
			<?php
			}
			?>
	
	

	
	<div id='post-answer-field'>
<?php
 //Ползвамм масива $setting от майчиният файл, в който е инклуууднат този !
  // - allow-quick-answer 
  
  if( $setting['allow-quick-answer'] == 'true' AND $post['locked'] == "false" )
  {
  
  if ( $post['allow-answers'] == "true"  )
   {
?>	
			 <div class='thead'>Бърз отговор</div>
				<form method='post'>
						<textarea name='write-my-answer' id='answer-textbox'></textarea>
						<input type='hidden' value='<?php echo $post['id'];?>' name='post-id' />
						<button name='answer-now' type='submit' style='padding:10px;float:right;margin-left:10px;'>Отговори</button> <a href='./?p=forum&w=advanced-reply&c=<?php echo $_GET['c']."&read=".$_GET['read']; ?>' id='button' style='float:left;padding:12px;'>Разширен отговор</a> 
						<br id='clear'/>
				</form>
			 <?php
			 if(isset($_POST['answer-now']))
			 {
			   
				$text = trim(htmlspecialchars(addslashes($_POST['write-my-answer'])));
				$real_pid = (int)$_POST['post-id'];
				$time = time();
				
				if(strlen($text) < 10)
				{
				 error("Ако ще е само за 1-2 думи, по - добре НЕ пиши !");
				}
				else if( $real_pid != $post_id)
				{
				 error("К'во си направил ?! Постовете нещо не съвпадат !");
				}
				else
					{
					  mysqli_query($_db,"INSERT INTO `forum-answers` (`username`,`text`,`timestamp`,`post_id`)VALUES('".$_SESSION['user']['username']."','$text','$time','$real_pid')");
					  ok("Отговора ти е успешно записан !");
					  //&w=read&c=4&read=2
					  echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;URL=./?p=".$_GET['p']."&w=read&c=".$_GET['c']."&read=".$_GET['read']."\" />";
					}
			 
			 }
			 
	 }else
		 {
		  error("Автора е забранил отговорите в темата си !");
		 }
			 
}else
	{
	 if( $setting['allow-quick-answer'] == 'true' OR $post['locked'] == "false" )
	 {
	     if( $post['allow-answers'] == "true" )
		 {
			echo " <a href='./?p=forum&w=advanced-reply&c=".$_GET['c']."&read=".$_GET['read']."' id='button' style='padding:12px;font-size:18px;float:right;'>Нов отговор</a> <br  id='clear'/>";
		}
	 }
	 else
		{
		  error("Темата е заключена и неможе да пишеш в нея !");
		}
	}
			 ?>
				
	</div>
<?php 


?>
	