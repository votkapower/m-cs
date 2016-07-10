  <div id='panel-top'>Новини</div>
   <div id='panel-bottom'>
      <?php
mysqli_query($_db,"SET NAMES utf8"); // ENCODING FIX
$news_q = mysqli_query($_db,"SELECT `title`,`text`,`author`,`timestamp` FROM `news` ORDER BY `id` DESC LIMIT ".NEWS_LIMIT); // Слагам ЛИМИТ -> 5 , но ти можеш да го махнеш .. ;)
	while($news = mysqli_fetch_array($news_q))
	{
?>
	<div id="news-title"> <?php echo htmlspecialchars_decode($news['title']);?> </div>
	<div id='the-news-text'><?php echo nl2br(htmlspecialchars_decode($news['text']));?> </div>

	<div id='credits'> от <a href="./?p=viewprofile&u=<?php echo $news['author'];?>"><?php echo $news['author'];?></a> <span style='float:right;font-size:12px;'>на <a href='#'><?php echo date("d.m.Y",$news['timestamp']);?>г.</a></span> </div>
<?php
	}
?>
  </div>