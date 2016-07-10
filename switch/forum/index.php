<?php
/*
DB:
 forum-answers
 forum-cats
 forum-posts
 forum-settings
 
*/

$q_settings = mysqli_query($_db,"SELECT * FROM `forum-settings` ORDER BY `id` DESC LIMIT 1");
$setting = mysqli_fetch_array($q_settings); // use-forum  	hide-locked-posts 	allow-user-to-edit-own-posts 	allow-quick-answer 

if($setting['use-forum'] == "false" OR empty($setting['use-forum']) OR !$setting['use-forum'])
{
  header("Location: ./?p=index");
  exit;
}

?>
  <div id='panel-top'>Форум</div>
   <div id='panel-bottom'>
   

			<?php
			$w = trim(htmlspecialchars($_GET['w']));
				switch($w)
				{
					 default:
						include "./switch/forum/parts/list-forums.php";
							echo " <br id='clear'/>";
					 break;
					 
					 case "read":
						include "./switch/forum/parts/read-forum.php";
							echo " <br id='clear'/>";
					 break;
					 
					 case "from":
						include "./switch/forum/parts/from-cat.php";
							echo " <br id='clear'/>";
					 break;
				
					 case "fromuser":
						include "./switch/forum/parts/from-user.php";
							echo " <br id='clear'/>";
					 break;
				
					 case "new-post":
						include "./switch/forum/parts/new-post.php";
						echo " <br id='clear'/>";
					 break;
					 
					 case "advanced-reply":
						include "./switch/forum/parts/advanced-reply.php";
						echo " <br id='clear'/>";
					 break;
					 
					 case "edit":
						include "./switch/forum/parts/edit-post.php";
						echo " <br id='clear'/>";
					 break;
				
					 
					 case "del":
						include "./switch/forum/parts/delete-post.php";
						echo " <br id='clear'/>";
					 break;
				
					 case "edit-answer":
						include "./switch/forum/parts/edit-answer.php";
						echo " <br id='clear'/>";
					 break;
				
					 case "report-post":
						include "./switch/forum/parts/report-post.php";
						echo " <br id='clear'/>";
					 break;
				}

			?>

			 
	
  </div>
  
   <br id='clear'/>