<?php
mysqli_query($_db,"SET NAMES utf8"); // ENCODING FIX
$user = trim(htmlspecialchars($_GET['u']));
$user_q = mysqli_query($_db,"SELECT * FROM `users` WHERE `username`='$user'");
$u_check = mysqli_num_rows($user_q);
if($u_check != 1)
{
 header("Location: ./?p=index");
 exit;
}
$u = mysqli_fetch_array($user_q);
$sega = time() - 2*60;
if($u['timestamp'] > $sega){ $status = "<img src='./images/icons/online.png' width='15' border='0' title='Онлайн'/>";}else{ $status = "<img src='./images/icons/offline.png' width='15' border='0' title='Онлайн'/>";}
?> 
<div id='panel-top'>Профила на  <?php echo $u['username']; ?> </div>
<div id='panel-bottom'>

 <div id='user-profile-image'>
		<img src='<?php echo $u['avatar']; ?>'  border='0' title='Аватара на <?php echo $u['username']; ?>'/>
 </div>
 <div id='right'>
  <b id='username-style'><?php echo $u['username']; ?></b> <span style='float:right;'><? echo $status;?></span>
  <div id='u-desc'>Описание: <div><?php if(  $u['desc'] ) { echo $u['desc'];  } else{ echo " .. няма дадено ..";}; ?></div></div>
 </div> 
 

	 <div align='right' id='user-opts'> <a href='./?p=sendpm&t=<?php echo $u['username']; ?>'>Изпрати ЛС</a> </div>
	
<div id='clear'></div> 
<div id='user-cs-info'>
	CS Ник: <b><?php if ($u['Csnick']) { echo $u['Csnick']; }else{ echo " няма даден";} ?></b><br />
	Любим мап:  <b><?php if ($u['favorite_map']) { echo $u['favorite_map'];  }else{ echo " няма даден";}; ?></b><br />
	Любим тип сървър: <b><?php if ($u['favorite_server_type']) { echo $u['favorite_server_type'];} else{  echo " няма даден"; } ?></b> <br />
	Предпочита да играе като: <b><?php if( $u['like_to_play_like'] == "1" ){ echo "Терорист";}else{ echo "Контра-Терорист";} ?></b> <br />

</div>
</div>