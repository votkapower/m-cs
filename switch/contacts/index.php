  <div id='panel-top'>За контакти</div>
   <div id='panel-bottom'>
      
	   <form method='post' action=''>
	   
	     <b>Твоето</b> име: <br />
		  <input name='session-name' value="" style='width:200px;' maxlength='50'>	<br />
		  
		  
	     <b>Tвоят</b> емайл: <br />
		  <input name='session-email' value=""   style='width:230px;' maxlength='100'>	<br />
		  
		  
	     <b>Тема</b> на съобщението: <br />
		  <input name='session-title' value=""  style='width:250px;' maxlength='100'>	<br />
		  
	     <b>Съобщението</b>: <br />
		  <textarea name='session-msg'  style='width:385px;height:120px;'></textarea>	<br />
		  
		  
		  <button name='send-my-msg'>Изпрати</button>	<br />
	   </form>
	  <?php
	   if(isset($_POST['send-my-msg']))
	   {
	     $from = trim(htmlspecialchars($_POST['session-name']));
	     $tema = trim(htmlspecialchars($_POST['session-title']));
	     $email = trim(htmlspecialchars($_POST['session-email']));
	     $msg = trim(htmlspecialchars($_POST['session-msg']));
		 $time = time();
		 $ip = $_SERVER['REMOTE_ADDR'];
		 
		 if( empty($from) || empty($tema) ||  empty($msg) ||  empty($email) )
		 {
		   error("Трябва да попълниш всички полета !");
		 }
		 else	
			{
			  mysqli_query($_db,"INSERT INTO `contacts` (`title`,`msg`,`from`,`from_email`,`timestamp`,`readed`,`ip`)VALUES('$tema','$msg','$from','$email','$time','0','$ip')");
			  ok("Съобщението ти е изпратено успешно !");
			  echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=".$_GET['p']."\" >"; // резареждаме
			}
	   
	   }
	  ?>
  </div>