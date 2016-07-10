 <div id='forum-navigation-hron'><a href='./?p=index'>Саит</a> &raquo; Форум</div>
 
<?php
/*
DB:
 forum-answers
 forum-cats
 forum-posts
 forum-settings
 
*/



$the_new_post_botton = "";
$extra_style = "";

	
// Понеже този файл се инклуудва, а в бащиния файл имаме масива $settings , то може да го ползваме и тука .. :)

 $forum_possts_where  = "";
if($setting['hide-locked-posts'] == "true")
{
 $forum_possts_where = " AND `locked`='false' ";
}

// --------------------------------------------------------------------------------

	 $forums_cats_q = mysqli_query($_db,"SELECT * FROM `forum-cats`  ORDER BY `cat_id` DESC");
	 $num_fcats = mysqli_num_rows($forums_cats_q);
	 if($num_fcats == 0)
	 {
	  error("Няма добавени категории !");
 	 }
	 while($fcat = mysqli_fetch_array($forums_cats_q))
	 {
	 
		if($_SESSION['is_logged'] == true)
		{
			$the_new_post_botton = "<a href='./?p=forum&w=new-post&c=".$fcat['cat_id']."' id='button' style='position:absolute;margin-top:8px;padding:12px;'>НОВА ТЕМА</a> ";
			$extra_style = 'display:inline-block;width:786px;';
		}

	 
	    echo "<div class='thead' style='color:darkred;font-family:Arial;".$extra_style."'>".$fcat['title']." </div>".$the_new_post_botton;
		
		
		$forum_posts_q = mysqli_query($_db,"SELECT * FROM `forum-posts` WHERE `cat_id`='".$fcat['cat_id']."' ". $forum_possts_where."  ORDER BY `id` DESC");
		$num_posts = mysqli_num_rows( $forum_posts_q );
		
		if( $num_posts >= 1  )
		{
			echo "\n<table cellpadding='15' cellspacing='0' border='0' class='forum-table' >
					 <tr>
					 <th width='600' align='left'>Тема</th>
					 <th>Преглеждания</th>
					 <th>Отговори</th>
					 <th>Последен отговор</th>
					 </tr>\n";
					
						while( $post = mysqli_fetch_array($forum_posts_q))
						{
						  $answers = mysqli_num_rows(mysqli_query($_db,"SELECT `username` FROM `forum-answers` WHERE `post_id`='". $post['id'] . "'")); // Брой отговори
						  
							if($answers > 0)
							{
								 $answers_q = mysqli_query($_db,"SELECT `username`,`timestamp` FROM `forum-answers` WHERE `post_id`='". $post['id'] . "' ORDER BY `timestamp` DESC LIMIT 1");
								  $last_answer = mysqli_fetch_array( $answers_q );
								  $last_answer_form = "<a href='./?p=viewprofile&u=". $last_answer['username']. "'>". $last_answer['username']. "</a>" ;
								  $last_answer_time =  maketime($last_answer['timestamp']);
						  }
						  else
							{
							$last_answer_form = "---";
							$last_answer_time = "";
							}
							
							
					  if($post['locked'] == 'true')
						{
						 $locked_img = "<img src='./images/icons/lock.png' width='16'  border='0' alt='Заключена'/> ";
						}
						else
							{
							 $locked_img = "<img src='./images/icons/nonew_small.png' width='16'  border='0' alt='Заключена'/> ";
							}
						  
						   echo "\n<tr class='row'>\n";
							   echo "
								   <td>".$locked_img." <a href='./?p=forum&w=read&c=".$fcat['cat_id']."&read=". $post['id'] . "'>". $post['topic-title'] . "</a></td>
								   <td class='center'>".$post['views']."</td>
								   <td class='center'>".$answers."</td>
								   <td class='center'>".$last_answer_form."  <br /> <small>".$last_answer_time."</small></td>
							   ";
						   echo "\n</tr>\n";
						 
						}
			 // echo "\n<thed></thed> \n";
			  echo "\n</table>\n";
		}
		else
			{
			 error(" Няма добавени теми ... ");
			}
	 }
	 
	
	?>
