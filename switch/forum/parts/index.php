  <div id='panel-top'>Форум</div>
   <div id='panel-bottom'>
   

	<?php
	 $forums_cats_q = mysqli_query($_db,"SELECT * FROM `forum-cats` ORDER BY `cat_id` DESC");
	 while($fcat = mysqli_fetch_array($forums_cats_q))
	 {
	    echo "<div style='background:#000;'><b style='padding:7px 15px;display:block;'>".$fcat['title']."</b></div>";
		
		
		echo "\n<table cellpadding='3' cellspacing='0' border='0'>
				 <tr>
				 <th width='600'>Тема</th>
				 <th>Преглеждания</th>
				 <th>Отговори</th>
				 <th>Последен отговор</th>
				 </tr>\n";
				$forum_posts_q = mysqli_query($_db,"SELECT * FROM `forum-posts` WHERE `cat_id`='".$fcat['cat_id']."' ORDER BY `id` DESC");
					while( $post = mysqli_fetch_array($forum_posts_q))
					{
					  
					   echo "\n<tr>\n";
						   echo "
							   <td>".$post['topic-title'] . "</td>
							   <td class='center'>".$post['views'] . "</td>
							   <td class='center'>".$post['views'] . "</td>
							   <td class='center'>".$post['username'] . "</td>
						   ";
					   echo "\n</tr>\n";
					 
					}
		  echo "\n</table>\n";
	 }
	
	?>

	
  </div>