<?php
if($_SESSION['is_logged'] == true)
{
 header("Location: ./?p=index");
 exit;
}	
mysqli_query($_db,"SET NAMES utf8"); // ENCODING FIX
      
?>
  <div id='panel-top'>Регистрация</div>
   <div id='panel-bottom'>
      <form method='post' action=''>
	  
	   Потребител <br/>
		<input type='text' name='username' value="<?php echo $_POST['username'];?>" maxlength="50" /><br/>
		
	   Парола <br/>
		<input type='password' name='password' value=""  maxlength="50"/><br/>
		
	   Повтори паролата <br/>
		<input type='password' name='password2' value="" maxlength="50" /><br/>
		
	   Емейл <br/>
		<input type='text' name='email' value="<?php echo $_POST['email'];?>" maxlength="60" /><br/>
		
	   Аз съм <br/>
		<select  name='gener'>
			<option value='1'>Момче</option>
			<option value='2'>Момиче</option>
		</select>
		<br/>
			
		<button type='submit' name='reg-me-in'>Регистрирай ме</button> <button type='reset'>Изчисти</button>
	  </form>
	  <?php
	  if(isset($_POST['reg-me-in']))
	  {
	    $username = trim(addslashes(htmlspecialchars($_POST['username'])));
	    $password = trim(addslashes(htmlspecialchars($_POST['password'])));
	    $password2 = trim(addslashes(htmlspecialchars($_POST['password2'])));
	    $email = trim(addslashes(htmlspecialchars($_POST['email'])));
	    $gener = trim(addslashes(htmlspecialchars($_POST['gener'])));
		
		$u_check = mysqli_num_rows(mysqli_query($_db,"SELECT * FROM `users` WHERE `username`='$username'"));
		if(strlen($username) < 3)
		{
		  error("Потребителското ти име е прекалено кратко, то трябва да съдържа повече от 3 символа !");
		}
		else if($u_check > 0)
		{
		  error("Такъв потребител вече съществова ! Избери си друго име.");
		}
		else if( (empty($password) OR empty($password2)) OR $password != $password2)
			{
			  error("Двете пароли НЕ съвпадат !");
			}
			else if(strlen($email) < 10)
				{
				  error("Не валиден емайл !");
				}
				else if(!is_int($gener) && $gener != "1" && $gener != "2")
					{
					  error("Не валиден  ПОЛ !");
					}
					else
						{
						  
						  $time = time();
						  @mkdir("./user-avatars/".$username.""); // правим папка с името му..
						  make_thumb("./images/no-server-image.png", "./user-avatars/".$username."/".$username.".jpg", 100);
						  $fo = @fopen("./user-avatars/".$username."/index.php","w+");
						  @fwrite($fo,"<?php \r header('Location: '.\$_SERVER['HTTP_REFERER']); \n exit; ");
						  @fclose($fo);
						  mysqli_query($_db,"INSERT INTO `users` (`username`,`password`,`avatar`,`gener`,`email`,`timestamp`)VALUES('$username','".md5($password)."','./user-avatars/".$username."/".$username.".jpg','$gener','$email','$time')")or die(mysqli_error());
						  ok("Регистрацията мина успешно. Сега може да сe логнеш :)");
						  echo "<meta http-equiv='refresh' content='2;URL=./?p=index' >";
						  
						}
	  }
	  ?>
  </div>