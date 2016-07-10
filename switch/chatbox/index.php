  <div id='panel-top'>Чатбокс</div>
   <div id='panel-bottom'>


		 <form action="" method="post">
        <textarea maxlength="500" name='user-comment' id='chat-msg-insert-big' style='width:385px;height:120px;'></textarea>
        <br />
        <button type='submit' name='write-that-in'>Напиши</button>
        <span style='float:right' id='emoes-linkster-big'><a href='javascript:;' id='emoticons-shower-big'>емотиконки</a></span>
    </form>
    <?php
     if(isset($_POST['write-that-in']))
					{
					   if($_SESSION['is_logged'] == true)
								{
									
										$comment =  trim(htmlspecialchars($_POST['user-comment']));
										$username = $_SESSION['user']['username']; 	
										$time = time();
										if(strlen($comment) < 2)
										{
												error("Прекалено кратко мнение !");	
										}
										else if(strstr($comment,"asd")) // проверка за спам .. :)
										{
												error("Мнението ти е безсмисленно !");	 
										}
										else
											{
												 mysqli_query($_db,"SET NAMES utf8");
												mysqli_query($_db,"INSERT INTO `chatbox` (`username`,`comment`,`timestamp`)VALUES('$username','$comment','$time')") OR die(mysqli_error());
												
												$num = mysqli_num_rows(mysqli_query($_db,"SELECT * FROM `chatbox` WHERE `timestamp`='$time'"));
												if($num > 1)
												{
												  mysqli_query($_db,"DELETE FROM `chatbox` WHERE `timestamp`='$time' LIMIT 1");
												}
												 
													ok("Готово! Успешно написано.");
													header("Location: ".$_SERVER['REQUEST_URI']);
											}
								}
								else
									{
									  error("Трабва да си логнат !");	
									}
					}
				?>
   
      <div id='chat-msg' >
		<?php
		
	$tableName="chatbox";		
	$targetpage = "./?p=chatbox"; 	
	$limit = 10; 
	
	$query = "SELECT COUNT(*) as num FROM $tableName ";
	$total_pages = mysqli_fetch_array(mysqli_query($_db,$query));
	$total_pages = $total_pages[num];
	$stages = 3;
	$page = (int)$_GET['page'];
	if($page){
		$start = ($page - 1) * $limit; 
	}else{
		$start = 0;	
		}	
	
    // Get page data

	$chatbox_q = mysqli_query($_db,"SELECT `timestamp`,`username`,`comment` FROM `$tableName` ORDER BY `timestamp` DESC LIMIT $start,$limit"); //sql  
	
	// Initial page num setup
	if ($page == 0 || !$page){$page = 1;}
	$prev = $page - 1;	
	$next = $page + 1;							
	$lastpage = ceil($total_pages/$limit);		
	$LastPagem1 = $lastpage - 1;					
	if($page > $lastpage) {  $page = 1;}
	
	$paginate = '';
	if($lastpage > 1)
	{	
	

	
	
		$paginate .= "<div class='paginate'>";
		// Previous
		if ($page > 1){
			$paginate.= "<a href='$targetpage&page=$prev' class='firstPageAct'>Предишна</a>";
		}else{
			$paginate.= "<span class='disabled'>Предишна</span>";	}
			

		
		// Pages	
		if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page){
					$paginate.= "<span class='current'>$counter</span>";
				}else{
					$paginate.= "<a href='$targetpage&page=$counter' class='defPage'>$counter</a>";}					
			}
		}
		elseif($lastpage > 5 + ($stages * 2))	// Enough pages to hide a few?
		{
			// Beginning only hide later pages
			if($page < 1 + ($stages * 2))		
			{
				for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage&page=$counter' class='defPage'>$counter</a>";}					
				}
				$paginate.= "...";
				$paginate.= "<a href='$targetpage&page=$LastPagem1' class='defPage'>$LastPagem1</a>";
				$paginate.= "<a href='$targetpage&page=$lastpage'>$lastpage</a>";		
			}
			// Middle hide some front and some back
			elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
			{
				$paginate.= "<a href='$targetpage&page=1' class='defPage'>1</a>";
				$paginate.= "<a href='$targetpage&page=2' class='defPage'>2</a>";
				$paginate.= "...";
				for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage&page=$counter' class='defPage'>$counter</a>";}					
				}
				$paginate.= "...";
				$paginate.= "<a href='$targetpage&page=$LastPagem1' class='defPage'>$LastPagem1</a>";
				$paginate.= "<a href='$targetpage&page=$lastpage'>$lastpage</a>";		
			}
			// End only hide early pages
			else
			{
				$paginate.= "<a href='$targetpage&page=1' class='defPage'>1</a>";
				$paginate.= "<a href='$targetpage&page=2' class='defPage'>2</a>";
				$paginate.= "...";
				for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage&page=$counter' class='firstPage'>$counter</a>";}					
				}
			}
		}
					
				// Next
		if ($page < $counter - 1){ 
			$paginate.= "<a href='$targetpage&page=$next' id='NEXTpageActive'>Следваща</a>";
		}else{
			$paginate.= "<span class='disabled' id='NEXTpagedisabled'>Следваща</span>";
			}
			
		$paginate.= "</div>";		
	
	
}
				
				
				
				// Странициранее ... 
			
		 mysqli_query($_db,"SET NAMES utf8"); // Encoding Fix
        //$chatbox_q = mysqli_query($_db,"SELECT * FROM `chatbox` ORDER BY `timestamp` DESC "); // Лимит 10 , но ти можеш да го махнеш .. :)
		$i=0;
        while($chat = mysqli_fetch_array($chatbox_q))
        {
		$i++;
          $border_bottom = "";
		 if($i == $limit) {$border_bottom = "style='border-bottom:0px;'"; }
          echo "<div id='user-msg' $border_bottom >
          <div id='user-and-date'>от <a href='./?p=viewprofile&u=".$chat['username']."'>".$chat['username']."</a> <span style='float:right;'> ".maketime($chat['timestamp'])."</span></div>
          <div style='padding:5px;'>".emoticons($chat['comment'])."</div>
          </div>";
        }
		
        ?>
      </div>
	  
	  <?php echo "<div id='pageing-div-holder'>".$paginate."</div>"; ?>
   </div>