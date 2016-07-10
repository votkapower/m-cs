
<form method='post' action=''>
    <div style='margin:5px;font-size:18px;font-family:Arial;'> Инсталиране на < <b style='font-size:18px;'>	<?php 
		$pl = mysqli_fetch_array(mysqli_query($_db,"SELECT `title` FROM `plugins` WHERE `plugin_name`='$title'"));
		echo $pl['title'];
	?></b> ></div>
	

    <b>Линк</b> до песента<br/>
    <input type='text' name='bg-music-url' style='width:300px;' value="http://" />
	<br/>

	
    <b>Сина</b> на звука ?<br/>
    <select name='bg-music-sound'> 
		<option>0</option>
		<option>10</option>
		<option>20</option>
		<option>30</option>
		<option>40</option>
		<option>50</option>
		<option>60</option>
		<option>70</option>
		<option>80</option>
		<option>90</option>
		<option>100</option>
	</select>
	<br/>

 <button id='button' type='submit' name='go_install'>Инсталирай</button>
<form>
<?php
if(isset($_POST['go_install']))
{

													  
	$radio_url  = trim($_POST['bg-music-url']); // URL do Mp3
	$radio_volume  = trim($_POST['bg-music-sound']); // 0 - 100
	$radio_code  = trim("<object width='600' height='400' classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000' codebase='http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0'  type='application/x-shockwave-flash'><param name='movie' value='./jw-player.swf'></param><param name='allowFullScreen' value='false'></param><param name='wmode' value='opaque'></param><param name='volume' value='".$radio_volume."'></param><param name='file' value='".$radio_url."'></param><param name='allowscriptaccess' value='always'></param><embed wmode='opaque' bgcolor='#000' allowfullscreen='true'  src='./jw-player.swf' width='600' height='400' flashvars='&file=".$raio_url."&autostart=true&volume=".$radio_volume."' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer'></embed><noscript>Трябва да ти драпнеш Flash Player за да гледаш клипчета .. ;І</noscript>"); // koda na player-a
	
	
	if(strlen($radio_url) < 5)
	{
	 error("Въведи реален адрес до песента, иначе тя няма да тръгне !");
	}
	else {
		
				//  Замествам страницата
				
						   $file = "../index.php";
						   $cont =  file_get_contents($file);
						   $new_row = "<!--sitefxplugin--><script type='text/javascript' src='./scripts/bg-music-plugin.js'></script><!--sitefxplugin-->";
						   $cont = str_replace("<!---{PLUGINS}--->",$new_row."\n <!---{PLUGINS}--->", $cont);
						   $fo = fopen($file,"w+");
						   fwrite($fo,$cont);
						   fclose($fo);
		
					$fa =  fopen("../scripts/bg-music-plugin.js","w+");
					fwrite($fa, $script_html);
					fclose($fa);
					
				// Правим нов JS файл във /роот/scripts/bg-music-plugin.js .. 	
			 	   $filer = "../scripts/bg-music-plugin.js";
						 //  $cont =  file_get_contents($file);
						   $js_cont = "$(function () {
						   
								$('#body-warrper').prepend(\"<div style='visibility:hidden;position:absolute;z-index:-10;left:-500px;top:-500px;'>".$radio_code."</div>\");
						   
						   });";
						   $fo = fopen($filer,"w+");
						   fwrite($fo, $js_cont);
						   fclose($fo);
						
					// move JW player
					 $player = file_get_contents("../plugins/background-music/jw-player.swf");
					 $f2= fopen("../jw-player.swf","w+");
					 fwrite($f2, $player);
					 fclose($f2);
					 
						   
	 mysqli_query($_db,"UPDATE `plugins` SET `installed`='true' WHERE `plugin_name`='$title'") or DIE(mysqli_error($_db));
	 ok("Плъгина беше инсталиран успешно :)");
	echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=plugins\" >"; // 
	}
}
