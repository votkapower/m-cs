<div id='panel-top'>Бан система</div>
<div id='panel-bottom'>
<form method='post' action=''>
	<textarea name='ban-list-edit-view' style='width:800px;height:500px;'><?php
	 $file = "../.htaccess";
	 if(file_exists($file))
	 {
	   if(filesize($file) != 0)
	   {
		echo trim(file_get_contents($file)); 
	   }
	 }
	?></textarea>
	<br/>
	<button type='submit'  name='edit_list'>Промени списъка !</button>
</form>
<?php
	if(isset($_POST['edit_list']))
	{
	   $fa = fopen($file, "w");
	   $p_cont = trim($_POST['ban-list-edit-view']);
	   fwrite($fa,$p_cont);
	   fclose($fa);
		ok("Списъка е успешно променен :)"); // казваме ,че плъгина Е инсталиран 
		echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./\" >"; // презареждаме страницата);
	}
?>
</div>
