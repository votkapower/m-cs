<?php
session_start();
if($_SESSION['is_logged'] != true AND $_SESSION['user']['username'] != trim(addslashes(htmlspecialchars($_GET['u']))))
{
 header("Location: ./?p=index");
 exit;
}	

$w = trim(htmlspecialchars($_GET['w']));
if(!$w){ $w = "avatar"; }
?>
<div id='panel-top'>Настройки</div>
	<div id='panel-bottom'>
	<div style='padding:5px;border-bottom:1px solid #666;' align='center'>
	<a href='./?p=settings&w=avatar'>Смени аватара</a> / <a href='./?p=settings&w=password'>Смени паролата</a> / <a href='./?p=settings&w=editme'>Редактирай си профила</a> </div>
		<?php
		switch($w)
		{
		  default:
			mysqli_query($_db,"SET NAMES utf8"); // ENCODING FIX
			$username = $_SESSION['user']['username'];
			$users_edit = mysqli_fetch_array(mysqli_query($_db,"SELECT * FROM `users` WHERE `username`='$username' ")); // 
			
			?>
			<form method='post' action='' enctype='multipart/form-data'>
			
					<div style='float:left;width:100px;padding:5px;'>
						<img src='<?php echo $users_edit['avatar'];?>' width='100' border='0' title='Текушата ти снимка' />
					</div>
					
					<div>
						<b>Избери</b> си иснимка - <b>JPG</b> <br/>
						<input type='file' name='my-image' value=""/><br/>
						<button name='upload-my-image' type='submit'>Качи</button>
					</div>
					
				<div id='clear'></div>
			</form>
		<?php
		 if(isset($_POST['upload-my-image']))
		 {
			$username = $_SESSION['user']['username'];
		    $image_name = $_FILES['my-image']['name'];
		    $image_tmp = $_FILES['my-image']['tmp_name'];
		    $image_type = $_FILES['my-image']['type'];
			
		    if( $image_type != "image/jpeg"  &&  $image_type != "image/jpg" )
			{
			  error("Не виждаш ли какво пише отгоре ?! Само JPG картинки ! ");
			}
			else
				{
				 if( !is_dir("./user-avatars")){ mkdir("./user-avatars", 0777); }
				   $to_dir = "./user-avatars/".$username."/".$username.".jpg"; // 
				   if(@!file_exists($to_dir)) // Ако потребителя няма папка с снимка .. 
				   { // правим му .. :D
				      @mkdir("./user-avatars/".$username.""); // правим папка с името му..
					  make_thumb("./images/no-server-image.png","./user-avatars/".$username."/".$username.".jpg",100);
					  $fo = @fopen("./user-avatars/".$username."/index.php","w+");
					  @fwrite($fo,"<?php \r header('Location: '.\$_SERVER['HTTP_REFERER']); \n exit; ");@fclose($fo);
				   }
				   move_uploaded_file($image_tmp, $to_dir); // качвам я колкото и да е голяма
				   make_thumb($to_dir,$to_dir,100); // просто я копирам с по-малък размер
				   mysqli_query($_db,"UPDATE `users` SET `avatar`='$to_dir' WHERE `username`='$username'"); // UPDATE
				   ok("Снимката ти е успешно сменена !"); // ОК сме .. 
				   echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"1;URL=./?p=".$_GET['p']."&w=avatar\" >"; //рефрешш след 2 сек.
				   
				}
		 }
		break;
		
		case "password":
		 ?>
		 <form method='post' action=''>
		  <b>Нова</b> парола <br />
			<input type='text' name='new-password' value='' maxlength='50' /><br />
			
		  <b>Повтори</b> паролата <br />
			<input type='text' name='new-password2' value=''  maxlength='50' /><br />
			
			<button name='change-my-passowrd'>Смени</button>
		 </form>
		 <?php
		 if(isset($_POST['change-my-passowrd']))
		 { 
		   $username = $_SESSION['user']['username'];
		   $new_password = trim(htmlspecialchars($_POST['new-passowrd']));
		   $new_password2 = trim(htmlspecialchars($_POST['new-passowrd2']));
		   if($new_password != $new_password2)
		   {
		     error("Двете пароли НЕ съвпадат !");
		   }
		   else
			  {
				  mysqli_query($_db,"UPDATE `users` SET `password` = '".md5($new_passowrd)."' WHERE `username='$username'`");
				  ok("Паролата ти е успешно сменена !"); // ОК сме .. 
				  echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"1;URL=./?p=".$_GET['p']."&w=passowrd\" >"; //рефрешш след 2 сек.
			  }
		 }
		break;
		
		
		case "editme":
		?>
		<div style='float:left;padding:5px;padding-right:10px;width:100px;'>
			<img src="<?php echo $_SESSION['user']['avatar'];?>" width='100' border='0' title='Твоята снимка ...' />
		</div>
		 <form method='post' action=''>
		  <b>Описание</b><br />
			<textarea name='my-desc'  maxlength='255' style='width:250px;'><?php echo $_SESSION['user']['desc'];?></textarea><br />
			
			
			
		  <b>Cs ник:</b> <br />
			<input name='my-cs-nick'  style='width:250px;' value="<?php echo $_SESSION['user']['Csnick'];?>" maxlength='60'/>
			<br />
			
			
			
		  <b>Любим мап:</b> <br />
			<input name='my-fave-map'  style='width:250px;' value="<?php echo $_SESSION['user']['favorite_map'];?>" maxlength='50'/>
			<br />
			
			
		  <b>Любим тип сървър:</b> <br />
			<input name='my-fave-server-type'  style='width:250px;' value="<?php echo $_SESSION['user']['favorite_server_type'];?>" maxlength='100'/>
			<br />	
			
		  <b>Обичам да играя като:</b> <br />
			<select  name='my-fave-team'  style='width:250px;' >
				<option value='1' <?php if( $_SESSION['user']['like_to_play_like'] == "1") {echo "selected";}?>>Терорист</option>
				<option value='2'  <?php if( $_SESSION['user']['like_to_play_like'] == "2") {echo "selected";}?>>Контра-терорист</option>
			</select>
			<br />
			
			
			
			
		  <b>Емайл</b> <br />
			<input name='my-email'  style='width:250px;' value="<?php echo $_SESSION['user']['email'];?>" maxlength='100'/>
			<br />	
					
					
			<b>Пол</b> <br />
			<select  name='my-gener'  style='width:250px;' >
				<option value='1' <?php if( $_SESSION['user']['gener'] == "1") {echo "selected";}?>>Момче</option>
				<option value='2'  <?php if( $_SESSION['user']['gener'] == "2") {echo "selected";}?>>Момиче</option>
			</select>
			<br />
			
			<button name='change-my-settings'>Едит</button>
		 </form>
		
		<?php
		if(isset($_POST['change-my-settings']))
		{
		  $username = $_SESSION['user']['username'];
		  $new_desc  = trim(htmlspecialchars($_POST['my-desc']));
		  $new_email = trim(htmlspecialchars($_POST['my-email']));
		  $new_gener = trim(htmlspecialchars($_POST['my-gener']));
		  $new_cs_nick = trim(htmlspecialchars($_POST['my-cs-nick']));
		  $new_fave_team = trim(htmlspecialchars($_POST['my-fave-team']));
		  $new_fave_map = trim(htmlspecialchars($_POST['my-fave-map']));
		  $new_fave_server_type = trim(htmlspecialchars($_POST['my-fave-server-type']));
		  
		  if( empty( $new_desc ) ||  empty( $new_email ) || empty(  $new_gener ) )
		  {
		   error("Попълни всички полета !");
		  }
		   else
			    {
					 mysqli_query($_db,"UPDATE `users` SET `desc` = '$new_desc', `gener`='$new_gener', `email`='$new_email', `like_to_play_like`='$new_fave_team', `favorite_server_type`='$new_fave_server_type', `Csnick`='$new_cs_nick', `favorite_map`='$new_fave_map' WHERE `username`='$username'");
					 ok("Профила ти е успешно променен !"); // ОК сме .. 
				     echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"1;URL=./?p=".$_GET['p']."&w=editme\" >"; //рефрешш след 2 сек.
				 }
		}
		
		break;
		}
		?>
	</div>