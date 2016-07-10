
<div id='panel-top'>Последната информация относно системата е тук</div>
<div id='panel-bottom'>
 <?php 
   $content = file_get_contents("http://cs.votkapower.eu/api.php?json=feed");
   if(strlen($content) > 1)
   {

  	 $feed = json_decode($content);
  	 foreach ($feed as $news) 
  	 {
  	 	?>
  	 	<h2><?php echo $news->title;?></h2>
  	 	<p><small><?php echo $news->date;?></small></p>
  	 	<p><?php echo htmlspecialchars_decode($news->text);?></p>
  	 	<hr>
  	 	<?php
  	 }
   }
 ?>              
</div>