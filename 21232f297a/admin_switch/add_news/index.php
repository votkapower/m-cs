
<div id='panel-top'>Добавяне на новина</div>
<div id='panel-bottom'>
		<form method='post' action=''>
							<b>Заглавие</b> на новината <br/>
							<input type='text' name='news-title' style='width:500px;' value='<?php echo $_POST['news-title'];?>' maxlength='255' /> <br/>
							
							<b>Текст</b> на новината <br/>
							<textarea name='news-text'  style='width:500px;height:130px;' ><?php echo $_POST['news-text'];?></textarea> <br/>
							
							<b>Автор</b> на новината <br/>
							<input type='text' name='news-author' style='width:150px;' maxlength='50' value='<? echo $_SESSION['user']['username'];?>' /> <br/>
						<span style='position:absolute; margin-left:350px; margin-top:-53px;'>	
							<b>Дата</b>  - <span style='font-size:9px;'>Ден . Месец . Година (с числа)</span><br/>
							<input type='text' name='news-date' style='width:150px;' maxlength='10' value='<? echo date("d.m.Y");?>' /> <br/>
					 </span>
					 <div id='clear'></div>
				 <button type='submit' name='add_my_news'>Добави новината</button>
				 <?php
				  if(isset($_POST['add_my_news']))
				  {
				    $news_title = trim(htmlspecialchars($_POST['news-title']));
				    $news_text = trim(htmlspecialchars($_POST['news-text']));
				    $news_author = trim(htmlspecialchars($_POST['news-author']));
				    $news_date = trim(htmlspecialchars($_POST['news-date']));
					$date = time();
					if(empty($news_title) or empty($news_text) or empty($news_author) or empty($news_date))
					{
					  error("Попълни всички полета .. !");
					}
					else
						{
						   mysqli_query($_db,"INSERT INTO `news` (`title`,`text`,`timestamp`,`author`)VALUES('$news_title','$news_text','$date','$news_author')");
						   ok("Новината е успешно добавена .. :)");
						   echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=".$_GET['p']."\" >";
						}
				  }
				 ?>
		</form>
</div>