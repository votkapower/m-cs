
<form method='post' action=''>
    <div style='margin:5px;font-size:18px;font-family:Arial;'> Р РЅСЃС‚Р°Р»РёСЂР°РЅРµ РЅР° < <b style='font-size:18px;'>	<?php 
		$pl = mysqli_fetch_array(mysqli_query($_db,"SELECT `title` FROM `plugins` WHERE `plugin_name`='$title'"));
		echo $pl['title'];
	?></b> ></div>
	

    <b>Р—Р°РіР»Р°РІРёРµ</b> РЅР° РїР°РЅРµР»Р°<br/>
    <input type='text' name='radio-title' style='width:300px;' value="Р Р°РґРёРѕ РјРѕРґСѓР»" />
	<br/>

    <b>Р›РёРЅРє</b> РґРѕ СЂР°РґРёРѕС‚Рѕ :    <span style='margin-left:225px;'><b>РџРѕСЂС‚</b>:</span><br/>
    <input type='text' name='radio-url' style='width:300px;' value="" /> <b>:</b> <input type='text' name='radio-port' style='width:50px;' value="80" /> 
	<br/>
	
    <b>РљСЉРґРµ</b> РґР° РїРѕР·РѕС†РёРѕРЅРёСЂР°Рј СЂР°РґРёРѕС‚Рѕ ?<br/>
    <select name='radio-position'> 
		<option value="right-side">Р’ РґСЏСЃРЅР°С‚Р° РєРѕР»РѕРЅР°</option>
		<option value="left-side">Р’ Р»СЏРІР°С‚Р° РєРѕР»РѕРЅР°</option>
		<option value="center-side">Р’ СЃСЂРµРґРЅР°С‚Р° РєРѕР»РѕРЅР°</option>
	</select>
	<br/>

	
    <b>РљСЉРґРµ</b> РґР° РїРѕ-С‚РѕС‡РЅРѕ ?<br/>
    <select name='function'> 
		<option value="prepend">РќР°Р№-РѕС‚РіРѕСЂРµ</option>
		<option value="append">РќР°Р№-РѕС‚РґРѕР»Рѕ</option>
	</select>
	<br/>

 <button id='button' type='submit' name='go_install'>Р РЅСЃС‚Р°Р»РёСЂР°Р№</button>
<form>
<?php
if(isset($_POST['go_install']))
{

													  
	$radio_url  = trim($_POST['radio-url']);
	$radio_port  = trim($_POST['radio-port']);
	$side = trim($_POST['radio-position']); // left-side, right-side, center-side
	$f = trim($_POST['function']); // prepend, append
	$r_title = trim($_POST['radio-title']); /// Raion modile
	$radio_code  = "С‚СѓРєР° РєРѕРґР° Р·Р° СЂР°РґРёРѕРѕС‚Рѕ :)"; // koda na player-a
	
	
	if(strlen($radio_url) < 5)
	{
	 error("Р’СЉРІРµРґРё СЂРµР°Р»РµРЅ Р°РґСЂРµСЃ РґРѕ СЂР°РґРёРѕС‚Рѕ, РёРЅР°С‡Рµ С‚Рѕ РЅСЏРјР° РґР° С‚СЂСЉРіРЅРµ !");
	}
	else if(empty($radio_port) )
	{
	 error("Р’СЉРІРµРґРё РџРћР Рў РґРѕ СЂР°РґРёРѕС‚Рѕ, РёРЅР°С‡Рµ С‚Рѕ РЅСЏРјР° РґР° С‚СЂСЉРіРЅРµ !");
	}
	else if(empty($r_title) )
	{
	 error("Р’СЉРІРµРґРё Р—Р°РіР»Р°РІРёРµ РґРѕ РїР°РЅРµР»Р°, РёРЅР°С‡Рµ С‰Рµ СЃС‚РѕРё РјРЅРѕРіРѕ РіСЂРѕР·РЅРѕ !");
	}
	else {

			

		
				//  Р—Р°РјРµСЃС‚РІР°Рј СЃС‚СЂР°РЅРёС†Р°С‚Р°
				
						   $file = "../index.php";
						   $cont =  file_get_contents($file);
						   $new_row = "<!--sitefxplugin--><script type='text/javascript' src='./scripts/radio-module.js'></script><!--sitefxplugin-->";
						   $cont = str_replace("<!---{PLUGINS}--->",$new_row."\n <!---{PLUGINS}--->", $cont);
						   $fo = fopen($file,"w+");
						   fwrite($fo,$cont);
						   fclose($fo);
		
					$fa =  fopen("../scripts/site-fx.js","w+");
					fwrite($fa, $script_html);
					fclose($fa);
					
				// РџСЂР°РІРёРј РЅРѕРІ JS С„Р°Р№Р» РІСЉРІ /СЂРѕРѕС‚/scripts/radio-module.js .. 	
			 	   $filer = "../scripts/radio-module.js";
						 //  $cont =  file_get_contents($file);
						   $js_cont = "$(function () {
						   
								$('#".$side."').".$f."(\"<div id='panel-top'>".$r_title."</div><div id='panel-bottom'>".$radio_code."</div>\");
						   
						   });";
						   $fo = fopen($filer,"w+");
						   fwrite($fo, $js_cont);
						   fclose($fo);
						
					
						   
	 mysqli_query($_db,"UPDATE `plugins` SET `installed`='true' WHERE `plugin_name`='$title'") or DIE(mysqli_error());
	 ok("РџР»СЉРіРёРЅР° Р±РµС€Рµ РёРЅСЃС‚Р°Р»РёСЂР°РЅ СѓСЃРїРµС€РЅРѕ :)");
	echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=plugins\" >"; // 
	}
}
