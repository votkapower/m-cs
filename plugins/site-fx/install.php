
<form method='post' action=''>
    <div style='margin:5px;font-size:18px;font-family:Arial;'> Инсталиране на < <b style='font-size:18px;'>	<?php 
		$pl = mysqli_fetch_array(mysqli_query($_db,"SELECT `title` FROM `plugins` WHERE `plugin_name`='$title'"));
		echo $pl['title'];
	?></b> ></div>
	
    <b>Ефект</b> на показване на сайта<br/>
    <select name='pl-fx-type'  style='width:500px;' > 
		<option value="fadeIn">Федй Ефект</option>
		<option value="slideDown">Слайд Даун Ефект</option>
		<option value="toggle">Разкриване от Ляво -> Дясно</option>
	</select>
	<br/>

    <b>Време</b> за действие<br/>
    <input type='text' name='pl-time-ms' style='width:300px;' value="800" /> ms (мили секунди)
	<br/>

 <button id='button' type='submit' name='go_install'>Инсталирай</button>
<form>
<?php
if(isset($_POST['go_install']))
{

													  
	$fx  = trim($_POST['pl-fx-type']);
	$delay = (int)$_POST['pl-time-ms'];
	
	
	if($fx == "fadeIn")
	{
	$script_html = ("
	 
		  $(function () {
		       $('#body-warrper').css('display','none');
			   $('#body-warrper').fadeIn(".$delay.");
		  });
	 ");
	}
	else if( $fx == "slideDown")
		{
			
			$script_html = ("
					$(function () {
					    $('#body-warrper').css('display','none');
						$('#body-warrper').slideDown(".$delay."); // SITE FX PLUGIN
					});
				");

		}
		else if( $fx == "toggle")
			{
				
					$script_html = ("
						$(function () {
							$('#body-warrper').css('display','none');
							$('#body-warrper').toggle(".($delay)."); // SITE FX PLUGIN
						});
					");

			}
			

		
				//  Замествам страницата
				
				
						   $file = "../index.php";
						   $cont =  file_get_contents($file);
						   $new_row = "<!--sitefxplugin--><script type='text/javascript' src='./scripts/site-fx.js'></script><!--sitefxplugin-->";
						   $cont = str_replace("<!---{PLUGINS}--->",$new_row."\n <!---{PLUGINS}--->", $cont);
						   $fo = fopen($file,"w+");
						   fwrite($fo,$cont);
						   fclose($fo);
		
					$fa =  fopen("../scripts/site-fx.js","w+");
					fwrite($fa, $script_html);
					fclose($fa);
						   
	 mysqli_query($_db,"UPDATE `plugins` SET `installed`='true' WHERE `plugin_name`='$title'") or DIE(mysqli_error());
	 ok("Плъгина беше инсталиран успешно :)");
	echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=plugins\" >"; // 
	}
