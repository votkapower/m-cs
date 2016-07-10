
<?php
/*
DB:
 forum-answers
 forum-cats
 forum-posts
 forum-settings
 
*/

$forum_cat_id = (int)trim(htmlspecialchars($_GET['c']));

$cat_info = mysqli_fetch_array(mysqli_query($_db,"SELECT `title` FROM `forum-cats` WHERE `cat_id`='".$forum_cat_id."'")); // взимам отделно името на кеатегорията да мога да го изплюЩяя ейтука в хронологията .. ;d
?>


 <div id='forum-navigation-hron'><a href="./?p=forum">Форум</a> &raquo; <?php echo $cat_info['title'];?></div>
 

<?php

// Понеже този файл се инклуудва, а в бащиния файл имаме масива $settings , то може да го ползваме и тука .. :)

 $forum_possts_where  = "";
if($setting['hide-locked-posts'] == "true")
{
 $forum_possts_where = " AND `locked`='false' ";
}



	 $forums_cats_q = mysqli_query($_db,"SELECT * FROM `forum-cats` WHERE `cat_id`='".$forum_cat_id."'");
	 while($fcat = mysqli_fetch_array($forums_cats_q))
	 {
	    echo "<div class='thead' style='color:darkred;font-family:Arial;'>".$fcat['title']."</div>";
		
		
		echo "\n<table cellpadding='15' cellspacing='0' border='0'  class='forum-table' >
				 <tr>
				 <th width='600' align='left'>Тема</th>
				 <th>Преглеждания</th>
				 <th>Отговори</th>
				 <th>Последен отговор</th>
				 </tr>\n";
				$forum_posts_q = mysqli_query($_db,"SELECT * FROM `forum-posts` WHERE `cat_id`='".$fcat['cat_id']."' ".$forum_possts_where." ORDER BY `id` DESC");
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
							   <td>".$locked_img ." <a href='./?p=forum&w=read&c=".$fcat['cat_id']."&read=". $post['id'] . "'>". $post['topic-title'] . "</a></td>
							   <td class='center'>".$post['views']."</td>
							   <td class='center'>".$answers."</td>
							   <td class='center'>".$last_answer_form."  <br /> <small>".$last_answer_time."</small></td>
						   ";
					   echo "\n</tr>\n";
					 
					}
		  echo "\n</table>\n";
	 }
	
	?>
