<script type="text/javascript" language="javascript" src="./scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" language="javascript" src="./scripts/cpkr/colorpicker.js"></script>
<script type="text/javascript" language="javascript" src="./scripts/cpkr/eye.js"></script>
<script type="text/javascript" language="javascript" src="./scripts/cpkr/layout.js"></script>
<script type="text/javascript" language="javascript" src="./scripts/cpkr/utils.js"></script>
<link rel="stylesheet" href="./styles/colorpicker.css" type="text/css" />
<link rel="stylesheet" href="./styles/layout.css" type="text/css" />
<script>
$(function () {
<?php	
  echo FIX_ENCODING;
  $field = array("body-background","site-background","links-color","text-color","button-text-color","button-text-shadow","buttons-shadow","button-gradient-top","button-gradient-bottom","panel-top-text-color","panel-top-gradient-top","panel-top-gradient-bottom","panel-bottom-background-color","panel-bottom-text-color","panel-border-color");
  
  $color = array("#000000","#212121","#9b0707","#CCCCCC","#110000","#8c0000","#000000","#660000","#490000","#840707","#262626","#000000","#333333","#888888","#000000");
  
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
</script>

<div id='panel-top'>Настроики на визията на сайта </div>
<div id='panel-bottom'>
		
			
	
			
		<form method='post' action=''>
		
		<!---   фонове на сайта -->
		<div id='site-visual-cpkr-box' style='border-top:none;'>
			<Div style='border-bottom:1px solid #000;padding:5px;font-size:12px;'><b style='color:#ccc;'>Общи</b> <b style='color:#ccc;float:right;margin-right:300px;'>Линкове</b></div>
			<span id='left'>
				<b>Фон</b> на <b>страницата</b><br/>
				<input name="body-background" id="body-background"  value="<?php if($_POST['body-background']){ echo $_POST['body-background']; }else{echo "#000000";}?>"  style='width:100px;' maxlength='7' readonly /> <span id='body-background-cpkr' class='cpkr-sampler'></span> 
			</span>
			<span id='left'>
				<b>Фон</b> на <b>сайта</b><br/>
				<input name="site-background"  id="site-background"  value="<?php if($_POST['site-background']){ echo $_POST['site-background']; }else{echo "#212121"; }?>" style='width:100px;' maxlength='7' readonly /> <span id='site-background-cpkr' class='cpkr-sampler'></span> 
			</span>
			
			<span id='left' style='border-left:1px solid #000;padding-left:10px;'>
					<b>Цвят</b> на <b>линковете</b> в сайта<br/>
					<input name="links-color" id="links-color"  value="<?php if($_POST['links-color']){ echo $_POST['links-color']; }else{echo "#9b0707"; }?>"  style='width:100px;' maxlength='7' readonly /> <span id='links-color-cpkr' class='cpkr-sampler'></span> 
				</span>
			
			<span id='left'>
					<b>Цвят</b> на <b>текста</b> в сайта<br/>
					<input name="text-color"  id="text-color"  value="<?php if($_POST['text-color']){ echo $_POST['text-color']; }else{echo "#CCCCCC"; }?>"  style='width:100px;' maxlength='7' readonly /> <span id='text-color-cpkr' class='cpkr-sampler'></span> 
				</span>
		</div>
			
			
					<div id='clear'></div>
			

		

	<!---  Бутони -->
		<div id='site-visual-cpkr-box'>
			<Div style='border-bottom:1px solid #000;padding:5px;font-size:12px;'><b style='color:#ccc;'>Бутони</b></div>
<span id='left'>		
		<b>Цвят</b> на текста вътре <br/>
			<input name="button-text-color"  id="button-text-color"  value="<?php if($_POST['button-text-color']){ echo $_POST['button-text-color']; }else{echo "#110000"; }?>"  style='width:70px;' maxlength='7' readonly /> <span id='button-text-color-cpkr' class='cpkr-sampler'></span> 
	</span>
	
<span id='left'>	
			<b>Сянката</b> на текста <br/>
			<input name="button-text-shadow"   id="button-text-shadow"  value="<?php if($_POST['button-text-shadow']){ echo $_POST['button-text-shadow']; }else{echo "#8c0000"; }?>"  style='width:60px;' maxlength='7' readonly /> <span id='button-text-shadow-cpkr' class='cpkr-sampler'></span> 
</span>
<span id='left'>
			<b>Сянката</b> на бутона  <br/>
			<input name="buttons-shadow"  id="buttons-shadow"  value="<?php if($_POST['buttons-shadow']){ echo $_POST['buttons-shadow']; }else{echo "#000000"; }?>"  style='width:60px;' maxlength='7' readonly /> <span id='buttons-shadow-cpkr' class='cpkr-sampler'></span> 
</span>
<span id='left'>		
			<b>Фон 1</b> на бутона <br/>
			<input name="button-gradient-top"  id="button-gradient-top"  value="<?php if($_POST['button-gradient-top']){ echo $_POST['button-gradient-top']; }else{echo "#660000"; }?>"  style='width:50px;' maxlength='7' readonly /> <span id='button-gradient-top-cpkr' class='cpkr-sampler'></span> 
			
			<span style='position:absolute;margin-left:120px;margin-top:-50px;'>
				<b>Фон 2</b> на бутона <br/>
				<input  name="button-gradient-bottom"   id="button-gradient-bottom"  value="<?php if($_POST['button-gradient-bottom']){ echo $_POST['button-gradient-bottom']; }else{echo "#490000"; }?>"  style='width:50px;' maxlength='7' readonly /> <span id='button-gradient-bottom-cpkr' class='cpkr-sampler'></span> 
			</span>
</span>			
			
		</div>
		<!---  Панелите-->
		
		
				<div id='clear'></div>
				
				
			
		<div id='site-visual-cpkr-box' style='border-left:0px;maring-top:0px;'>
			<Div style='border-bottom:1px solid #000;padding:5px;font-size:12px;'><b style='color:#ccc;'>Панели - горната част</b> <b style='color:#ccc;float:right;margin-right:150px;'>Панели - долната част</b></div>
				<span id='left'>		
							<b>Цвят</b> на текста в И. на П.<br/>
							<input 	name="panel-top-text-color"  id="panel-top-text-color"  value="<?php if($_POST['panel-top-text-color']){ echo $_POST['panel-top-text-color']; }else{echo "#840707"; }?>"  style='width:70px;' maxlength='7' readonly /> <span id='panel-top-text-color-cpkr' class='cpkr-sampler'></span>
					</span>	
					
					<span id='left'>						
									<b>Фон 1</b> на И. на П.  <br/>
									<input name="panel-top-gradient-top" id="panel-top-gradient-top"  value="<?php if($_POST['panel-top-gradient-top']){ echo $_POST['panel-top-gradient-top']; }else{echo "#262626"; }?>"  style='width:50px;' maxlength='7' readonly /> <span id='panel-top-gradient-top-cpkr' class='cpkr-sampler'></span> </br>
							</span>		
						<span id='left'>			
										<b>Фон 2</b> на И. на П. <br/>
										<input  name="panel-top-gradient-bottom"  id="panel-top-gradient-bottom"  value="<?php if($_POST['panel-top-gradient-bottom']){ echo $_POST['panel-top-gradient-bottom']; }else{echo "#000000"; }?>"  style='width:50px;' maxlength='7' readonly /> <span id='panel-top-gradient-bottom-cpkr' class='cpkr-sampler'></span>
									
					</span>
					<span id='left' style='border-left:1px solid #000;padding-left:7px;'>			
									<b>Фон</b> на <b>панела</b> <br/>
									<input name="panel-bottom-background-color"  id="panel-bottom-background-color"  value="<?php if($_POST['panel-bottom-background-color']){ echo $_POST['panel-bottom-background-color']; }else{echo "#333333"; }?>"  style='width:50px;' maxlength='7' readonly /> <span id='panel-bottom-background-color-cpkr' class='cpkr-sampler'></span>
					</span>
					<span id='left'>			
									<b>Цвят</b> на текста в <b>панела</b> <br/>
									<input name="panel-bottom-text-color" id="panel-bottom-text-color"  value="<?php if($_POST['panel-bottom-text-color']){ echo $_POST['panel-bottom-text-color']; }else{echo "#888888"; }?>"  style='width:80px;' maxlength='7' readonly /> <span id='panel-bottom-text-color-cpkr' class='cpkr-sampler'></span> 
					</span>
					
					<span id='left'>			
									<b>Цвят</b> на рамката в <b>панела</b> <br/>
									<input name="panel-border-color" id="panel-border-color"  value="<?php if($_POST['panel-border-color']){ echo $_POST['panel-border-color']; }else{echo "#000000"; }?>"  style='width:80px;' maxlength='7' readonly /> <span id='panel-border-color-cpkr' class='cpkr-sampler'></span> 
					</span>
		</div>
			<!---  Панелите-->
			
			
			<div id='clear'></div>
			
			
			
			
			<div style='border-top:1px solid #000;padding:5px;'>
				<b>Заглавие</b> на  присета <br/>
				<input name='document-name'  value="<?php if($_POST['document-name']){ echo $_POST['document-name']; }else{ echo "my-new-css-style"; }?>" style='width:350px;' maxlength='70' /> <button name='save-web-layout' type='submit'>Запази</button>  <!--- <button name='reset-web-layout' type='submit'>Върни фабричните настройки</button> --->
			</div>
			<?php
			 if(isset($_POST['save-web-layout']))
			 { 
			 
			  // table -> site-settings
				 $css_name = trim($_POST['document-name']);
				 $css_name = str_replace(" ","-",$css_name);
				   // Generated Colors
					$body_background = trim(htmlspecialchars($_POST['body-background']));// done
					$site_background = trim(htmlspecialchars($_POST['site-background']));// 
					
					$links_color = trim(htmlspecialchars($_POST['links-color']));// done
					$text_color = trim(htmlspecialchars($_POST['text-color']));// done
					
					$button_text_color = trim(htmlspecialchars($_POST['button-text-color'])); // done
					$button_text_shadow = trim(htmlspecialchars($_POST['button-text-shadow'])); // done
					$buttons_shadow = trim(htmlspecialchars($_POST['buttons-shadow'])); // done
					$button_gradient_top = trim(htmlspecialchars($_POST['button-gradient-top']));// done
					$button_gradient_bottom = trim(htmlspecialchars($_POST['button-gradient-bottom']));// done
					
					$panel_top_text_color = trim(htmlspecialchars($_POST['panel-top-text-color'])); // done
					$panel_top_gradient_top = trim(htmlspecialchars($_POST['panel-top-gradient-top']));			
					$panel_top_gradient_bottom = trim(htmlspecialchars($_POST['panel-top-gradient-bottom']));
					
					$panel_border_color = trim(htmlspecialchars($_POST['panel-border-color'])); // done
					
					$panel_bottom_background_color = trim(htmlspecialchars($_POST['panel-bottom-background-color'])); // done
					$panel_bottom_text_color = trim(htmlspecialchars($_POST['panel-bottom-text-color']));  // done
				 
				 if(!empty($css_name))
				  {
$content = "/* Фона и цвят на текста на страницата */\n body, root { 
background:".$body_background."; 
color:".$text_color."; 
}  

#main{ background:".$site_background.";border:1px solid ".$site_background.";} /* Фона на сайта */ 
#news-title{ color:".$panel_top_text_color."; } /* Цвят на заглавията на новините	*/ 

a , b{  color:".$links_color."; text-shadow:none; } /* Цвят на линковете и удебелените думи в сайтт*/ 


/* Бутоните  */ \n 
button, #button, a#button , button:hover, #button:hover, a#button:hover {	
background-image: linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top."  100%);
background-image: -o-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top." 100%);
background-image: -moz-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top." 100%);
background-image: -webkit-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top.") 100%);
background-image: -ms-linear-gradient(bottom, ".$button_gradient_bottom." 10%, ".$button_gradient_top." 100%);
background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0.1, ".$button_gradient_bottom." ), color-stop(1, ".$button_gradient_top.") );
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$button_gradient_top."', endColorstr='".$button_gradient_bottom."', GradientType=0 );
color:".$button_text_color.";	
border-top: 1px solid ".$button_gradient_top."; 
text-shadow:1px 1px ".$button_text_shadow.";	
/* Shadow */ \n
border:1px solid ".$button_gradient_bottom.";
-webkit-box-shadow:0 0px 2px ".$buttons_shadow.";	
-moz-box-shadow:0 0px 2px ".$buttons_shadow.";	
 box-shadow:0 0px 2px ".$buttons_shadow.";	
}

/*	  Менюто - то е със същият градиен като на Горната част на панелите	*/  
#menu-conteinter { 
background-image: linear-gradient(bottom, ".$panel_top_gradient_bottom." 10%, ".$panel_top_gradient_top." 100%);
background-image: -o-linear-gradient(bottom, ".$panel_top_gradient_bottom." 10%, ".$panel_top_gradient_top." 100%);
background-image: -moz-linear-gradient(bottom, ".$panel_top_gradient_bottom." 10%, ".$panel_top_gradient_top." 100%);
background-image: -webkit-linear-gradient(bottom, ".$panel_top_gradient_bottom." 10%, ".$panel_top_gradient_top.") 100%);
background-image: -ms-linear-gradient(bottom, ".$panel_top_gradient_bottom." 10%, ".$panel_top_gradient_top." 100%);
background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0.1, ".$panel_top_gradient_bottom."), color-stop(1, ".$panel_top_gradient_top.") );
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$panel_top_gradient_top."', endColorstr='".$panel_top_gradient_bottom."', GradientType=0 );
border:1px solid ".$panel_border_color.";
}

 /*	 Горната част на панелите	*/ 
#panel-top { 
background-image: linear-gradient(bottom, ".$panel_top_gradient_bottom." 10%, ".$panel_top_gradient_top." 100%);
background-image: -o-linear-gradient(bottom, ".$panel_top_gradient_bottom." 10%, ".$panel_top_gradient_top." 100%);
background-image: -moz-linear-gradient(bottom, ".$panel_top_gradient_bottom." 10%, ".$panel_top_gradient_top." 100%);
background-image: -webkit-linear-gradient(bottom, ".$panel_top_gradient_bottom." 10%, ".$panel_top_gradient_top.") 100%);
background-image: -ms-linear-gradient(bottom, ".$panel_top_gradient_bottom." 10%, ".$panel_top_gradient_top." 100%);
background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0.1, ".$panel_top_gradient_bottom."), color-stop(1, ".$panel_top_gradient_top.") );
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$panel_top_gradient_top."', endColorstr='".$panel_top_gradient_bottom."', GradientType=0 );
color: ".$panel_top_text_color."; 
border:1px solid ".$panel_border_color.";  
border-bottom:0px;
}

 /*	 Долната част на панелите	*/  
#panel-bottom{ 
background: ".$panel_bottom_background_color.";  
color:".$panel_bottom_text_color.";  
border:1px solid ".$panel_border_color.";  

}

/* Footer */
#footer{
  margin:0px auto;
  background:".$body_background.";
  padding:5px;
  width:950px;
  border:0px;
  color:".$text_color.";
}


/* INPUTS BE MEN .. */ 
input 
{ 
	background:".$site_background."; 
	border:1px solid ".$panel_border_color."; 
	padding:6px; 
	color:".$text_color."; 
	margin-bottom:7px; 
}

select
{
	width:200px;
	max-height:200px;
	background:".$site_background.";
	border:1px solid ".$panel_border_color.";
	padding:6px;
	color:".$text_color.";
	margin-bottom:7px;
}


textarea
{
    width:200px;
	max-width:450px;
	max-height:200px;
	background:".$site_background.";
	border:1px solid ".$panel_border_color.";
	padding:6px;
	color:".$text_color.";
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
	color: #666;
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
  background: ".$site_background.";
  border:1px solid ".$panel_border_color.";
  padding:5px;
  width:300px;
  display:none;
 
}

#emoticons-list img { width:19px; padding:10px; cursor:pointer; }
#emoticons-list img:hover { background:".$body_background."; }


.image_thumb
{
   background: ".$site_background.";
   padding:1px; 
   border:1px solid ".$panel_border_color."; 
   width:120px;
   height:90px; 
   display:inline-block;
   margin-right:8px; 
   margin-bottom:7px;
   
  
		   box-shadow:0 0px 2px ".$panel_border_color.", inset 0 0px 5px ".$panel_border_color.";
      -moz-box-shadow:0 0px 2px ".$panel_border_color.", inset 0 0px 5px ".$panel_border_color.";
   -webkit-box-shadow:0 0px 2px ".$panel_border_color.", inset 0 0px 5px ".$panel_border_color.";
}

.image_thumb:hover
{
		  box-shadow:0 0px 2px ".$panel_border_color.", inset 0 0px 1px ".$button_gradient_bottom.";
     -moz-box-shadow:0 0px 2px ".$panel_border_color.", inset 0 0px 1px ".$button_gradient_bottom.";
  -webkit-box-shadow:0 0px 2px ".$panel_border_color.", inset 0 0px 1px ".$button_gradient_bottom.";
}
";


				
					
					
					  $file = "../styles/my/".$css_name.".css";
					 if(@file_exists($file))
					 {
					    @unlink($file);
					 }
					   $fo = @fopen($file,"a+");
					   @fwrite($fo,$content);
					   fclose($fo);
					     mysqli_query($_db,"UPDATE `site-settings` SET `default_site_style` = './styles/my/".$css_name.".css' ");
						 ok("Дизайна на сайт е успешно променен :)");
						// echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=".$_GET['p']."\" >";
				  }
				  else
					  {
					    error("Ако искаш сайта ти да стане зарибен попълни всички полета !");
					  }
			 }
			 else if(isset($_POST['reset-web-layout']))
					 {
						 mysqli_query($_db,"UPDATE `site-settings` SET `default_site_style` = NULL ");
						 ok("Дизайна на сайт е успешно върнат както си беше оригинала :)");
						 echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"1;URL=./?p=".$_GET['p']."\" >";
					 }
			 
			?>
		</form>
		
</div>