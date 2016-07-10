<?php
//// DELETE  .. 
$what = trim(htmlspecialchars(trim($_GET['w'])));
$id = (int)$_GET['i'];

if(!$id || $id < 1)
{ 
 header("Location: ./");
 exit; 
}
		 switch ($what) {
		
		 
		  case "news":
		    if($id)
			{
			    mysqli_query($_db,"DELETE FROM `news` WHERE `id`='$id'");
				$url ="./?p=list_of&w=news";
				header("Location: ".$url);
				exit;
			}
		  break;	

		  
		  
		  case "polls":
		    if($id)
			{
			    mysqli_query($_db,"DELETE FROM `poll` WHERE `id`='$id'") or die(mysqli_error($_db));
				mysqli_query($_db,"DELETE FROM `otgovori` WHERE `id_poll`='$id'") or die(mysqli_error($_db));
				$url ="./?p=list_of&w=polls";
				header("Location: ".$url);
				exit;
			}
		  break;
		  

		  
		    
		  case "banners":
		    if($id)
			{
			    mysqli_query($_db,"DELETE FROM `banners` WHERE `id`='$id'");
				$url ="./?p=list_of&w=banners";
				header("Location: ".$url);
				exit;
			}
		  break;
		    
		  case "users":
		   if($id)
			{
			   
				/// когато се трие потребител трябва да се изтрие и папката му !
				$username = mysqli_fetch_array(mysqli_query($_db,"SELECT `username` FROM `users` WHERE `id`='$id'")); // взимам името
				$username = $username['username']; // присвоявам го тука .. 
				@EmptyDir("../user-avatars/".$username); // изчиствам му папката .. 
				@rmdir("../user-avatars/".$username); // махам и самата ппка
			    mysqli_query($_db,"DELETE FROM `users` WHERE `id`='$id'"); // трияго и от ДБ-то
				$url ="./?p=list_of&w=users"; // урл-а
				header("Location: ".$url); // и препращам към урл-а
				exit;
			}
		  break;
		 
		 }
		?>
		 
		
</div>