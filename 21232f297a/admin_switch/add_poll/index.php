
<div id='panel-top'>Добавяне на Анкета</div>
<div id='panel-bottom'>
		<form method='post' action=''>
							<b>Въпрос</b><br/>
							<input type='text' name='poll-question' style='width:400px;' value='<?php echo $_POST['poll-question'];?>' maxlength='255' /> <br/>
							
							<p class='hr'></p>
							<?php
							 $i = 0;
							 while($i < 7)
							 {
							  $i++;
							  echo "<b>Отговор $i</b> <br/>
							<input type='text' name='poll-answer-$i' style='width:200px;' maxlength='50' value='".$_POST['poll-answer-'.$i]."' /> <br/>";
							
							 }
							?>

					
					 <div id='clear'></div>
					 <button type='submit' name='add_poll'>Добави анкетата</button>
				 <?php
				  if(isset($_POST['add_poll']))
				    {
				     $vapros = trim(htmlspecialchars($_POST['poll-question'])); 	 
				     $pols = mysqli_num_rows(mysqli_query($_db,"SELECT * FROM `poll`"));
					 mysqli_query($_db,"UPDATE `poll` (`status`)VALUES('0')");
					 mysqli_query($_db,"INSERT INTO `poll` (`vapros`,`status`)VALUES('$vapros', '1')")or die( mysqli_error($_db));

						for($i=0; $i < 10; $i++)
						 {  
						   
						    $answer[$i] = trim(htmlspecialchars($_POST['poll-answer-'.$i]));
							if(!empty( $answer[$i] ))
							{
							  //$p = mysqli_fetch_array(mysqli_query($_db,"SELECT * FROM `poll` ORDER BY `id` DESC LIMIT 1"));
							  $p = mysqli_fetch_array(mysqli_query($_db,"SELECT * FROM `poll` WHERE `vapros`='$vapros' ORDER BY `id` DESC LIMIT 1"));
							  $pid = $p['id'];
						      mysqli_query($_db,"INSERT INTO `otgovori` (`id_poll`,`otgovor`,`broi`)VALUE('$pid','".$answer[$i]."','0')")or die(mysqli_error($_db));
							}
						 }
					
						ok("Анкетата е успешно създадена !");
						 echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=".$_GET['p']."\" >";
				    }
				 ?>
		</form>
</div>