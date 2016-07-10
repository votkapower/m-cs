<?php
													  
$JS_NAME = "hidden-panels-plugin.js";
				//  Замествам страницата
				
						   $file = "../index.php";
						   $cont =  file_get_contents($file);
						   $new_row = "<!--sitefxplugin--><script type='text/javascript' src='./scripts/".$JS_NAME."'></script><!--sitefxplugin-->";
						   $cont = str_replace("<!---{PLUGINS}--->",$new_row."\n <!---{PLUGINS}--->", $cont);
						   $fo = fopen($file,"w+");
						   fwrite($fo,$cont);
						   fclose($fo);
		
					$fa =  fopen("../scripts/".$JS_NAME."","w+");
					fwrite($fa, $script_html);
					fclose($fa);
					
				// Правим нов JS файл във /роот/scripts/bg-music-plugin.js .. 	
			 	   $filer = "../scripts/".$JS_NAME;
						 //  $cont =  file_get_contents($file);
						   $js_cont = "$(function () {
						   
							$('div').find('#panel-top').each(function () {
						         $(this).attr(\"style\",'cursor:pointer;').attr(\"title\",'Цъкни за да покажеш/скриеш панела');
									$(this).click(function () {
						
											$(this).next().slideToggle(300);
						
									});
										
							});
						   
						   });";
						   
						   $fo = fopen($filer,"w+");
						   fwrite($fo, $js_cont);
						   fclose($fo);
						
					
						   
	 mysqli_query($_db,"UPDATE `plugins` SET `installed`='true' WHERE `plugin_name`='$title'") or DIE(mysqli_error($_db));
	 ok("Плъгина беше инсталиран успешно :)");
	echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=plugins\" >"; // 
	

