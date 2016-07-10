<link rel="stylesheet" href="./styles/colorpicker.css" type="text/css" />
<link rel="stylesheet" href="./styles/layout.css" type="text/css" />
<script	 type="text/javascript">
$(function () {
<?php	
  echo FIX_ENCODING;
  
  $field = array(
   0 => "body-background",
   1 => "site-background",
   2 => "links-color",
   3 => "text-color",
   4 => "button-text-color", 
   5 => "button-text-shadow",
   6 => "buttons-shadow",
   7 => "button-gradient-top",
   8 => "button-gradient-bottom",
   9 => "panel-top-text-color",
  10 => "panel-top-gradient-top",
  11 => "panel-top-gradient-bottom",
  12 => "panel-bottom-background-color",
  13 => "panel-bottom-text-color",
  14 => "panel-border-color",
  15 => "menu-top-background",
  16 => "menu-bottom-background",
  17 => "menu-links-color",
  18 => "site-borders-color",
  19 => "input-background",
  20 => "input-text-color",
  21 => "input-border-color",
  
  
  22 => "success-msg-background-top",
  23 => "success-msg-background-bottom",
  24 => "success-msg-text-color",
  25 => "success-msg-border-color",
  26 => "error-msg-background-top",
  27 => "error-msg-background-bottom",
  28 => "error-msg-text-color",
  29 => "error-msg-border-color",
  30 => "menu-box-shadow-color",
  31 => "panel-top-box-shadow-color"); // 31
  
  $color = array( 
   0 => "#000000", 
   1 => "#212121",
   2 => "#9b0707",
   3 => "#CCCCCC",
   4 => "#110000",
   5 => "#8c0000",
   6 => "#000000",
   7 => "#660000",
   8 => "#490000",
   9 => "#840707",
  10 => "#262626",
  11 => "#000000",
  12 => "#333333",
  13 => "#888888",
  14 => "#000000",
  15 => "#262626",
  16 => "#000000",
  17 => "#9b0707",
  18 => "#000000",
  19 => "#212121",
  20 => "#CCCCCC",
  21 => "#000000",
  
  22 => "#0f770f",
  23 => "#0a490b",
  24 => "#0b1601",
  25 => "#0e1c02",
  26 => "#7f1f1f",
  27 => "#4f1313",
  28 => "#070000",
  29 => "#540a0a",
  30 => "#000000", 
  31 => "#000000"); // 31
  

  

			
	
	   
		if($_POST['body-background']){ $color[0] = $_POST["body-background"]; }else{ $color[0] = "#000000"; }
		if($_POST['site-background']){ $color[1] = $_POST["site-background"]; }else{ $color[1] = "#212121"; }
		if($_POST['links-color']){ $color[2] = $_POST["links-color"]; }else{ $color[2] = "#9b0707"; }
		if($_POST['text-color']){ $color[3] = $_POST["text-color"]; }else{ $color[3] = "#CCCCCC"; }
		if($_POST['button-text-color']){ $color[4] = $_POST["button-text-color"]; }else{ $color[4] = "#110000"; }
		if($_POST['button-text-shadow']){ $color[5] = $_POST["button-text-shadow"]; }else{ $color[5] = "#8c0000"; }
		if($_POST['buttons-shadow']){ $color[6] = $_POST["buttons-shadow"]; }else{ $color[6] = "#000000"; }
		if($_POST['button-gradient-top']){ $color[7] = $_POST["button-gradient-top"]; }else{ $color[7] = "#660000"; }
		if($_POST['button-gradient-bottom']){ $color[8] = $_POST["button-gradient-bottom"]; }else{ $color[8] = "#490000"; }
		if($_POST['panel-top-text-color']){ $color[9] = $_POST["panel-top-text-color"]; }else{ $color[9] = "#840707"; }
		if($_POST['panel-top-gradient-top']){ $color[10] = $_POST["panel-top-gradient-top"]; }else{ $color[10] = "#262626"; }
		if($_POST['panel-top-gradient-bottom']){ $color[11] = $_POST["panel-top-gradient-bottom"]; }else{ $color[11] = "#000000"; }
		if($_POST['panel-bottom-background-color']){ $color[12] = $_POST["panel-bottom-background-color"]; }else{ $color[12] = "#333333"; }
		if($_POST['panel-bottom-text-color']){ $color[13] = $_POST["panel-bottom-text-color"]; }else{ $color[13] = "#888888"; }
		if($_POST['panel-border-color']){ $color[14] = $_POST["panel-border-color"]; }else{ $color[14] = "#000000"; } 
		// novite
		if($_POST['menu-top-background']){ $color[15] = $_POST['menu-top-background']; }else{$color[15] = "#262626"; } 
		if($_POST['menu-bottom-background']){ $color[16] = $_POST['menu-bottom-background']; }else{$color[16] = "#000000"; } 
		if($_POST['menu-links-color']){ $color[17] = $_POST['menu-links-color']; }else{$color[17] = "#9b0707"; } 
		if($_POST['site-borders-color']){ $color[18] = $_POST['site-borders-color']; }else{$color[18] = "#000000"; } 
		if($_POST['input-background']){ $color[19] = $_POST['input-background']; }else{$color[19] = "#212121"; } 
		if($_POST['input-text-color']){ $color[20] = $_POST['input-text-color']; }else{$color[20] = "#CCCCCC"; } 
		if($_POST['input-border-color']){ $color[21] = $_POST['input-border-color']; }else{$color[21] = "#000000"; } 
		 		// Error & Succes MSG	

				// Success 
		
		if($_POST['success-msg-background-top']){ $color[22] = $_POST['success-msg-background-top']; }else{$color[22] = "#0f770f"; } 
		if($_POST['success-msg-background-bottom']){ $color[23] = $_POST['success-msg-background-bottom']; }else{$color[23] = "#0a490b"; } 
		if($_POST['success-msg-text-color']){ $color[24] = $_POST['success-msg-text-color']; }else{$color[24] = "#0b1601"; } 
		if($_POST['success-msg-border-color']){ $color[25] = $_POST['success-msg-border-color']; }else{$color[25] = "#0e1c02"; } 
	
			// Error 
		
		if($_POST['error-msg-background-top']){ $color[26] = $_POST['error-msg-background-top']; }else{$color[26] = "#7f1f1f"; } 
		if($_POST['error-msg-background-bottom']){ $color[27] = $_POST['error-msg-background-bottom']; }else{$color[27] = "#4f1313"; } 
		if($_POST['error-msg-text-color']){ $color[28] = $_POST['error-msg-text-color']; }else{$color[28] = "#070000"; } 
		if($_POST['error-msg-border-color']){ $color[29] = $_POST['error-msg-border-color']; }else{$color[29] = "#540a0a"; } 
		
		
		
		if($_POST['menu-box-shadow-color']){ $color[30] = $_POST['menu-box-shadow-color']; }else{$color[30] = "#000000"; } 
		if($_POST['panel-top-box-shadow-color']){ $color[31] = $_POST['panel-top-box-shadow-color']; }else{$color[31] = "#000000"; } 
		


		
		  // За едитване &w=edit&title=my-new-css-style

  
     
   $get_title = $_GET['title'];
   
if(strlen($get_title) > 3)
{  
	  $get_title = str_replace(".css","", $get_title);
	   $q = mysqli_query($_db,"SELECT * FROM `site-styles` WHERE `title` = '".$get_title."'");
	   $r = mysqli_fetch_array($q);
  

		
		if($r['body-background']){ $color[0] = $r["body-background"]; }else{ $color[0] = "#000000"; }
		if($r['site-background']){ $color[1] = $r["site-background"]; }else{ $color[1] = "#212121"; }
		if($r['links-color']){ $color[2] = $r["links-color"]; }else{ $color[2] = "#9b0707"; }
		if($r['text-color']){ $color[3] = $r["text-color"]; }else{ $color[3] = "#CCCCCC"; }
		if($r['button-text-color']){ $color[4] = $r["button-text-color"]; }else{ $color[4] = "#110000"; }
		if($r['button-text-shadow']){ $color[5] = $r["button-text-shadow"]; }else{ $color[5] = "#8c0000"; }
		if($r['buttons-shadow']){ $color[6] = $r["buttons-shadow"]; }else{ $color[6] = "#000000"; }
		if($r['button-gradient-top']){ $color[7] = $r["button-gradient-top"]; }else{ $color[7] = "#660000"; }
		if($r['button-gradient-bottom']){ $color[8] = $r["button-gradient-bottom"]; }else{ $color[8] = "#490000"; }
		if($r['panel-top-text-color']){ $color[9] = $r["panel-top-text-color"]; }else{ $color[9] = "#840707"; }
		if($r['panel-top-gradient-top']){ $color[10] = $r["panel-top-gradient-top"]; }else{ $color[10] = "#262626"; }
		if($r['panel-top-gradient-bottom']){ $color[11] = $r["panel-top-gradient-bottom"]; }else{ $color[11] = "#000000"; }
		if($r['panel-bottom-background-color']){ $color[12] = $r["panel-bottom-background-color"]; }else{ $color[12] = "#333333"; }
		if($r['panel-bottom-text-color']){ $color[13] = $r["panel-bottom-text-color"]; }else{ $color[13] = "#888888"; }
		if($r['panel-border-color']){ $color[14] = $r["panel-border-color"]; }else{ $color[14] = "#000000"; }
		// novite
		if($r['menu-top-background']){ $color[15] = $r['menu-top-background']; }else{$color[15] = "#262626"; }
		if($r['menu-bottom-background']){ $color[16] = $r['menu-bottom-background']; }else{$color[16] = "#000000"; }
		if($r['menu-links-color']){ $color[17] = $r['menu-links-color']; }else{$color[17] = "#9b0707"; }
		if($r['site-borders-color']){ $color[18] = $r['site-borders-color']; }else{$color[18] = "#000000"; } 
		if($r['input-background']){ $color[19] = $r['input-background']; }else{$color[19] = "#212121"; } 
		if($r['input-text-color']){ $color[20] = $r['input-text-color']; }else{$color[20] = "#CCCCCC"; } 
		if($r['input-border-color']){ $color[21] = $r['input-border-color']; }else{$color[21] = "#000000"; } 
	 		// Error & Succes MSG	

				// Success 
		
		if($r['success-msg-background-top']){ $color[22] = $r['success-msg-background-top']; }else{$color[22] = "#0f770f"; } 
		if($r['success-msg-background-bottom']){ $color[23] = $r['success-msg-background-bottom']; }else{$color[23] = "#0a490b"; } 
		if($r['success-msg-text-color']){ $color[24] = $r['success-msg-text-color']; }else{$color[24] = "#0b1601"; } 
		if($r['success-msg-border-color']){ $color[25] = $r['success-msg-border-color']; }else{$color[25] = "#0e1c02"; } 
	
			// Error 
		
		if($r['error-msg-background-top']){ $color[26] = $r['error-msg-background-top']; }else{$color[26] = "#7f1f1f"; } 
		if($r['error-msg-background-bottom']){ $color[27] = $r['error-msg-background-bottom']; }else{$color[27] = "#4f1313"; } 
		if($r['error-msg-text-color']){ $color[28] = $r['error-msg-text-color']; }else{$color[28] = "#070000"; } 
		if($r['error-msg-border-color']){ $color[29] = $r['error-msg-border-color']; }else{$color[29] = "#540a0a"; } 

		
		if($r['menu-box-shadow-color']){ $color[30] = $r['menu-box-shadow-color']; }else{$color[30] = "#000000"; } 
		if($r['panel-top-box-shadow-color']){ $color[31] = $r['panel-top-box-shadow-color']; }else{$color[31] = "#000000"; } 
	
}


	

 for( $i=0; $i < count($field); $i++ )
  {
?>
		
	$("#<?php echo $field[$i]?>").ColorPicker({
				color: <?php echo "'".$color[$i]."'";?>,
				onShow: function (colpkr) {
					$(colpkr).fadeIn(300);
					return false;
				},
				onHide: function (colpkr) {
					$(colpkr).fadeOut(300);
					return false;
				},
				onChange: function (hsb, hex, rgb) {
					$("#<?php echo $field[$i]?>-cpkr").css('background', '#' + hex);
					$("#<?php echo $field[$i]?>").css('color','#' + hex);
					$("#<?php echo $field[$i]?>").attr('value','#' + hex);
				}
			});
			
		$("#<?php echo $field[$i]?>-cpkr").css('background', '<?php echo $color[$i];?>');
			
		$("#<?php echo $field[$i]?>-cpkr").ColorPicker({
				color: <?php echo "'".$color[$i]."'";?>,
				onShow: function (colpkr) {
					$(colpkr).fadeIn(300);
					return false;
				},
				onHide: function (colpkr) {
					$(colpkr).fadeOut(300);
					return false;
				},
				onChange: function (hsb, hex, rgb) {
					$("#<?php echo $field[$i]?>-cpkr").css('background', '#' + hex);
					$("#<?php echo $field[$i]?>").css('color','#' + hex);
					$("#<?php echo $field[$i]?>").attr('value','#' + hex);
				}
			});
			
			
<?php
}
?>


});




  function deleteDesign(name) {

	var successUrl = "./?p=site_style";
	var errorUrl = "./?p=site_style&w=edit&title="+name;
	
	 var r = window.confirm("Сигурен ли си, че искашах да го изтриеш - после няма връщане назад !");
	if(r)
	{
	  $.post("./includes/delete-design.php",{"name": name}, function (rs) {
	  
	
	
	     // console.log(rs); 
		 
	  
	
		if(rs == "ok")
		{
		 document.location = successUrl
		}
		else
			{
			  alert("Възникна грешка: прекалено Кратко име и/или Няма такъв запис в ДБ !");
			  return false;
			}
	
	  });
	}
  }
</script>

<div id='demo-preview' style='display:none;background:#000;padding:0px;width:600px;height:380px;position:fixed;left:20px;top:20px;'>
	<iframe src='./includes/site_settings_preview.php?style=<?php  
	if(strlen($get_title) > 3) 
	{
	   $get_title = str_replace(".css","", $get_title);
	   echo $get_title;
	}
	else
		{
			$css_name = trim($_POST['document-name']);
			$css_name = str_replace(" ","-",$css_name);
			echo $css_name;
		}
   
	?>' width='600' height='380' style='overflow:hidden;'></iframe>
</div>

<div id='panel-top'>Настроики на визията на сайта </div>
<div id='panel-bottom'>
		
		<?php
		 if( strlen($get_title) > 3 AND  !empty($r['body-background']))
		{
		?>		
		<br/>	<br/>
				 <center>
					<a href='javascript:;' style='float:right;' id='button' onmousedown='return false;' onmouseup='return false;' onclick="deleteDesign('<?php echo $get_title; ?>')">Изтрий този дизайн</a> 
					<div id='msg-rs' style='display:none;'></div>
				 </center>
			<br/>	<br/>
	    <?php
		}
		?>
		<form method='post' action=''>
		
		<!---   фонове на сайта -->
	
		

		<div id='site-visual-cpkr-box'>
			<Div style='border-bottom:1px solid #000;padding:5px;font-size:12px;'><b style='color:#ccc;'>Общи</b></div>
		
				
			<br/>
			
			<div style='float:left;width:330px;border-right:0px dashed #000;'>
			

			
			<b>Фон</b> на <b>страницата</b> :
							<span id='body-background-cpkr' class='cpkr-sampler'></span> 	<input name="body-background" id="body-background"  value="<?php if($_POST['body-background']) { echo $_POST['body-background']; }else if($r['body-background']) {  echo $r['body-background']; } else{echo "#000000";}?>"  style='width:100px;' maxlength='7' readonly /> 
							<br/>
							
		  <b>Фон</b> на <b>сайта</b> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<span id='site-background-cpkr' class='cpkr-sampler'></span> <input name="site-background" id="site-background"  value="<?php if($_POST['site-background']){ echo $_POST['site-background']; }else if($r['site-background']) {

							 if(trim($r['site-background']) == "trans" OR trim($r['site-background']) == "transp"){ echo "#212121"; } else { echo $r['site-background']; }
							
							}else{echo "#212121";}?>"  style='width:100px;' maxlength='7' readonly /> 
							<label title='Не полвай тази опция !'><input type='checkbox' name='site-bg-transparent'	value='true' <?php if(trim($_POST['site-bg-transparent']) == "true" OR trim($r['site-bg-transparent']) == "true" ){echo "checked";}?> /> <b style='font-size:20px;'>x</b></label>
							<br/>
		
					
		 <b>Цвят</b> на текста :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span id='text-color-cpkr' class='cpkr-sampler'></span> 	<input name="text-color" id="text-color"  value="<?php if($_POST['text-color']){ echo $_POST['text-color']; }elseif($r['text-color']){ echo $r['text-color']; }else{echo "#CCCCCC";}?>"  style='width:100px;' readonly />
					<br/>
			
						
		 <b>Цвят</b> на линковете :
					<span id='links-color-cpkr' class='cpkr-sampler'></span> 	<input name="links-color" id="links-color"  value="<?php if($_POST['links-color']){ echo $_POST['links-color']; }elseif($r['links-color']){ echo $r['links-color']; }else{echo "#9b0707";}?>"  style='width:100px;' readonly />
					<br/>
					
					
			
			
		<b>Рамка</b> на <b>всичко</b> :&nbsp;&nbsp;&nbsp;&nbsp;
			 <span id='site-borders-color-cpkr' class='cpkr-sampler'></span> <input name="site-borders-color" id="site-borders-color"  value="<?php if($_POST['site-borders-color']){ echo $_POST['site-borders-color']; }elseif($r['site-borders-color']){ 
			 
			 if(trim($r['site-borders-color']) == "trans" OR trim($r['site-borders-color']) == "transp"){ echo "#000000"; } else { echo $r['site-borders-color']; }
			 
			 }else{echo "#000000";}?>"  style='width:100px;' maxlength='7' readonly /> 
			 <label title='Не полвай тази опция !'><input type='checkbox' name='site-borders-transparent'	value='true' <?php if($_POST['site-borders-transparent'] == "true" OR $r['site-borders-transparent'] == "true" ){echo "checked";}?> /> <b style='font-size:20px;'>x</b></label>
							
					

			</div>
			
			<div style='float:right;width:330px;padding-left:30px;border-left:1px dashed #000;'>
			
			
			<b>Фон</b> на страницата (background-image) :
					<input name="body-background-image" id="body-background-image"  value="<?php if($_POST['body-background-image']){ echo $_POST['body-background-image']; }elseif($r['body-background-image']){ echo $r['body-background-image']; }else{echo "http://";}?>"  style='width:300px;' />
					
					<br />
					
					
			<b>Повтаряй</b> изображението : &nbsp;&nbsp;
					<select name="body-background-repeat" id="body-background-repeat" style='width:140px;' >
							<option value='repeat-x' <?php if($_POST['body-background-repeat']=="repeat-x" OR $r['body-background-repeat']=="repeat-x"){ echo "selected"; }?>>хоризонтално</option>
						<option value='repeat-y' <?php if($_POST['body-background-repeat']=="repeat-y" OR $r['body-background-repeat']=="repeat-y"){ echo "selected"; }?>>вертикално</option>
						<option value='repeat' <?php if($_POST['body-background-repeat']=="repeat" OR $r['body-background-repeat']=="repeat"){ echo "selected"; }?>>и в 2-те посоки</option>
						<option value='no-repeat' <?php if($_POST['body-background-repeat']=="no-repeat" OR $r['body-background-repeat']=="no-repeat"){ echo "selected"; }?>>не го повтаряй</option>
					</select>
					
	
					
					<br />
					
					
			<b>Позиция</b> на картинката: &nbsp;&nbsp;
					<select name="body-background-position" id="body-background-position" style='width:140px;' >
							<option value='none' <?php if($_POST['body-background-position']=="none" OR $r['body-background-position']=="none"){ echo "selected"; }?>>Нормална</option>
						<option value='fixed' <?php if($_POST['body-background-position']=="fixed" OR $r['body-background-position']=="fixed"){ echo "selected"; }?>>Фиксирана</option>
					</select>
					
	
					
			</div>
			
			<br id='clear'/>
		
			
		
		
		
		
			
		</div>

		
		
				<div id='clear'></div>
		
		
		
		
			<!---   ИнПУТ полетата на сайта -->
	
		

		<div id='site-visual-cpkr-box'>
			<Div style='border-bottom:1px solid #000;padding:5px;font-size:12px;'><b style='color:#ccc;'>Инпут поленцата (textbox, textarea, select)</b></div>
		
				
			<br/>
			
			<div style='float:left;width:680px;border-right:0px dashed #000;'>
			
		<div style='width:200px; height:70px;border:0px dashed #000; float:left;'>
			
			<b>Фон</b> на <b>инпута</b> :&nbsp;&nbsp;&nbsp;<br/><br/>
							<span id='input-background-cpkr' class='cpkr-sampler'></span> 	<input name="input-background" id="input-background"  value="<?php if($_POST['input-background']) { echo $_POST['input-background']; }else if($r['input-background']) {  echo $r['input-background']; } else{echo "#212121";}?>"  style='width:100px;' maxlength='7' readonly /> 
							
		</div>		
			
		<div style='width:200px; border:0px dashed #000; float:left;'>
		  <b>Цвят</b> на <b>текста</b> : &nbsp;&nbsp;&nbsp; <br/><br/>
							<span id='input-text-color-cpkr' class='cpkr-sampler'></span> <input name="input-text-color" id="input-text-color"  value="<?php if($_POST['input-text-color']){ echo $_POST['input-text-color']; }else if($r['input-text-color']) {echo $r['input-text-color']; }else{echo "#CCCCCC";}?>"  style='width:100px;' maxlength='7' readonly /> 
							
		</div>
		
	<div style='width:200px; border:0px dashed #000; float:left;'>
		<b>Рамка</b> на <b>инпута</b> :<br/><br/>
			 <span id='input-border-color-cpkr' class='cpkr-sampler'></span> <input name="input-border-color" id="input-border-color"  value="<?php if($_POST['input-border-color']){ echo $_POST['input-border-color']; }elseif($r['input-border-color']){ 
			 
			 if(trim($r['input-border-color']) == "trans" OR trim($r['input-border-color']) == "transp"){ echo "#000000"; } else { echo $r['input-border-color']; }
			 
			 }else{echo "#000000";}?>"  style='width:100px;' maxlength='7' readonly /> 
			 <label title='Не полвай тази опция !'><input type='checkbox' name='input-border-transparent'	value='true' <?php if($_POST['input-border-transparent'] == "true" OR $r['input-border-transparent'] == "true" ){echo "checked";}?> /> <b style='font-size:20px;'>x</b></label>
	</div>				
					

			</div>
			

			<br id='clear'/>
		
			
		
		
		
		
			
		</div>

		
		
				<div id='clear'></div>
		
		
		
		
		
		
		
			<!---  МЕНЮ  -->	
			
		<div id='site-visual-cpkr-box' style='border-left:0px;maring-top:0px;'>
			<Div style='border-bottom:1px solid #000;padding:5px;font-size:12px;'> <b style='color:#ccc;'>Меню</b></div>
					
				
			<br/>
			
			<div style='float:left;width:330px;border-right:0px dashed #000;'>
			

			
			<b>Фон 1</b> на <b>менюто</b> :&nbsp;&nbsp;
							<span id='menu-top-background-cpkr' class='cpkr-sampler'></span> 	<input name="menu-top-background" id="menu-top-background"  value="<?php if($_POST['menu-top-background']){ echo $_POST['menu-top-background']; }elseif($r['menu-top-background']){ echo $r['menu-top-background']; }else{echo "#262626";}?>"  style='width:100px;' maxlength='7' readonly /> 
							<br/>
							
		  <b>Фон 2</b> на <b>менюто</b> : &nbsp;&nbsp;
							<span id='menu-bottom-background-cpkr' class='cpkr-sampler'></span> <input name="menu-bottom-background" id="menu-bottom-background"  value="<?php if($_POST['menu-bottom-background']){ echo $_POST['menu-bottom-background']; }elseif($r['menu-bottom-background']){ echo $r['menu-bottom-background']; }else{echo "#000000";}?>"  style='width:100px;' maxlength='7' readonly /> 
							<br/>
		
					
		 <b>Цвят</b> на линковете :
					<span id='menu-links-color-cpkr' class='cpkr-sampler'></span> 	<input name="menu-links-color" id="menu-links-color"  value="<?php if($_POST['menu-links-color']){ echo $_POST['menu-links-color']; }elseif($r['menu-links-color']){ echo $r['menu-links-color']; }else{echo "#9b0707";}?>"  style='width:100px;' readonly />
							
							<br/>
		
					
		 <b>Цвят</b> на сянката : &nbsp;&nbsp;&nbsp;
					<span id='menu-box-shadow-color-cpkr' class='cpkr-sampler'></span> 	<input name="menu-box-shadow-color" id="menu-box-shadow-color"  value="<?php if($_POST['menu-box-shadow-color']){ echo $_POST['menu-box-shadow-color']; }elseif($r['menu-box-shadow-color']){ echo $r['menu-box-shadow-color']; }else{echo "#000000";}?>"  style='width:100px;' readonly /> <label title='Не полвай тази опция !'><input type='checkbox' name='menu-box-shadow-transparent'	value='true' <?php if($_POST['menu-box-shadow-transparent'] == "true" OR trim($r['menu-box-shadow-transparent']) == "true" ){echo "checked";}?> /> <b style='font-size:20px;'>x</b></label>
			
			</div>
			
			<div style='float:right;width:330px;padding-left:30px;border-left:1px dashed #000;'>
			
			
			<b>Фон</b> на менюто (background-image) :
					<input name="menu-background-image" id="menu-background-image"  value="<?php if($_POST['menu-background-image']){ echo $_POST['menu-background-image']; }elseif($r['menu-background-image']){ echo $r['menu-background-image']; }else{echo "http://";}?>"  style='width:300px;' />
					
					<br />
					
					
			<b>Повтаряй</b> изображението : &nbsp;&nbsp;
					<select name="menu-background-repeat" id="menu-background-repeat" style='width:140px;' >
						<option value='repeat-x' <?php if($_POST['menu-background-repeat']=="repeat-x" OR $r['menu-background-repeat']=="repeat-x"){ echo "selected"; }?>>хоризонтално</option>
						<option value='repeat-y' <?php if($_POST['menu-background-repeat']=="repeat-y" OR $r['menu-background-repeat']=="repeat-y" ){ echo "selected"; }?>>вертикално</option>
						<option value='repeat' <?php if($_POST['menu-background-repeat']=="repeat" OR $r['menu-background-repeat']=="repeat"){ echo "selected"; }?>>и в 2-те посоки</option>
						<option value='no-repeat' <?php if($_POST['menu-background-repeat']=="no-repeat" OR $r['menu-background-repeat']=="no-repeat"){ echo "selected"; }?>>не го повтаряй</option>
					</select>
					
					<br />
						
						
				
				<b>Вътрешен</b> отстъп (padding) :
					<input name="menu-padding" id="menu-padding"  value="<?php if($_POST['menu-padding']){ echo $_POST['menu-padding']; }elseif($r['menu-padding']){ echo $r['menu-padding']; }else{echo "10px";}?>"  style='width:50px;' maxlength='4'/>
					
					<br />
						
						
						
	
						
						
				
				<b>Големина</b> на сянката :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input name="menu-box-shadow-size" id="menu-box-shadow-size"  value="<?php if($_POST['menu-box-shadow-size']){ echo $_POST['menu-box-shadow-size']; }elseif($r['menu-box-shadow-size']){ echo $r['menu-box-shadow-size']; }else{echo "5px";}?>"  style='width:50px;' maxlength='4'/>
					
					<br />
						
						
						
						
			<b>Раздалечи</b> линковете със :&nbsp;&nbsp;&nbsp;&nbsp;
					<input name="menu-links-margin" id="menu-links-margin"  value="<?php if($_POST['menu-links-margin']){ echo $_POST['menu-links-margin']; }elseif($r['menu-links-margin']){ echo $r['menu-links-margin']; }else{echo "10px";}?>"  style='width:50px;' maxlength="4"/>
					
					<br />
					
			<b>Подравни</b> линковете : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<select name="menu-links-align" id="menu-links-align" style='width:140px;' >
						<option value='left' <?php if($_POST['menu-links-align']=="left" OR $r['menu-links-align']=="left"){ echo "selected"; }?>>в ляво</option>
						<option value='right' <?php if($_POST['menu-links-align']=="right" OR $r['menu-links-align']=="right"){ echo "selected"; }?>>в дясно</option>
						<option value='center' <?php if($_POST['menu-links-align']=="center" OR $r['menu-links-align']=="center"){ echo "selected"; }?>>в средата</option>
					</select>
					
					
					<br />
					
					
			<b>Стил</b> na линковете : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<select name="menu-links-underline" id="menu-links-underline" style='width:140px;' >
							<option value='none' <?php if($_POST['menu-links-underline']=="none" OR $r['menu-links-underline']=="none"){ echo "selected"; }?>>без стил</option>
							<option value='underline' <?php if($_POST['menu-links-underline']=="underline" OR $r['menu-links-underline']=="underline"){ echo "selected"; }?>>подчертани</option>
						<option value='overline' <?php if($_POST['menu-links-underline']=="overline" OR $r['menu-links-underline']=="overline"){ echo "selected"; }?>>надчертани</option>
						<option value='blink' <?php if($_POST['menu-links-underline']=="blink" OR $r['menu-links-underline']=="blink"){ echo "selected"; }?>>мигащи</option>
					
					</select>
					
					<br />
					
					
			<b>Ефект</b> na линковете : &nbsp;&nbsp;&nbsp;
					<label><input name="menu-links-effect" id="menu-links-effect" type='checkbox' value="true"  <?php if($_POST['menu-links-effect'] OR $r['menu-links-effect']){ echo "checked"; }?>/> Вдлъбни текста</label>
						
		
			</div>
			
			<br id='clear'/>
		

		</div>
		
	
			
			<div id='clear'></div>
			
		
		
		
		

		<!---  Бутони -->
		<div id='site-visual-cpkr-box'>
			<Div style='border-bottom:1px solid #000;padding:5px;font-size:12px;'><b style='color:#ccc;'>Бутони</b></div>
		
			<br/>
			
			<div style='float:left;width:335px;border-right:1px dashed #000;'>
			

				<b>Фон1</b> на бутона :&nbsp;&nbsp;
					 <span id='button-gradient-top-cpkr' class='cpkr-sampler'></span> <input name="button-gradient-top" id="button-gradient-top"  value="<?php if($_POST['button-gradient-top']){ echo $_POST['button-gradient-top']; }elseif($r['button-gradient-top']){ echo $r['button-gradient-top']; }else{echo "#660000";}?>"  style='width:100px;' maxlength='7' readonly />
					
					<br />
					
				<b>Фон2</b> на бутона :&nbsp;&nbsp;
					<span id='button-gradient-bottom-cpkr' class='cpkr-sampler'></span> <input name="button-gradient-bottom" id="button-gradient-bottom"  value="<?php if($_POST['button-gradient-bottom']){ echo $_POST['button-gradient-bottom']; }elseif($r['button-gradient-bottom']){ echo $r['button-gradient-bottom']; }else{echo "#490000";}?>"  style='width:100px;' maxlength='7' readonly /> 
					
					<br />
					
				<b>Цвят</b> на текста : &nbsp;&nbsp;&nbsp;&nbsp;
					<span id='button-text-color-cpkr' class='cpkr-sampler'></span> <input name="button-text-color" id="button-text-color"  value="<?php if($_POST['button-text-color']){ echo $_POST['button-text-color']; }elseif($r['button-text-color']){ echo $r['button-text-color']; }else{echo "#110000";}?>"  style='width:100px;' maxlength='7' readonly /> 
					
					<br />
					
				<b>Сянка</b> на текста : &nbsp;
					<span id='button-text-shadow-cpkr' class='cpkr-sampler'></span> <input name="button-text-shadow" id="button-text-shadow"  value="<?php if($_POST['button-text-shadow']){ echo $_POST['button-text-shadow']; }elseif($r['button-text-shadow']){ echo $r['button-text-shadow']; }else{echo "#8c0000";}?>"  style='width:100px;' maxlength='7' readonly /> 
					
					<br />
					
				<b>Сянка</b> на бутона :&nbsp;
					<span id='buttons-shadow-cpkr' class='cpkr-sampler'></span> <input name="buttons-shadow" id="buttons-shadow"  value="<?php if($_POST['buttons-shadow']){ echo $_POST['buttons-shadow']; }elseif($r['buttons-shadow']){ echo $r['buttons-shadow']; }else{echo "#000000";}?>"  style='width:100px;' maxlength='7' readonly /> 
							
			
			</div>
			
			<div style='float:right;width:330px;padding-left:30px;border-left:0px dashed #000;'>

			<b>Размер</b> на текста (font-size) :&nbsp;
					<input name="button-text-size" id="button-text-size"  value="<?php if($_POST['button-text-size']){ echo $_POST['button-text-size']; }elseif($r['button-text-size']){ echo $r['button-text-size']; }else{echo "13px";}?>"  style='width:50px;' maxlength='4'/>
					
					<br />
					
					
			<b>Вътрешен</b> отстъп (padding) :
					<input name="button-padding" id="button-padding"  value="<?php if($_POST['button-padding']){ echo $_POST['button-padding']; }elseif($r['button-padding']){ echo $r['button-padding']; }else{echo "5px";}?>"  style='width:50px;' maxlength='4'/>
					
					<br />
					
			</div>
			
			<br id='clear'/>
		
			
		</div>
		
		
	
		
				<div id='clear'></div>
				
				
				
			<!---  Панелите-->
			
			
		<div id='site-visual-cpkr-box' style='border-left:0px;maring-top:0px;'>
			<Div style='border-bottom:1px solid #000;padding:5px;font-size:12px;'><b style='color:#ccc;'>Панели - горната част</b></div>
			
			<br/>
			
			<div style='float:left;width:330px;border-right:0px dashed #000;'>
			

				<b>Фон1</b> на панела :
					 <span id='panel-top-gradient-top-cpkr' class='cpkr-sampler'></span> <input name="panel-top-gradient-top" id="panel-top-gradient-top"  value="<?php if($_POST['panel-top-gradient-top']){ echo $_POST['panel-top-gradient-top']; }elseif($r['panel-top-gradient-top']){ echo $r['panel-top-gradient-top']; }else{echo "#262626";}?>"  style='width:100px;' maxlength='7' readonly />
					
					<br />
					
				<b>Фон2</b> на панела :
					<span id='panel-top-gradient-bottom-cpkr' class='cpkr-sampler'></span> <input name="panel-top-gradient-bottom" id="panel-top-gradient-bottom"  value="<?php if($_POST['panel-top-gradient-bottom']){ echo $_POST['panel-top-gradient-bottom']; }elseif($r['panel-top-gradient-bottom']){ echo $r['panel-top-gradient-bottom']; }else{echo "#000000";}?>"  style='width:100px;' maxlength='7' readonly /> 
					
					<br />
					
				<b>Цвят</b> на текста : &nbsp;
					<span id='panel-top-text-color-cpkr' class='cpkr-sampler'></span> <input name="panel-top-text-color" id="panel-top-text-color"  value="<?php if($_POST['panel-top-text-color']){ echo $_POST['panel-top-text-color']; }elseif($r['panel-top-text-color']){ echo $r['panel-top-text-color']; }else{echo "#840707";}?>"  style='width:100px;' maxlength='7' readonly /> 
							
							
				<br/>
		
					
			   <b>Цвят</b> на сянката : &nbsp;&nbsp;&nbsp;
					<span id='panel-top-box-shadow-color-cpkr' class='cpkr-sampler'></span> 	<input name="panel-top-box-shadow-color" id="panel-top-box-shadow-color"  value="<?php if($_POST['panel-top-box-shadow-color']){ echo $_POST['panel-top-box-shadow-color']; }elseif($r['panel-top-box-shadow-color']){ echo $r['panel-top-box-shadow-color']; }else{echo "#000000";}?>"  style='width:100px;' readonly /> <label title='Не полвай тази опция !'><input type='checkbox' name='panel-top-box-shadow-transparent'	value='true' <?php if($_POST['panel-top-box-shadow-transparent'] == "true" OR $r['panel-top-box-shadow-transparent'] == "true" ){echo "checked";}?> /> <b style='font-size:20px;'>x</b></label>
			
			</div>
			
			<div style='float:right;width:330px;padding-left:30px;border-left:1px dashed #000;'>
			
				<b>Фон</b> на панела (background-image) :
					<input name="panel-top-background-image" id="panel-top-background-image"  value="<?php if($_POST['panel-top-background-image']){ echo $_POST['panel-top-background-image']; }elseif($r['panel-top-background-image']){ echo $r['panel-top-background-image']; }else{echo "http://";}?>"  style='width:300px;'/>
					
					<br />
					
					
		    	<b>Повтаряй</b> изображението : &nbsp;&nbsp;
					<select name="panel-top-background-repeat" id="panel-top-background-repeat" style='width:140px;' >
						<option value='repeat-x' <?php if($_POST['panel-top-background-repeat']=="repeat-x" OR $r['panel-top-background-repeat']=="repeat-x"){ echo "selected"; }?>>хоризонтално</option>
						<option value='repeat-y' <?php if($_POST['panel-top-background-repeat']=="repeat-y" OR $r['panel-top-background-repeat']=="repeat-y"){ echo "selected"; }?>>вертикално</option>
						<option value='repeat' <?php if($_POST['panel-top-background-repeat']=="repeat" OR $r['panel-top-background-repeat']=="repeat"){ echo "selected"; }?>>и в 2-те посоки</option>
						<option value='no-repeat' <?php if($_POST['panel-top-background-repeat']=="no-repeat" OR $r['panel-top-background-repeat']=="no-repeat"){ echo "selected"; }?>>не го повтаряй</option>
					</select>
					
					<br />
					
				<b>Размер</b> на текста (font-size) :&nbsp;
					<input name="panel-top-text-size" id="panel-top-text-size"  value="<?php if($_POST['panel-top-text-size']){ echo $_POST['panel-top-text-size']; }elseif($r['panel-top-text-size']){ echo $r['panel-top-text-size']; }else{echo "13px";}?>"  style='width:50px;' maxlength='4'/>
					
					<br />
					
					
				<b>Вътрешен</b> отстъп (padding) :
					<input name="panel-top-padding" id="panel-top-padding"  value="<?php if($_POST['panel-top-padding']){ echo $_POST['panel-top-padding']; }elseif($r['panel-top-padding']){ echo $r['panel-top-padding']; }else{echo "8px";}?>"  style='width:50px;' maxlength='4'/>
					
					<br />
					
								
					
			<b>Подравни</b> съдържанието : &nbsp;&nbsp;&nbsp;
				<select name="panel-top-text-align" id="panel-top-text-align" style='width:140px;' >
					<option value='left' <?php if($_POST['panel-top-text-align']=="left" OR $r['panel-top-text-align']=="left"){ echo "selected"; }?>>в ляво</option>
					<option value='right' <?php if($_POST['panel-top-text-align']=="right" OR $r['panel-top-text-align']=="right"){ echo "selected"; }?>>в дясно</option>
					<option value='center' <?php if($_POST['panel-top-text-align']=="center" OR $r['panel-top-text-align']=="center"){ echo "selected"; }?>>в средата</option>
				</select>
					
					
				<br />
					
					
								

				
			<b>Големина</b> на сянката :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="panel-top-box-shadow-size" id="panel-top-box-shadow-size"  value="<?php if($_POST['panel-top-box-shadow-size']){ echo $_POST['panel-top-box-shadow-size']; }elseif($r['panel-top-box-shadow-size']){ echo $r['panel-top-box-shadow-size']; }else{echo "5px";}?>"  style='width:50px;' maxlength='4'/>
					
					
					
			<br />
						
						
						
						
					
			<b>Ефект</b> na линковете : &nbsp;&nbsp;&nbsp;
					<label><input name="panel-top-text-effect" id="panel-top-text-effect" type='checkbox' value="true"  <?php if($_POST['panel-top-text-effect'] OR $r['panel-top-text-effect']){ echo "checked"; }?>/> Вдлъбни текста</label>
						
					
			</div>
			
			<br id='clear'/>
	
			
			
		</div>
	
	
		
			<div id='clear'></div>
	
			
			
			<div id='site-visual-cpkr-box' style='border-left:0px;maring-top:0px;'>
			<Div style='border-bottom:1px solid #000;padding:5px;font-size:12px;'> <b style='color:#ccc;'>Панели - долната част</b></div>
			
					<br/>
			
			<div style='float:left;width:330px;border-right:0px dashed #000;'>
			

				<b>Фон</b> на панела : &nbsp; &nbsp; &nbsp; &nbsp;
					 <span id='panel-bottom-background-color-cpkr' class='cpkr-sampler'></span> <input name="panel-bottom-background-color" id="panel-bottom-background-color"  value="<?php if($_POST['panel-bottom-background-color']){ echo $_POST['panel-bottom-background-color']; }elseif($r['panel-bottom-background-color']){ echo $r['panel-bottom-background-color']; }else{echo "#333333";}?>"  style='width:100px;' maxlength='7' readonly />
					
					<label title='Не полвай тази опция !'><input type='checkbox' name='panel-bottom-background-transparent'	value='true' <?php if($_POST['panel-bottom-background-transparent'] == "true" OR $r['panel-bottom-background-transparent'] == "true"){echo "checked";}?> /> <b style='font-size:20px;'>x</b></label>
				
					
					<br />
	
					
				<b>Цвят</b> на текста :  &nbsp; &nbsp; &nbsp; &nbsp;
					<span id='panel-bottom-text-color-cpkr' class='cpkr-sampler'></span> <input name="panel-bottom-text-color" id="panel-bottom-text-color"  value="<?php if($_POST['panel-bottom-text-color']){ echo $_POST['panel-bottom-text-color']; }elseif($r['panel-bottom-text-color']){ echo $r['panel-bottom-text-color']; }else{echo "#CCCCCC";}?>"  style='width:100px;' maxlength='7' readonly /> 
						
					<br />
	
					
				<b>Рамка</b> на панелите :
					 <span id='panel-border-color-cpkr' class='cpkr-sampler'></span> <input name="panel-border-color" id="panel-border-color"  value="<?php if($_POST['panel-border-color']){ echo $_POST['panel-border-color']; }elseif($r['panel-border-color']){
					 
						if(trim($r['panel-border-color']) == "trans" OR trim($r['panel-border-color']) == "transp"){ echo "#000000"; } else { echo $r['panel-border-color']; }
			
					 }else{echo "#000000";}?>"  style='width:100px;' maxlength='7' readonly /> 
					 <label title='Не полвай тази опция !'><input type='checkbox' name='panel-border-transparent'	value='true' <?php if($_POST['panel-border-transparent'] == "true" OR trim($r['panel-border-transparent']) == "true"){echo "checked";}?> /> <b style='font-size:20px;'>x</b></label>
										
				<br/>
		
					
			   <b>Цвят</b> на сянката : &nbsp;&nbsp;&nbsp;
					<span id='panel-bottom-box-shadow-color-cpkr' class='cpkr-sampler'></span> 	<input name="panel-bottom-box-shadow-color" id="panel-bottom-box-shadow-color"  value="<?php if($_POST['panel-bottom-box-shadow-color']){ echo $_POST['panel-bottom-box-shadow-color']; }elseif($r['panel-bottom-box-shadow-color']){ echo $r['panel-bottom-box-shadow-color']; }else{echo "#000000";}?>"  style='width:100px;' readonly /> <label title='Не полвай тази опция !'><input type='checkbox' name='panel-bottom-box-shadow-transparent'	value='true' <?php if($_POST['panel-bottom-box-shadow-transparent'] == "true" OR trim($r['panel-bottom-box-shadow-transparent']) == "true" ){echo "checked";}?> /> <b style='font-size:20px;'>x</b></label>
			
			
			</div>
			
			<div style='float:right;width:330px;padding-left:30px;border-left:1px dashed #000;'>
			
				<b>Фон</b> на панела (background-image) :
					<input name="panel-bottom-background-image" id="panel-bottom-background-image"  value="<?php if($_POST['panel-bottom-background-image']){ echo $_POST['panel-bottom-background-image']; }elseif($r['panel-bottom-background-image']){ echo $r['panel-bottom-background-image']; }else{echo "http://";}?>"  style='width:300px;'/>
					<br/>
					
					
				<b>Повтаряй</b> изображението : &nbsp;&nbsp;
					<select name="panel-bottom-background-repeat" id="panel-bottom-background-repeat" style='width:140px;' >
						<option value='repeat-x' <?php if($_POST['panel-bottom-background-repeat']=="repeat-x" OR $r['panel-bottom-background-repeat']=="repeat-x"){ echo "selected"; }?>>хоризонтално</option>
						<option value='repeat-y' <?php if($_POST['panel-bottom-background-repeat']=="repeat-y" OR $r['panel-bottom-background-repeat']=="repeat-y"){ echo "selected"; }?>>вертикално</option>
						<option value='repeat' <?php if($_POST['panel-bottom-background-repeat']=="repeat" OR $r['panel-bottom-background-repeat']=="repeat"){ echo "selected"; }?>>и в 2-те посоки</option>
						<option value='no-repeat' <?php if($_POST['panel-bottom-background-repeat']=="no-repeat" OR $r['panel-bottom-background-repeat']=="no-repeat"){ echo "selected"; }?>>не го повтаряй</option>
					</select>
					
					<br />
					
					
					
				<b>Размер</b> на текста (font-size) :&nbsp;
					<input name="panel-bottom-text-size" id="panel-bottom-text-size"  value="<?php if($_POST['panel-top-text-size']){ echo $_POST['panel-bottom-text-size']; }elseif($r['panel-top-text-size']){ echo $r['panel-bottom-text-size']; }else{echo "13px";}?>"  style='width:50px;' maxlength='4'/>
					
					<br />
					
					
				<b>Вътрешен</b> отстъп (padding) :
					<input name="panel-bottom-padding" id="panel-bottom-padding"  value="<?php if($_POST['panel-bottom-padding']){ echo $_POST['panel-bottom-padding']; }elseif($r['panel-bottom-padding']){ echo $r['panel-bottom-padding']; }else{echo "7px";}?>"  style='width:50px;' maxlength='4'/>
					
					<br />
									

				
			<b>Големина</b> на сянката :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="panel-bottom-box-shadow-size" id="panel-bottom-box-shadow-size"  value="<?php if($_POST['panel-bottom-box-shadow-size']){ echo $_POST['panel-bottom-box-shadow-size']; }elseif($r['panel-bottom-box-shadow-size']){ echo $r['panel-bottom-box-shadow-size']; }else{echo "5px";}?>"  style='width:50px;' maxlength='4'/>
					
					
					
			<br />
						
					
								
					
		<b>Подравни</b> съдържанието : &nbsp;&nbsp;&nbsp;
			<select name="panel-bottom-text-align" id="panel-bottom-text-align" style='width:140px;' >
				<option value='left' <?php if($_POST['panel-bottom-text-align']=="left" OR $r['panel-bottom-text-align']=="left"){ echo "selected"; }?>>в ляво</option>
				<option value='right' <?php if($_POST['panel-bottom-text-align']=="right" OR $r['panel-bottom-text-align']=="right"){ echo "selected"; }?>>в дясно</option>
				<option value='center' <?php if($_POST['panel-bottom-text-align']=="center" OR $r['panel-bottom-text-align']=="center"){ echo "selected"; }?>>в средата</option>
			</select>
					
					
			</div>
			
			<br id='clear'/>

			</div>
		
		
		
		
		

			<div id='clear'></div>
	
					
		
			
			
			
			<div id='site-visual-cpkr-box' style='border-left:0px;maring-top:0px;'>
			<Div style='border-bottom:1px solid #000;padding:5px;font-size:12px;'> <b style='color:#ccc;'>Съобщение за успех</b></div>
			
					<br/>
			
			<div style='float:left;width:330px;border-right:0px dashed #000;'>
			

				<b>Фон1</b> на съобщението:
					 <span id='success-msg-background-top-cpkr' class='cpkr-sampler'></span> <input name="success-msg-background-top" id="success-msg-background-top"  value="<?php if($_POST['success-msg-background-top']){ echo $_POST['success-msg-background-top']; }elseif($r['success-msg-background-top']){ echo $r['success-msg-background-top']; }else{echo "#0f770f";}?>"  style='width:100px;' maxlength='7' readonly />
		
					<br />
	
				<b>Фон2</b> на съобщението: 
					 <span id='success-msg-background-bottom-cpkr' class='cpkr-sampler'></span> <input name="success-msg-background-bottom" id="success-msg-background-bottom"  value="<?php if($_POST['success-msg-background-bottom']){ echo $_POST['success-msg-background-bottom']; }elseif($r['success-msg-background-bottom']){ echo $r['success-msg-background-bottom']; }else{echo "#0a490b";}?>"  style='width:100px;' maxlength='7' readonly />
	
					
					<br />
	
					
				<b>Цвят</b> на текста :  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
					<span id='success-msg-text-color-cpkr' class='cpkr-sampler'></span> <input name="success-msg-text-color" id="success-msg-text-color"  value="<?php if($_POST['success-msg-text-color']){ echo $_POST['success-msg-text-color']; }elseif($r['success-msg-text-color']){ echo $r['success-msg-text-color']; }else{echo "#0b1601";}?>"  style='width:100px;' maxlength='7' readonly /> 
						
					<br />
	
					
				<b>Рамка</b> на панелите : &nbsp; &nbsp; &nbsp; 
					 <span id='success-msg-border-color-cpkr' class='cpkr-sampler'></span> <input name="success-msg-border-color" id="success-msg-border-color"  value="<?php if($_POST['success-msg-border-color']){ echo $_POST['success-msg-border-color']; }elseif($r['success-msg-border-color']){echo $r['success-msg-border-color']; }else{echo "#0e1c02";}?>"  style='width:100px;' maxlength='7' readonly /> 
			
			</div>
			
			<div style='float:right;width:330px;padding-left:30px;border-left:1px dashed #000;'>
		
					
				<b>Размер</b> на текста (font-size) :&nbsp;
					<input name="success-msg-text-size" id="success-msg-text-size"  value="<?php if($_POST['success-msg-text-size']){ echo $_POST['success-msg-text-size']; }elseif($r['success-msg-text-size']){ echo $r['success-msg-text-size']; }else{echo "12px";}?>"  style='width:50px;' maxlength='4'/>
					
					<br />
					
					
				<b>Вътрешен</b> отстъп (padding) :
					<input name="success-msg-padding" id="success-msg-padding"  value="<?php if($_POST['success-msg-padding']){ echo $_POST['success-msg-padding']; }elseif($r['success-msg-padding']){ echo $r['success-msg-padding']; }else{echo "5px";}?>"  style='width:50px;' maxlength='4'/>
					
					<br />
					
								
					
		<b>Подравни</b> съдържанието : &nbsp;&nbsp;&nbsp;
			<select name="success-msg-text-align" id="success-msg-text-align" style='width:140px;' >
				<option value='left' <?php if($_POST['success-msg-text-align']=="left" OR $r['success-msg-text-align']=="left"){ echo "selected"; }?>>в ляво</option>
				<option value='right' <?php if($_POST['success-msg-text-align']=="right" OR $r['success-msg-text-align']=="right"){ echo "selected"; }?>>в дясно</option>
				<option value='center' <?php if($_POST['success-msg-text-align']=="center" OR $r['success-msg-text-align']=="center"){ echo "selected"; }?>>в средата</option>
			</select>
					
					
			</div>
			
			<br id='clear'/>

			</div>
		

			<div id='clear'></div>
	
					
		
			
			
				
		
		
		

			<div id='clear'></div>
	
					
		
			
			
			
			<div id='site-visual-cpkr-box' style='border-left:0px;maring-top:0px;'>
			<Div style='border-bottom:1px solid #000;padding:5px;font-size:12px;'> <b style='color:#ccc;'>Съобщение за грешка</b></div>
			
					<br/>
			
			<div style='float:left;width:330px;border-right:0px dashed #000;'>
			

				<b>Фон1</b> на съобщението:
					 <span id='error-msg-background-top-cpkr' class='cpkr-sampler'></span> <input name="error-msg-background-top" id="error-msg-background-top"  value="<?php if($_POST['error-msg-background-top']){ echo $_POST['error-msg-background-top']; }elseif($r['error-msg-background-top']){ echo $r['error-msg-background-top']; }else{echo "#7f1f1f";}?>"  style='width:100px;' maxlength='7' readonly />
		
					<br />
	
				<b>Фон2</b> на съобщението: 
					 <span id='error-msg-background-bottom-cpkr' class='cpkr-sampler'></span> <input name="error-msg-background-bottom" id="error-msg-background-bottom"  value="<?php if($_POST['error-msg-background-bottom']){ echo $_POST['error-msg-background-bottom']; }elseif($r['error-msg-background-bottom']){ echo $r['error-msg-background-bottom']; }else{echo "#4f1313";}?>"  style='width:100px;' maxlength='7' readonly />
	
					
					<br />
	
					
				<b>Цвят</b> на текста :  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
					<span id='error-msg-text-color-cpkr' class='cpkr-sampler'></span> <input name="error-msg-text-color" id="error-msg-text-color"  value="<?php if($_POST['error-msg-text-color']){ echo $_POST['error-msg-text-color']; }elseif($r['error-msg-text-color']){ echo $r['error-msg-text-color']; }else{echo "#070000";}?>"  style='width:100px;' maxlength='7' readonly /> 
						
					<br />
	
					
				<b>Рамка</b> на панелите : &nbsp; &nbsp; &nbsp; 
					 <span id='error-msg-border-color-cpkr' class='cpkr-sampler'></span> <input name="error-msg-border-color" id="error-msg-border-color"  value="<?php if($_POST['error-msg-border-color']){ echo $_POST['error-msg-border-color']; }elseif($r['error-msg-border-color']){ echo $r['error-msg-border-color']; }else{echo "#540a0a";}?>"  style='width:100px;' maxlength='7' readonly /> 
			
			</div>
			
			<div style='float:right;width:330px;padding-left:30px;border-left:1px dashed #000;'>
		
					
				<b>Размер</b> на текста (font-size) :&nbsp;
					<input name="error-msg-text-size" id="error-msg-text-size"  value="<?php if($_POST['error-msg-text-size']){ echo $_POST['error-msg-text-size']; }elseif($r['error-msg-text-size']){ echo $r['error-msg-text-size']; }else{echo "12px";}?>"  style='width:50px;' maxlength='4'/>
					
					<br />
					
					
				<b>Вътрешен</b> отстъп (padding) :
					<input name="error-msg-padding" id="error-msg-padding"  value="<?php if($_POST['error-msg-padding']){ echo $_POST['error-msg-padding']; }else if($r['error-msg-padding']){ echo $r['error-msg-padding']; }else{echo "5px";}?>"  style='width:50px;' maxlength='4'/>
					
					<br />
					
								
					
		<b>Подравни</b> съдържанието : &nbsp;&nbsp;&nbsp;
			<select name="error-msg-text-align" id="error-msg-text-align" style='width:140px;' >
				<option value='left' <?php if($_POST['error-msg-text-align']=="left" OR $r['error-msg-text-align']=="left"){ echo "selected"; }?>>в ляво</option>
				<option value='right' <?php if($_POST['error-msg-text-align']=="right" OR $r['error-msg-text-align']=="right"){ echo "selected"; }?>>в дясно</option>
				<option value='center' <?php if($_POST['error-msg-text-align']=="center" OR $r['error-msg-text-align']=="center"){ echo "selected"; }?>>в средата</option>
			</select>
					
					
			</div>
			
			<br id='clear'/>

			</div>
		

			<div id='clear'></div>
	
					
		
			
			
			
			<div class='shadow fixed gray-black-gradient' >
				<div style='padding:10px 0px;border:0px dashed red; width:800px;'>
			<b>Заглавие на  присета </b><br/>
				<input name='document-name' class='inset inner-shadow' value="<?php if($_POST['document-name']){ echo $_POST['document-name']; }elseif(strlen($get_title) > 3){ $get_title = str_replace(".css","", $get_title); echo $get_title; }else{ echo "my-new-css-style"; }?>" style='width:350px;' maxlength='70' /> <button name='save-web-layout' type='submit'>Запази</button>   <a href='javascript:;' id='button' onmousedown='return false;' onmouseup='return false;' onclick="$('#demo-preview').slideToggle(300)" style='float:right;'>Виж демо на дизайна - как ще изглежда</a>  
				</div>
			</div>
			
				<div id='clear'></div><br/><br/><br/>
			<?php
			 if(isset($_POST['save-web-layout']))
			 { 
			 
			  // table -> site-settings
				 $css_name = trim($_POST['document-name']);
				 $css_name = str_replace(" ","-",$css_name);
				 
				   // Generated Colors
					$body_background = trim(htmlspecialchars($_POST['body-background']));// done
					$site_background = trim(htmlspecialchars($_POST['site-background']));// done
					
					$links_color = trim(htmlspecialchars($_POST['links-color']));// done
					$text_color = trim(htmlspecialchars($_POST['text-color']));// done
					
					$button_text_color = trim(htmlspecialchars($_POST['button-text-color'])); // done
					$button_text_shadow = trim(htmlspecialchars($_POST['button-text-shadow'])); // done
					$buttons_shadow = trim(htmlspecialchars($_POST['buttons-shadow'])); // done
					$button_gradient_top = trim(htmlspecialchars($_POST['button-gradient-top']));// done
					$button_gradient_bottom = trim(htmlspecialchars($_POST['button-gradient-bottom']));// done
					
					$panel_top_text_color = trim(htmlspecialchars($_POST['panel-top-text-color'])); // done
					$panel_top_gradient_top = trim(htmlspecialchars($_POST['panel-top-gradient-top']));		// done	
					$panel_top_gradient_bottom = trim(htmlspecialchars($_POST['panel-top-gradient-bottom']));// done
					
					$panel_border_color = trim(htmlspecialchars($_POST['panel-border-color'])); // done
					
					$panel_bottom_background_color = trim(htmlspecialchars($_POST['panel-bottom-background-color'])); // done
					$panel_bottom_text_color = trim(htmlspecialchars($_POST['panel-bottom-text-color']));  // done
					
					/////////////////////////////////////////////////////
				// Body bg	
					$body_background_image = trim(htmlspecialchars($_POST['body-background-image'])); // доне
					$body_background_repeat = trim(htmlspecialchars($_POST['body-background-repeat'])); // done
					$body_background_position = trim(htmlspecialchars($_POST['body-background-position'])); // done
				// site BG	
					$site_borders_color = trim(htmlspecialchars($_POST['site-borders-color'])); // done
					$site_borders_transparent = trim(htmlspecialchars($_POST['site-borders-transparent'])); // done
				// Menu bg		
					$menu_top_background = trim(htmlspecialchars($_POST['menu-top-background'])); // done
					$menu_bottom_background = trim(htmlspecialchars($_POST['menu-bottom-background'])); // done
		
					$menu_background_image = trim(htmlspecialchars($_POST['menu-background-image'])); // доне
					$menu_background_repeat = trim(htmlspecialchars($_POST['menu-background-repeat'])); // доне
					$menu_links_align = trim(htmlspecialchars($_POST['menu-links-align'])); // доне
					$menu_links_underline = trim(htmlspecialchars($_POST['menu-links-underline'])); // доне
					$menu_links_margin = trim(htmlspecialchars($_POST['menu-links-margin'])); // доне
					$menu_links_color = trim(htmlspecialchars($_POST['menu-links-color'])); // доне
					$menu_links_effect = trim(htmlspecialchars($_POST['menu-links-effect'])); // доне
					
					$menu_box_shadow_size = trim(htmlspecialchars($_POST['menu-box-shadow-size'])); // доне
					$menu_box_shadow_color = trim(htmlspecialchars($_POST['menu-box-shadow-color'])); // доне
					$menu_box_shadow_transparent = trim(htmlspecialchars($_POST['menu-box-shadow-transparent'])); // доне
					
					
					
					
					$menu_padding = trim(htmlspecialchars($_POST['menu-padding'])); // доне
					 // menu padding
					      $menu_paddingY = split("px",$menu_padding);
						  $menu_paddingX = $menu_paddingY[0] ;
					      $menu_paddingY = $menu_paddingY[0] ;
					      $menu_paddingY = ceil($menu_paddingY / 2);
						  
						  
						  if( $menu_paddingY < 5 ) { $menu_paddingX = "5px";}
				// Buttons
					$button_text_size = trim(htmlspecialchars($_POST['button-text-size'])); // done
					$button_padding = trim(htmlspecialchars($_POST['button-padding'])); // done
					
				// Panel top bg
					$panel_top_background_image = trim(htmlspecialchars($_POST['panel-top-background-image'])); // done
					$panel_top_background_repeat = trim(htmlspecialchars($_POST['panel-top-background-repeat'])); // dobe
					$panel_top_text_size = trim(htmlspecialchars($_POST['panel-top-text-size'])); // done
					$panel_top_padding = trim(htmlspecialchars($_POST['panel-top-padding'])); // done
					$panel_top_text_align = trim(htmlspecialchars($_POST['panel-top-text-align'])); // done
					$panel_top_text_effect = trim(htmlspecialchars($_POST['panel-top-text-effect'])); // done
					
					
					$panel_top_box_shadow_color = trim(htmlspecialchars($_POST['panel-top-box-shadow-color'])); // done
					$panel_top_box_shadow_size = trim(htmlspecialchars($_POST['panel-top-box-shadow-size'])); // done
					$panel_top_box_shadow_transparent = trim(htmlspecialchars($_POST['panel-top-box-shadow-transparent'])); // done
					

					
					
					
				// panel bottom	
					$panel_bottom_background_image = trim(htmlspecialchars($_POST['panel-bottom-background-image'])); // done
					$panel_bottom_background_repeat = trim(htmlspecialchars($_POST['panel-bottom-background-repeat'])); // done
					$panel_bottom_text_size = trim(htmlspecialchars($_POST['panel-bottom-text-size'])); // done
					$panel_bottom_padding = trim(htmlspecialchars($_POST['panel-bottom-padding'])); // done
					$panel_bottom_text_align = trim(htmlspecialchars($_POST['panel-bottom-text-align'])); // done
					
					
					$panel_bottom_box_shadow_color = trim(htmlspecialchars($_POST['panel-bottom-box-shadow-color'])); // done
					$panel_bottom_box_shadow_size = trim(htmlspecialchars($_POST['panel-bottom-box-shadow-size'])); // done
					$panel_bottom_box_shadow_transparent = trim(htmlspecialchars($_POST['panel-bottom-box-shadow-transparent'])); // done
					
				// Inputs 
					$input_background = trim(htmlspecialchars($_POST['input-background'])); // done
					$input_text_color = trim(htmlspecialchars($_POST['input-text-color'])); // done
					$input_border_color = trim(htmlspecialchars($_POST['input-border-color'])); // done
					
				// Error Msg
				
				$error_msg_text_align =  trim(htmlspecialchars($_POST['error-msg-text-align'])); // done
				$error_msg_padding =  trim(htmlspecialchars($_POST['error-msg-padding'])); // 
				$error_msg_text_size =  trim(htmlspecialchars($_POST['error-msg-text-size'])); // done
				$error_msg_border_color =  trim(htmlspecialchars($_POST['error-msg-border-color'])); // done
				$error_msg_text_color =  trim(htmlspecialchars($_POST['error-msg-text-color'])); // done
				$error_msg_background_bottom =  trim(htmlspecialchars($_POST['error-msg-background-bottom'])); // done
				$error_msg_background_top =  trim(htmlspecialchars($_POST['error-msg-background-top'])); // done
				
				
				// Success Msg
				
				
				$success_msg_text_align =  trim(htmlspecialchars($_POST['success-msg-text-align'])); // done
				$success_msg_padding =  trim(htmlspecialchars($_POST['success-msg-padding'])); // done
				$success_msg_text_size =  trim(htmlspecialchars($_POST['success-msg-text-size'])); // done
				$success_msg_border_color =  trim(htmlspecialchars($_POST['success-msg-border-color'])); // done
				$success_msg_text_color =  trim(htmlspecialchars($_POST['success-msg-text-color'])); // done
				$success_msg_background_bottom =  trim(htmlspecialchars($_POST['success-msg-background-bottom'])); // done
				$success_msg_background_top =  trim(htmlspecialchars($_POST['success-msg-background-top'])); // done
				 
					
// ---------------------------------------------------------------------------------			
			
	/// Фона на страницата	+ повтарянето		
	if(strlen($body_background_image) > 10)	{ 
	 
	  $bg_postition = "";
	  if ( $body_background_position != "none") { $bg_postition = "\n background-attachment: ".$body_background_position."; \n";}
		$body_background_image_code = "background: ".$body_background." url('".$body_background_image."') top center; \n background-repeat:".$body_background_repeat."; ".$bg_postition;  
	
	}
	else 
		{
			$body_background_image_code = "background: ".$body_background."; "; 
		} 	
	

		
// ---------------------------------------------------------------------------------	
	
	/// Фона на МЕНЮТО	+ повтарянето		
	if(strlen($menu_background_image) > 10)	{ 
		$menu_background_image_code = "background: ".$menu_top_background." url('".$menu_background_image."'); \n \n background-repeat:".$menu_background_repeat."; ";  
	}
	else 
		{
			$menu_background_image_code = "background-image: linear-gradient(bottom, ".$menu_bottom_background." 10%, ".$menu_top_background." 100%);
background-image: -o-linear-gradient(bottom, ".$menu_bottom_background." 10%, ".$menu_top_background." 100%);
background-image: -moz-linear-gradient(bottom, ".$menu_bottom_background." 10%, ".$menu_top_background." 100%);
background-image: -webkit-linear-gradient(bottom, ".$menu_bottom_background." 10%, ".$menu_top_background.") 100%);
background-image: -ms-linear-gradient(bottom, ".$menu_bottom_background." 10%, ".$menu_top_background." 100%);
background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0.1, ".$menu_bottom_background."), color-stop(1, ".$menu_top_background.") );
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$panel_top_gradient_top."', endColorstr='".$menu_bottom_background."', GradientType=0 );"; 
		} 	

		 $menu_links_effect_code = "";
		if ( $menu_links_effect == "true")
			{
			   $menu_links_effect_code = " text-shadow: 1px 1px ".$menu_top_background."; ";
			}
		
		
		if($_POST['menu-box-shadow-transparent'] == "true")
		{
		  $menu_box_shadow_code = "";
		}
		else	
			{
			
			  $menu_box_shadow_code = "/* Shadow */ \n
				-webkit-box-shadow:0 0px ".$menu_box_shadow_size." ".$menu_box_shadow_color.";	
				-moz-box-shadow:0 0px ".$menu_box_shadow_size." ".$menu_box_shadow_color.";	
				 box-shadow:0 0px ".$menu_box_shadow_size." ".$menu_box_shadow_color.";	
			  ";
			
			}
		
		
	// ---------------------------------------------------------------------------------	
	


/// Фона на ПАНЕЛИТЕ - ГОРНАТА част	+ повтарянето		
	if(strlen($panel_top_background_image) > 10)	{ 
		$panel_top_background_image_code = "background: ".$panel_top_gradient_top." url('".$panel_top_background_image."'); \n \n background-repeat:".$panel_top_background_repeat."; ";  
	}
	else 
		{
			$panel_top_background_image_code = "background-image: linear-gradient(bottom, ".$panel_top_gradient_bottom." 10%, ".$panel_top_gradient_top." 100%);
background-image: -o-linear-gradient(bottom, ".$panel_top_gradient_bottom." 10%, ".$panel_top_gradient_top." 100%);
background-image: -moz-linear-gradient(bottom, ".$panel_top_gradient_bottom." 10%, ".$panel_top_gradient_top." 100%);
background-image: -webkit-linear-gradient(bottom, ".$panel_top_gradient_bottom." 10%, ".$panel_top_gradient_top.") 100%);
background-image: -ms-linear-gradient(bottom, ".$panel_top_gradient_bottom." 10%, ".$panel_top_gradient_top." 100%);
background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0.1, ".$panel_top_gradient_bottom."), color-stop(1, ".$panel_top_gradient_top.") );
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$panel_top_gradient_bottom."', endColorstr='".$panel_top_gradient_bottom."', GradientType=0 );"; 
		} 	
		
		
		$panel_top_text_effect_code = "";
	if ( $panel_top_text_effect == "true")
			{
			   $panel_top_text_effect_code = "text-shadow:1px 1px ".$panel_top_gradient_top.";";
			}
			
			
  

   if($_POST['panel-top-box-shadow-transparent'] == "true")
   {
     $panel_top_box_shadow_code = "";  
   }
   else
		{
		 $panel_top_box_shadow_code = "/* Shadow */ \n
			-webkit-box-shadow:0 0px ".$panel_top_box_shadow_size." ".$panel_top_box_shadow_color.";	
			-moz-box-shadow:0 0px ".$panel_top_box_shadow_size." ".$panel_top_box_shadow_color.";	
			 box-shadow:0 0px ".$panel_top_box_shadow_size." ".$panel_top_box_shadow_color.";	
		  ";
		}

// ---------------------------------------------------------------------------------	

// ПАНЕЛИТЕ - ДОЛНАТА част



		
	// Фона на ПАНЕЛИТЕ - ДОЛНАТА част	+ повтарянето		
	if(strlen(	$panel_bottom_background_image) > 10)	
	{ 
			$panel_bottom_background_image_code = "background: ".$panel_bottom_background_color."  url('".	$panel_bottom_background_image."'); \n \n background-repeat:".	$panel_bottom_background_repeat."; ";  
	}
	else 
		{
			$panel_bottom_background_image_code = "background: ".$panel_bottom_background_color.";  "; 
		} 	
		
		
		
		  
 
   if($_POST['panel-bottom-box-shadow-transparent'] == "true")
   {
   
		   $panel_bottom_box_shadow_code = "";  
   }
   
   else
		{
		$panel_bottom_box_shadow_code = "/* Shadow */ \n
			-webkit-box-shadow:0 0px ".$panel_bottom_box_shadow_size." ".$panel_bottom_box_shadow_color.";	
			-moz-box-shadow:0 0px ".$panel_bottom_box_shadow_size." ".$panel_bottom_box_shadow_color.";	
			 box-shadow:0 0px ".$panel_bottom_box_shadow_size." ".$panel_bottom_box_shadow_color.";	
		  ";
		}
	
		
		
// ---------------------------------------------------------------------------------	
 // САИТА -> За прозрачен fon 
  if($_POST['site-bg-transparent'] == "true")
  {
   $site_background = " transparent ";
   $emoticons_bg = $body_background;
  }
  else
		{
		$emoticons_bg = $site_background;
		}

  
  /// САТЙТА -> ПАНЕЛИТЕ -> БОРДЕРА -> 
  
   if($_POST['panel-border-transparent'] == "true"){
   $panel_border_color = "  transparent ";
   }
  
  /// САТЙТА ->  ВСИЧКИИИ БОРДЕРИ -> 
  
   if($_POST['site-borders-transparent'] == "true"){
   $site_borders_color = "  transparent ";
   }
   
   
  /// САТЙТА ->  ПАНЕЛИ - ДОЛНА част -> ФОН -> 
  
   if($_POST['panel-bottom-background-transparent'] == "true"){
   $panel_bottom_background_image_code= "background: transparent ;";
   }
   
  /// САТЙТА ->  ИНПУТ -> BODER  -> 
  
   if($_POST['input-border-transparent'] == "true"){
   $input_border_code = "border:1px solid transparent ;";
   }
   else {  $input_border_code  = "border:1px solid ".$input_border_color;}
// ---------------------------------------------------------------------------------	


			 if(!empty($css_name))
			  {
$content = "/* Фона и цвят на текста на страницата */ \r
body, root { 
".$body_background_image_code."
color:".$text_color."; 
}  

#main{ background:".$site_background.";border:1px solid ".$site_background.";} /* Фона на сайта */ 
#news-title{ color:".$panel_top_text_color."; } /* Цвят на заглавията на новините	*/ 

body a , b{  color:".$links_color."; text-shadow:none; } /* Цвят на линковете и удебелените думи в сайтт*/ 
body a:hover, #menu-conteinter a:hover{ text-decoration:underline; } 

/* Бутоните  */ \n 
button, #button, a#button  {	
background-image: linear-gradient(bottom, ".$button_gradient_bottom." 0%, ".$button_gradient_top."  100%);
background-image: -o-linear-gradient(bottom, ".$button_gradient_bottom." 0%, ".$button_gradient_top." 100%);
background-image: -moz-linear-gradient(bottom, ".$button_gradient_bottom." 0%, ".$button_gradient_top." 100%);
background-image: -webkit-linear-gradient(bottom, ".$button_gradient_bottom." 0%, ".$button_gradient_top.") 100%);
background-image: -ms-linear-gradient(bottom, ".$button_gradient_bottom." 0%, ".$button_gradient_top." 100%);
background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0, ".$button_gradient_bottom." ), color-stop(1, ".$button_gradient_top.") );
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$button_gradient_top."', endColorstr='".$button_gradient_bottom."', GradientType=0 );
color:".$button_text_color.";	
border-top: 1px solid ".$button_gradient_top."; 
text-shadow:1px 1px ".$button_text_shadow.";
font-size:".$button_text_size.";
padding:".$button_padding.";

/* Shadow */ \n
border:1px solid ".$button_gradient_bottom.";
-webkit-box-shadow:0 0px 2px ".$buttons_shadow.";	
-moz-box-shadow:0 0px 2px ".$buttons_shadow.";	
 box-shadow:0 0px 2px ".$buttons_shadow.";	
 
}




 button:hover, #button:hover, a#button:hover{
 background-image: linear-gradient(bottom,  ".$button_gradient_top." 0%,  ".$button_gradient_bottom." 100%);
background-image: -o-linear-gradient(bottom, ".$button_gradient_top." 0%,  ".$button_gradient_bottom."100%);
background-image: -moz-linear-gradient(bottom, ".$button_gradient_top." 0%,  ".$button_gradient_bottom." 100%);
background-image: -webkit-linear-gradient(bottom, ".$button_gradient_top." 0%,  ".$button_gradient_bottom.") 100%);
background-image: -ms-linear-gradient(bottom, ".$button_gradient_top." 0%,  ".$button_gradient_bottom." 100%);
background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0, ".$button_gradient_top." ), color-stop(1,".$button_gradient_bottom.") );
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$button_gradient_bottom."', endColorstr='".$button_gradient_top."', GradientType=0 );
color:".$button_text_color.";	
border-top: 1px solid ".$button_gradient_bottom."; 
text-shadow:1px 1px ".$button_text_shadow.";
font-size:".$button_text_size.";
padding:".$button_padding.";

/* Shadow */ \n
border:1px solid ".$button_gradient_top.";
-webkit-box-shadow:0 0px 2px ".$buttons_shadow.";	
-moz-box-shadow:0 0px 2px ".$buttons_shadow.";	
 box-shadow:0 0px 2px ".$buttons_shadow.";	
 
 
 }




/*	  Менюто - то е със същият градиен като на Горната част на панелите	*/  
#menu-conteinter { 
".$menu_background_image_code."

color:".$menu_links_color.";
border:1px solid ".$panel_border_color.";
text-align:".$menu_links_align.";
padding: ". $menu_padding ." ;

".$menu_box_shadow_code."

}

#menu-conteinter a { ".$menu_links_effect_code." color:".$menu_links_color."; text-align:".$menu_links_align."; margin-right: ".$menu_links_margin."; }
#menu-conteinter a:hover { text-decoration: ".$menu_links_underline.";  }

 /*	 Горната част на панелите	*/ 
#panel-top { 
".$panel_top_background_image_code."
color: ".$panel_top_text_color."; 
border:1px solid ".$panel_border_color.";  
border-bottom:0px;
text-align:".$panel_top_text_align.";
padding:".$panel_top_padding.";
font-size: ".$panel_top_text_size.";
".$panel_top_text_effect_code."

". $panel_top_box_shadow_code ."
}

 /*	 Долната част на панелите	*/  
#panel-bottom{ 
".$panel_bottom_background_image_code."
color:".$panel_bottom_text_color.";  
border:1px solid ".$panel_border_color.";  
border-top:0px;
font-size:". $panel_bottom_text_size .";
padding:".$panel_bottom_padding.";
text-align:".$panel_bottom_text_align.";

".$panel_bottom_box_shadow_code."


}

/* Footer */
#footer{
  margin:0px auto;
  background: transparent;
  padding:5px;
  width:950px;
  border:0px;
  color:".$input_text_color.";
}


/* INPUTS BE MEN .. */ 
input 
{ 
	background:".$input_background."; 
	".$input_border_code."; 
	padding:6px; 
	color:".$input_text_color."; 
	margin-bottom:7px; 
}

select
{
	width:200px;
	max-height:200px;
	background:".$input_background.";
	".$input_border_code."; 
	padding:6px;
	color:".$input_text_color.";
	margin-bottom:7px;
}


textarea
{
    width:200px;
	max-width:450px;
	max-height:200px;
	background:".$input_background.";
	".$input_border_code."; 
	padding:6px;
	color:".$input_text_color.";
	margin-bottom:7px;
}

/* Новинитее .. */
#news-title
{
		background:".$panel_top_gradient_bottom.";
		padding:5px;
		color:".$text_color.";
		font-family:Arial;
		text-shadow:1px 1px ".$site_background.";
}
#the-news-text{ color:".$text_color."; }

/* CHat */
#chat-msg{
 margin-top:10px;border-top:1px solid ".$site_background.";
}

#chat-msg  #user-msg
{
	border-top:1px solid ".$panel_top_gradient_bottom.";
	border-bottom:1px solid ".$body_background.";
	padding:5px;
}

#chat-msg  #user-and-date 
{
	padding:3px;
	font-size:10px;
}
#chat-msg #user-and-date a
{
	font-size:10px;
}

/* Online users panel	*/

#online_user{ padding:5px 5px ;}
#online_user a, #online_user a:hover{ font-size:10px; text-decoration:none;}
#online_user span{ float:right;margin-top:-2px;}
#online_user:hover{
  background:".$body_background.";
}


/* User profile*/
#user-profile-image{
  float:left;
  width:100px;
}
#user-profile-image img{
   width:100px;
   border:1px solid ".$panel_border_color.";
}

#right{ margin-left:105px;}

#username-style{
  font-size:15px;
  font-family:Arial;
  text-shadow:1px 1px #fcfcfc;
}

#u-desc{
  border:1px solid ".$panel_border_color.";
  margin-top:5px;
  margin-left:-10px;
  padding:3px;
  padding-left:10px;
  font-size:11px;
  background:".$site_background.";
  color: ".$text_color.";
  /*Shadow*/
  -webkit-box-shadow:0 0px 2px #666;
	 -moz-box-shadow:0 0px 2px #666;
		  box-shadow:0 0px 2px #666;
}
#u-desc div{
  padding:4px;
  font-size:12px;
}

#user-opts{ text-align:right;margin-top:5px;}
#user-cs-info{ margin-top:5px ;font-family:Arial; font-size:11px;}



/*
	SITE PAGEING
*/
.paginate {
	margin:0px 0px 0px -13px;
	padding:4px 8px 3px 8px;
	font-size:11px;
	font-family:Arial;
	
}

.paginate a {
	margin:3px;
	padding:4px 8px 3px 8px;
	font-size:11px;
	font-family:Arial;
	border:1px solid #888;
	text-decoration:none;
	color: ".$text_color.";
    	border-radius:3px;
	  -o-border-radius:3px;
	 -ms-border-radius:3px;
	-moz-border-radius:3px;
 -webkit-border-radius:3px;
	
	border: 1px solid ".$button_gradient_bottom."; 
	text-shadow:1px 1px ".$button_text_shadow.";	
	color: ".$button_text_color.";
	outline:0px;
	background-image: linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top."  100%);
	background-image: -o-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top." 100%);
	background-image: -moz-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top." 100%);
	background-image: -webkit-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top.") 100%);
	background-image: -ms-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top." 100%);
	background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0.1, ".$button_gradient_bottom." ), color-stop(1, ".$button_gradient_top.") );
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$button_gradient_top."', endColorstr='".$button_gradient_bottom."', GradientType=0 );

	


}
 .paginate a:active,.paginate a:visited {
 	/* color:#3f5874; /*   qko sinio .. ама na mene sq mi trqq sivo :D*/ 
	margin:3px;
	padding:4px 8px 3px 8px;
	font-size:11px;
	font-family:Arial;
	text-decoration:none;
	border: 1px solid ".$button_gradient_bottom."; 
	text-shadow:1px 1px ".$button_text_shadow.";	
	color: ".$button_text_color.";
	outline:0px;
	background-image: linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top."  100%);
	background-image: -o-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top." 100%);
	background-image: -moz-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top." 100%);
	background-image: -webkit-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top.") 100%);
	background-image: -ms-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top." 100%);
	background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0.1, ".$button_gradient_bottom." ), color-stop(1, ".$button_gradient_top.") );
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$button_gradient_top."', endColorstr='".$button_gradient_bottom."', GradientType=0 );

	

}

.paginate a:hover{
	margin:3px;
	padding:4px 8px 3px 8px;
	font-size:11px;
	font-family:Arial;
	border:solid 1px #3a0606;
	text-shadow:1px 1px #840303;
	color:#000;
	text-decoration:none;
	outline:0px;
		 box-shadow:0 0px 2px ".$button_gradient_bottom.";
	-moz-box-shadow:0 0px 2px ".$button_gradient_bottom.";
 -webkit-box-shadow:0 0px 2px ".$button_gradient_bottom.";
 
	
	
}

.paginate span.current {
	margin:3px;
	padding:4px 8px 3px 8px;
	font-size:11px;
	font-family:Arial;
		border-radius:3px;
	 -o-border-radius:3px;
	-ms-border-radius:3px;
   -moz-border-radius:3px;
-webkit-border-radius:3px;
	outline:0px;
	
	border: 1px solid ".$button_gradient_bottom."; 
	text-shadow:1px 1px ".$button_text_shadow.";	
	color: ".$button_text_color.";
	outline:0px;
	background-image: linear-gradient(bottom, ".$button_gradient_top." 10%,  ".$button_gradient_bottom."  100%);
	background-image: -o-linear-gradient(bottom, ".$button_gradient_top." 10%,  ".$button_gradient_bottom." 100%);
	background-image: -moz-linear-gradient(bottom, ".$button_gradient_top." 10%,  ".$button_gradient_bottom." 100%);
	background-image: -webkit-linear-gradient(bottom, ".$button_gradient_top." 10%,  ".$button_gradient_bottom.") 100%);
	background-image: -ms-linear-gradient(bottom,  ".$button_gradient_top." 10%,  ".$button_gradient_bottom." 100%);
	background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0.1, ".$button_gradient_top." ), color-stop(1, ".$button_gradient_bottom.") );
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$button_gradient_bottom."', endColorstr='".$button_gradient_top."', GradientType=0 );

	
	
}
	
.paginate span.disabled {
	margin:3px;
	padding:4px 8px 3px 8px;
	font-size:11px;
	font-family:Arial;
	-moz-border-radius-topleft:3px;
	-moz-border-radius-bottomleft:3px;
	-webkit-border-radius-topleft:3px;
	-webkit-border-radius-bottomleft:3px;
	outline:0px;
	border: 1px solid ".$button_gradient_bottom."; 
	text-shadow:1px 1px ".$button_text_shadow.";	
	color: ".$button_text_color.";
	outline:0px;
	background-image: linear-gradient(bottom, ".$button_gradient_top." 10%,  ".$button_gradient_bottom."  100%);
	background-image: -o-linear-gradient(bottom, ".$button_gradient_top." 10%,  ".$button_gradient_bottom." 100%);
	background-image: -moz-linear-gradient(bottom, ".$button_gradient_top." 10%,  ".$button_gradient_bottom." 100%);
	background-image: -webkit-linear-gradient(bottom, ".$button_gradient_top." 10%,  ".$button_gradient_bottom.") 100%);
	background-image: -ms-linear-gradient(bottom,  ".$button_gradient_top." 10%,  ".$button_gradient_bottom." 100%);
	background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0.1, ".$button_gradient_top." ), color-stop(1, ".$button_gradient_bottom.") );
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$button_gradient_top."', endColorstr='".$button_gradient_bottom."', GradientType=0 );
	}
	.paginate #NEXTpagedisabled{
	margin:3px;
	padding:4px 8px 3px 8px;
	font-size:11px;
	font-family:Arial;
	-moz-border-radius-topright:3px;
	-moz-border-radius-bottomright:3px;
	-moz-border-radius-topleft:0px;
	-moz-border-radius-bottomleft:0px;
	-webkit-border-radius-topright:3px;
	-webkit-border-radius-bottomright:3px;
	-webkit-border-radius-topleft:0px;
	-webkit-border-radius-bottomleft:0px;
	outline:0px;
	border: 1px solid ".$button_gradient_bottom."; 
	text-shadow:1px 1px ".$button_text_shadow.";	
	color: ".$button_text_color.";
	outline:0px;
	background-image: linear-gradient(bottom, ".$button_gradient_top." 10%,  ".$button_gradient_bottom."  100%);
	background-image: -o-linear-gradient(bottom, ".$button_gradient_top." 10%,  ".$button_gradient_bottom." 100%);
	background-image: -moz-linear-gradient(bottom, ".$button_gradient_top." 10%,  ".$button_gradient_bottom." 100%);
	background-image: -webkit-linear-gradient(bottom, ".$button_gradient_top." 10%,  ".$button_gradient_bottom.") 100%);
	background-image: -ms-linear-gradient(bottom,  ".$button_gradient_top." 10%,  ".$button_gradient_bottom." 100%);
	background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0.1, ".$button_gradient_top." ), color-stop(1, ".$button_gradient_bottom.") );
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$button_gradient_top."', endColorstr='".$button_gradient_bottom."', GradientType=0 );
	
}


.paginate a#NEXTpageActive{
	margin:3px;
	padding:4px 8px 3px 8px;
	font-size:11px;
	font-family:Arial;
	-moz-border-radius:0px;
	-webkit-border-radius:0px;
	-moz-border-radius-topright:3px;
	-moz-border-radius-bottomright:3px;
	-webkit-border-radius-topright:3px;
	-webkit-border-radius-bottomright:3px;
	outline:0px;
	border: 1px solid ".$button_gradient_bottom."; 
	text-shadow:1px 1px ".$button_text_shadow.";	
	color: ".$button_text_color.";
	outline:0px;
	background-image: linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top."  100%);
	background-image: -o-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top." 100%);
	background-image: -moz-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top." 100%);
	background-image: -webkit-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top.") 100%);
	background-image: -ms-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top." 100%);
	background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0.1, ".$button_gradient_bottom." ), color-stop(1, ".$button_gradient_top.") );
   filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$button_gradient_bottom."', endColorstr='".$button_gradient_top."', GradientType=0 );
	
}
.paginate a.firstPageAct{
	margin:3px;
	padding:4px 8px 3px 8px;
	font-size:11px;
	font-family:Arial;
	-moz-border-radius:0px;
	-webkit-border-radius:0px;
	-moz-border-radius-topleft:3px;
	-moz-border-radius-bottomleft:3px;
	-webkit-border-radius-topleft:3px;
	-webkit-border-radius-bottomleft:3px;
	outline:0px;
	border: 1px solid ".$button_gradient_bottom."; 
	text-shadow:1px 1px ".$button_text_shadow.";	
	color: ".$button_text_color.";
	outline:0px;
	background-image: linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top."  100%);
	background-image: -o-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top." 100%);
	background-image: -moz-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top." 100%);
	background-image: -webkit-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top.") 100%);
	background-image: -ms-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top." 100%);
	background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0.1, ".$button_gradient_bottom." ), color-stop(1, ".$button_gradient_top.") );
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$button_gradient_top."', endColorstr='".$button_gradient_bottom."', GradientType=0 );

}

.paginate a.defPage
{
	margin:3px;
	padding:4px 8px 3px 8px;
	font-size:11px;
	font-family:Arial;
	border: 1px solid ".$button_gradient_bottom."; 
	text-shadow:1px 1px ".$button_text_shadow.";	
	color: ".$button_text_color.";
	outline:0px;
	background-image: linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top."  100%);
	background-image: -o-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top." 100%);
	background-image: -moz-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top." 100%);
	background-image: -webkit-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top.") 100%);
	background-image: -ms-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top." 100%);
	background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0.1, ".$button_gradient_bottom." ), color-stop(1, ".$button_gradient_top.") );
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$button_gradient_bottom."', endColorstr='".$button_gradient_top."', GradientType=0 );

}


#pageing-div-holder{
padding:10px 5px;
border-top:1px solid ".$site_background.";
}



/*Emoticons */


#emoticons-list{
  position:absolute;
  z-index:99;
  background: ". $emoticons_bg .";
  border:1px solid ".$site_borders_color.";
  padding:5px;
  width:300px;
  display:none;
 
}

#emoticons-list img { width:19px; padding:10px; cursor:pointer; border:1px solid transparent; }
#emoticons-list img:hover { background:".$body_background.";  border:1px solid ". $site_borders_color .";}


.image_thumb
{
   background: ".$site_background.";
   padding:1px; 
   border:1px solid ".$site_borders_color."; 
   width:120px;
   height:90px; 
   display:inline-block;
   margin-right:8px; 
   margin-bottom:7px;
   
  
		   box-shadow:0 0px 2px ".$site_borders_color.", inset 0 0px 5px ".$site_borders_color.";
      -moz-box-shadow:0 0px 2px ".$site_borders_color.", inset 0 0px 5px ".$site_borders_color.";
   -webkit-box-shadow:0 0px 2px ".$site_borders_color.", inset 0 0px 5px ".$site_borders_color.";
}

.image_thumb:hover
{
		  box-shadow:0 0px 2px ".$site_borders_color.", inset 0 0px 1px ".$button_gradient_bottom.";
     -moz-box-shadow:0 0px 2px ".$site_borders_color.", inset 0 0px 1px ".$button_gradient_bottom.";
  -webkit-box-shadow:0 0px 2px ".$site_borders_color.", inset 0 0px 1px ".$button_gradient_bottom.";
}


/* Rcm */
#rclick-menu
{
	background-image: linear-gradient(bottom, ".$panel_top_gradient_bottom." 0%, ".$panel_top_gradient_top." 100%);
	background-image: -o-linear-gradient(bottom,  ".$panel_top_gradient_bottom." 0%, ".$panel_top_gradient_top."  100%);
	background-image: -moz-linear-gradient(bottom, ".$panel_top_gradient_bottom." 0%, ".$panel_top_gradient_top." 100%);
	background-image: -webkit-linear-gradient(bottom, ".$panel_top_gradient_bottom." 0%, ".$panel_top_gradient_top."  100%);
	background-image: -ms-linear-gradient(bottom, ".$panel_top_gradient_bottom." 0%, ".$panel_top_gradient_top."   100%);

	background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0, ".$panel_top_gradient_top."),
	color-stop(1, ".$panel_top_gradient_bottom.")
	);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$panel_top_gradient_bottom."', endColorstr='".$panel_top_gradient_top."', GradientType=0 );
	 border:1px solid ".$site_borders_color.";
	 padding:7px;
	 color:	".$text_color.";
	 cursor:pointer;
	 letter-spacing:1px;
	 font-size:11px;
	 font-family:Vendana;
	 position:absolute;
	 display:none;
	 
 -webkit-box-shadow:0 0px 5px #000;
    -moz-box-shadow:0 0px 5px #000;
     -ms-box-shadow:0 0px 5px #000;
      -o-box-shadow:0 0px 5px #000;
		 box-shadow:0 0px 5px #000;
		 
 -webkit-border-radius:0px 5px 5px 5px;
    -moz-border-radius:0px 5px 5px 5px;
         border-radius:0px 5px 5px 5px;
}
#rclick-menu a , #rclick-menu a:hover {
  text-decoration:none;
  color: ".$menu_links_color.";
  font-size:11px;
  letter-spacing:0px;
}

#rclick-menu div {
  padding:6px;
  background:transparent;
  border:0px;
  color: ".$menu_links_color.";
}
#rclick-menu div:hover {
  background: ".$panel_top_gradient_bottom.";
  color:".$panel_top_gradient_top.";
  text-shadow:0px 0px #fcfcfc;
}
p.hr {
 margin:0px;
 padding:0px;
 border-bottom:1px solid ".$site_borders_color.";
 outline:1px solid ".$panel_top_gradient_top.";
 margin:5px 0px;
}

 p#hr{
 margin:0px;
 padding:0px;
 border-bottom:1px solid ".$site_borders_color.";
 outline:1px solid ".$panel_top_gradient_top.";
 margin:5px 0px;
}



/*
  Error & Success Msgs
*/

#success_msg
{
		background:".$success_msg_background_bottom.";
		background-image: linear-gradient(bottom, ".$success_msg_background_bottom." 0%, ".$success_msg_background_top." 100%);
		background-image: -o-linear-gradient(bottom, ".$success_msg_background_bottom." 0%, ".$success_msg_background_top."  100%);
		background-image: -moz-linear-gradient(bottom, ".$success_msg_background_bottom."  0%, ".$success_msg_background_top." 100%);
		background-image: -webkit-linear-gradient(bottom, ".$success_msg_background_bottom." 0%, ".$success_msg_background_top." ) 100%);
		background-image: -ms-linear-gradient(bottom, ".$success_msg_background_bottom." 0%, ".$success_msg_background_top."  100%);
		background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0, ".$success_msg_background_bottom."), color-stop(1,".$success_msg_background_top." ) ); 
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$success_msg_background_top." ', endColorstr='".$success_msg_background_bottom."', GradientType=0 );
		padding:".$success_msg_padding.";
		color:".$success_msg_text_color.";
		text-shadow:1px 1px ".$success_msg_background_top.";
		font-family:Arial;
		margin:5px 0px;
		border:1px solid ".$success_msg_border_color.";
		text-align: ".$success_msg_text_align.";
		font-size: ".$success_msg_text_size.";
}

#error_msg
{
		background:".$error_msg_background_bottom.";
		background-image: linear-gradient(bottom, ".$error_msg_background_bottom." 0%, ".$error_msg_background_top." 100%);
		background-image: -o-linear-gradient(bottom, ".$error_msg_background_bottom." 0%, ".$error_msg_background_top." 100%);
		background-image: -moz-linear-gradient(bottom, ".$error_msg_background_bottom."  0%, ".$error_msg_background_top." 100%);
		background-image: -webkit-linear-gradient(bottom, ".$error_msg_background_bottom." 0%, ".$error_msg_background_top.") 100%);
		background-image: -ms-linear-gradient(bottom, ".$error_msg_background_bottom." 0%, ".$error_msg_background_top." 100%);
		background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0, ".$error_msg_background_bottom."), color-stop(1,".$error_msg_background_top.") ); 
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$error_msg_background_top."', endColorstr='".$error_msg_background_bottom."', GradientType=0 );
		padding:".$error_msg_padding.";
		color:".$error_msg_text_color.";
		text-shadow:1px 1px ".$error_msg_background_top.";
		margin:5px 0px;
		font-family:Arial;
		border:1px solid ".$error_msg_border_color.";
		text-align: ".$error_msg_text_align.";
		font-size: ".$error_msg_text_size.";
}




/*
 Forum
*/


table.forum-table th{ background: ".$panel_top_gradient_bottom."; border-bottom:1px solid ".$site_borders_color."; color: ".$text_color.";  font-size:12px; font-family:Arial; font-weight:bold; }

table.forum-table td{ border-bottom:1px solid ".$site_borders_color.";  padding:12px; }

table.forum-table tr{ background: ". $emoticons_bg ."; padding:15px;}

table.forum-table tr.row{ background: ". $panel_bottom_background_color."; border-bottom:1px solid ".$site_borders_color.";}

table.forum-table tr.row:hover{ background:". $emoticons_bg .";   padding:12px;}

table.no-decor td, .no-decor th{ border-bottom:0px; border:1px solid ".$site_borders_color.";  padding:12px; }

.thead{ background: ". $panel_top_gradient_top."; margin-top:10px; padding:10px;  font-size:16px; font-weight:bold; font-size:Arial;  color: ".$text_color."; text-shadow:1px 1px ". $panel_top_gradient_top .";}



/*
 BB CODE - Цитат
*/
.quote{
 padding:10px;
 font-size:11px;
 color:".$text_color.";
 font-family:arial;
 margin:10px 0px;
 border:1px solid ".$site_borders_color.";
 background:".$input_background.";
}

.quote span{
 color:".$text_color.";
 border-bottom:1px dashed ".$site_borders_color.";
}


#post-has-benn-edited{
  color:".$text_color.";
  border-top:1px dashed ".$site_borders_color.";
  border-bottom:1px dashed ".$site_borders_color.";
}


.forum-read-post-user-info-left{
  border-right:1px solid ".$site_borders_color.";
}

.forum-read-post  .post-time-added{
 color:".$text_color.";
}


.clear-between-forum-answers{
 border-bottom:1px solid ".$site_borders_color.";
}



.bbcode-floated-right a{
 padding:10px;
 background: ".$input_background.";
 border:1px solid ".$input_border_color.";
 border-bottom:0px;
 font-weight:bold;
 color: ".$site_color.";
 margin-left:5px;
 
 
 
 -webkit-box-shadow: inset 0 0px 5px #000 ;
	-moz-box-shadow: inset 0 0px 5px #000 ;
		 box-shadow: inset 0 0px 5px #000 ;
				 
		-webkit-border-radius:5px;
		   -moz-border-radius:5px;
				border-radius:5px;
}

.bbcode-floated-right a:hover{ 
color: ".$text_color.";
}








";


					
					  $file = "../styles/my/".$css_name.".css";
					   $fo = @fopen($file,"w+");
					   @fwrite($fo,$content);
					   fclose($fo);
					   
					   
						

	 $css_path =" styles/my/".$css_name.".css";

	  $q_check = mysqli_num_rows(mysqli_query($_db,"SELECT `css-path`,`title` FROM `site-styles` WHERE `title` = '$css_name' AND `css-path`='$css_path'"));
	  
	  if($q_check >= 1)
	  {
	    mysqli_query($_db,"DELETE FROM `site-styles` WHERE `title` = '$css_name' AND `css-path` = '$css_path' ");
	  }
	 

	 
 mysqli_query($_db,"INSERT INTO `site-styles` (`css-path`,`title`,`body-background`,`body-background-position`, `site-background`, `links-color`, `text-color`, `button-text-color`, `button-text-shadow`, `buttons-shadow`, `button-gradient-top`, `button-gradient-bottom`, `panel-top-gradient-top`, `panel-top-gradient-bottom`, `panel-border-color`, `panel-bottom-background-color`, `panel-top-text-color`, `body-background-image`, `body-background-repeat`, `site-borders-color`, `site-borders-transparent`, `menu-top-background`, `menu-bottom-background`, `menu-background-image`, `menu-background-repeat`, `menu-links-align`, `menu-links-underline`, `menu-links-margin`, `menu-links-color`, `menu-padding`, `menu-links-effect`, `button-text-size`, `button-padding`, `panel-top-background-image`, `panel-top-background-repeat`, `panel-top-text-size`, `panel-top-padding`, `panel-top-text-align`,`panel-top-text-effect`, `panel-bottom-text-color`, `panel-bottom-background-image`, `panel-bottom-background-repeat`, `panel-bottom-text-size`, `panel-bottom-padding`, `panel-bottom-text-align`, `site-bg-transparent`, `panel-border-transparent`, `panel-bottom-background-transparent`,`input-background`,`input-text-color`,`input-border-color`,`input-border-transparent`,`success-msg-background-top`,`success-msg-background-bottom`,`success-msg-text-color`,`success-msg-border-color`,`success-msg-text-align`, `success-msg-padding`, `success-msg-text-size`,`error-msg-background-top`,`error-msg-background-bottom`,`error-msg-text-color`,`error-msg-border-color`
 , `error-msg-text-align`, `error-msg-padding`, `error-msg-text-size`,`menu-box-shadow-transparent`,`menu-box-shadow-color`,`menu-box-shadow-size`,`panel-top-box-shadow-transparent`,`panel-top-box-shadow-color`,`panel-top-box-shadow-size`,`panel-bottom-box-shadow-transparent`,`panel-bottom-box-shadow-size`,`panel-bottom-box-shadow-color`)VALUES('$css_path','$css_name','$body_background', '$body_background_position', '$site_background', '$links_color', '$text_color', '$button_text_color', '$button_text_shadow', '$buttons_shadow', '$button_gradient_top', '$button_gradient_bottom', '$panel_top_gradient_top', '$panel_top_gradient_bottom', '$panel_border_color', '$panel_bottom_background_color', '$panel_top_text_color', '$body_background_image', '$body_background_repeat', '$site_borders_color', '$site_borders_transparent', '$menu_top_background', '$menu_bottom_background', '$menu_background_image', '$menu_background_repeat', '$menu_links_align', '$menu_links_underline', '$menu_links_margin', '$menu_links_color', '$menu_padding', '$menu_links_effect', '$button_text_size', '$button_padding', '$panel_top_background_image', '$panel_top_background_repeat', '$panel_top_text_size', '$panel_top_padding', '$panel_top_text_align', '$panel_top_text_effect', '$panel_bottom_text_color', '$panel_bottom_background_image', '$panel_bottom_background_repeat', '$panel_bottom_text_size', '$panel_bottom_padding', '$panel_bottom_text_align','".$_POST['site-bg-transparent']."','".$_POST['panel-border-transparent']."','".$_POST['panel-bottom-background-transparent']."','$input_background','$input_text_color','$input_border_color','".$_POST['input-border-transparent']."','$success_msg_background_top', '$success_msg_background_bottom', '$success_msg_text_color', '$success_msg_border_color', '$success_msg_text_align', '$success_msg_padding', '$success_msg_text_size', '$error_msg_background_top', '$error_msg_background_bottom', '$error_msg_text_color', '$error_msg_border_color', '$error_msg_text_align', '$error_msg_padding','$error_msg_text_size', '$menu_box_shadow_transparent','$menu_box_shadow_color','$menu_box_shadow_size','$panel_top_box_shadow_transparent','$panel_top_box_shadow_color','$panel_top_box_shadow_size','$panel_bottom_box_shadow_transparent','$panel_bottom_box_shadow_size','$panel_bottom_box_shadow_color')") OR DIE (mysqli_error($_db));		   
					   

					   
					     mysqli_query($_db,"UPDATE `site-settings` SET `default_site_style` = './styles/my/".$css_name.".css' ");
						 ok("Дизайна на сайт е успешно променен :)");
						  $url =  "&w=edit&title=".$css_name; 
						 echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"3;URL=./?p=".$_GET['p']."".$url."\" >";
				  }
				  else
					  {
					    error("Ако искаш сайта ти да стане зарибен попълни всички полета !");
					  }
			 }
			 else if(isset($_POST['reset-web-layout']))
					 {
						 mysqli_query($_db,"UPDATE `site-settings` SET `default_site_style` = NULL ");
			


 
						 ok("Дизайна на сайт е успешно върнат както си беше оригинала :) ");
						 echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"1;URL=./?p=".$_GET['p']."\" >";
					 }
			 
			?>
		</form>
		
</div>