  <div id='panel-top'>Потребители</div>
   <div id='panel-bottom'>
   
    <table cellpadding='3' cellspacing='0' style='width:100%;' >	
		<tr align='center'>
		  <td style='border-bottom:1px solid #666;'> # </td>
		  <td style='border-bottom:1px solid #666;'> Потребител </td>
		  <td style='border-bottom:1px solid #666;'> Емайл </td>
		  <td style='border-bottom:1px solid #666;'> Ранг </td>
		  <td style='border-bottom:1px solid #666;'> Статус </td>
		</tr>
      <?php
		mysqli_query($_db,"SET NAMES utf8"); // ENCODING FIX
		$users_q = mysqli_query($_db,"SELECT * FROM `users` ORDER BY `timestamp` DESC "); // Слагам ЛИМИТ -> 5 , но ти можеш да го махнеш .. ;)
		$i=0;
		while($user = mysqli_fetch_array( $users_q))
		{
			$i++;
			 if($user['type'] == "admin" ) { $type = "<b>Админ</b>";}else{ $type = "Потребител";}
			 if($user['timestamp'] > (time() - 1*60) ) { $status = "<img src='./images/icons/online.png' width='15'  border='0' title='Онлайн'/>";}else{ $status = "<img src='./images/icons/offline.png' width='15'  border='0' title='Офлайн'/>";}
			echo "<tr align='center'>
			<td><b>$i</b></td>
			<td><a href='./?p=viewprofile&u=".$user['username']."'>".$user['username']."</a></td>
			<td><a href='mailto:".$user['email']."' title='".$user['email']."'>Емайл</a></td>
			<td>".$type."</td>
			<td>".$status."</td>
			</tr>";
		}
		?>
		
    </table>  
  </div>