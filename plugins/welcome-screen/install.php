<link rel="stylesheet" href="./styles/colorpicker.css" type="text/css" />
<link rel="stylesheet" href="./styles/layout.css" type="text/css" />
<script type='text/javascript'>
$(function () {
<?php
 $field = array(
   0 => "page-title-color",
   1 => "page-bg-color",
   2 => "page-content-color");

  $color = array( 
   0 => "#FFFFFF", 
   1 => "#000000",
   2 => "#FFFFFF");

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
					$("#<?php echo $field[$i]?>-cpkr").css('color', '#' + hex);
					$("#<?php echo $field[$i]?>").css('background','#' + hex);
					$("#<?php echo $field[$i]?>").attr('value','#' + hex);
				}
			});
			
			$("#<?php echo $field[$i]?>").css('background','<?php echo $color[$i];?>');
			$("#<?php echo $field[$i]?>").css('cursor','pointer');

<?php
}
?>


});
</script>



<form method='post' action=''>
    <div style='margin:5px;font-size:18px;font-family:Arial;'> Инсталиране на < <b style='font-size:18px;'>	<?php 
		$pl = mysqli_fetch_array(mysqli_query($_db,"SELECT `title` FROM `plugins` WHERE `plugin_name`='$title'"));
		echo $pl['title'];
	?></b> ></div>
	
    <b>Заглавие</b> на страницата<br/>
	 <input type='text' name='page-title' value="Добре дошли в сайта ни" style='width:455px;' id='page-title-color-cpkr'  /> <input type='text' id='page-title-color' name='page-title-color' value="#FFFFFF" maxlength='7' style='width:55px;'  readonly />
	<br/>

    <b>Фон</b> на страницата<br/>
    <input type='text' name='page-bg' value="http://"  style='width:455px;'  id='page-bg-color-cpkr' />  <input type='text' id='page-bg-color' name='page-bg-color' value="#000000" maxlength="7" style='width:55px;' readonly />
	<br/>
	
	
    <b>Съдържание</b> на страницата 
	<br/>
	
    <textarea name='page-content'  id='page-content-color-cpkr' style='min-width:695px;max-width:695px;width:695px;max-height:1200px;height:500px;'>
            поддържа HTML:)


<!--[ Това е просто линк, който ще води потребителя до сайта (ако искаш го махни) :) ]-->
         <a href='./?p=index' style='float:right;'>Към сайта</a>
 
 </textarea>
	
	<br/>
		<b>Цвят на текста</b> в съдържанието: <input type='text' id='page-content-color'  name='page-content-color' value="#FFFFFF" maxlength="7"  style='width:55px;'  readonly  />
		
		
	
	<span style='float:right;margin-top:-5px;'>
			<b>Подравни текста</b> в съдържанието: <br/>
			<select name='content-align' style='width:155px;'>	
				<option value="left">В ляво</option>
				<option value="center">В средата</option>
				<option value="right">В дясно</option>
			<select>
	</span>
	<br id='clear'/>
 <button id='button' type='submit' name='go_install'>Инсталирай</button>
<form>
<?php
if(isset($_POST['go_install']))
{

													  
	$wpage_title  = trim($_POST['page-title']);
	$wpage_content  = trim(htmlspecialchars(addslashes($_POST['page-content'])));
	$wpage_content_align  = trim($_POST['content-align']);
	$wpage_bg  = trim($_POST['page-bg']);

	//COLORS: page-title-color, page-bg-color, page-content-color
	$wpage_title_color  = trim($_POST['page-title-color']);
	$wpage_bg_color  = trim($_POST['page-bg-color']);
	if( strlen($wpage_bg) < 10)
	{
	 $bg_code = "".$wpage_bg_color;
	}
	else
		{
			$bg_code =  $wpage_bg_color." url('".$wpage_bg ."') center center; \n background-repeat: no-repeat; \n background-attachment: fixed;";
		}
	
	$marginLeft="";
	if( $wpage_content_align == "left"){ $marginLeft = "margin-left:25%";}
	$centrTag1 = ""; $centrTag2 = "";
	if( $wpage_content_align == "center"){ $centrTag1 = "<center>"; $centrTag2 = "</center>";}
	
	$wpage_content_color  = trim($_POST['page-content-color']);
  
  
  
	$fname = "welcome-screen.php";
				
						   $file = "../index.php";
						   $cont =  file_get_contents($file);
						   $new_row = "// -- Tuk mqsto za proverki -- 
						   if(strlen(\$_GET['p']) < 1 OR !\$_GET['p']){ header(\"Location: ./".	$fname."\"); exit;}";
						   $cont = str_replace("// -- Tuk mqsto za proverki -- ",$new_row."\n // -- Tuk mqsto za proverki -- ", $cont);
						   $fo = fopen($file,"w+");
						   fwrite($fo,$cont);
						   fclose($fo);
		
				
				$script = trim("
				<style type='text/css'>
				*{ margin:0px; padding:0px;}
				body{
				 background: ".$wpage_bg_color.";
				 background: ". $bg_code .";
				 text-align: ".$wpage_content_align.";
				}
				div{ margin:0px auto; width:800px; }
				div#content{ margin:0px auto; width:700px;}
				
				a{ color:".$wpage_title_color."; font-weight:bold; font-size:15px; font-family:arial; text-decoration:none; }
				a:hover{ text-decoration:underline;}
				
				</style>
				
				<div id='welcome-screen' style=\"left:0px;top:0px;padding-top:70px;\">
				<div id='title' style='font-weight:bold;font-size:28px;font-family:Arial;color:".$wpage_title_color.";text-align:center;'>".$wpage_title."</div>
				 <br /> <br />
			".$centrTag1."
				<div id='content' align='center' style='padding:10px;font-size:14px;font-family:Arial;color:".$wpage_content_color.";text-align:".$wpage_content_align.";".$marginLeft.";width:70%;'>".trim(htmlspecialchars_decode(stripcslashes(stripslashes(nl2br($wpage_content)))))."</div> 
				
			".$centrTag2."
				</div>
				
				
				");
		
					$fa =  fopen("../".$fname ,"w+");
					fwrite($fa, $script);
					fclose($fa);
						   
	 mysqli_query($_db,"UPDATE `plugins` SET `installed`='true' WHERE `plugin_name`='$title'") or DIE(mysqli_error());
	 ok("Плъгина беше инсталиран успешно :)");
	echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=./?p=plugins\" >"; // 
	}
