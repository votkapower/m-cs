<?php
session_start();
ob_start();

if(!file_exists("conf.php")) { header("Location: ./install/"); exit;}

require_once "conf.php";
require_once "functions.php";
require_once "default_props.php";
 
 // -- Tuk mqsto za proverki -- 
// TO GET CURRENT CSS STYLE
$get_settings = mysqli_query($_db,"SELECT `keywords`,`description`,`publisher`,`copyright`,`revisit`,`default_site_style` FROM `site-settings` ORDER BY `id` DESC LIMIT 1");
$data = mysqli_fetch_array($get_settings);


$p = trim(htmlspecialchars($_GET['p']));

		 if( $p  == "forum"){ $center_width='style="width:930px;"'; } 
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $data['keywords'];?>" />
<meta name="Description" content="<?php echo $data['description'];?>" />
<meta name="Author" content="<?php echo $data['publisher'];?>" />
<meta name="Copyright" content="<?php echo $data['copyright'];?>" />
<meta name="Robots" content="index, follow" />
<meta name="Googlebots" content="index, follow" />
<meta name="Revisit" content="<?php echo $data['revisit'];?>" />
<link rel="stylesheet" href="./styles/main.css" type="text/css" />

<script type="text/javascript" language="javascript" src="./scripts/jquery-1.8.2.min.js"></script>
<script type="text/javascript" language="javascript" src="./scripts/bbcode.js"></script>
<script type="text/javascript" language="javascript" src="./scripts/rcm.js"></script>
<script type="text/javascript" language="javascript" src="./scripts/emo.js"></script>
             <!---{PLUGINS}--->
<title><?php echo SITE_TITLE;?></title>
<?php if(strlen($data['default_site_style']) > 3 ){  default_site_layout($data['default_site_style']);		}?>
</head>
<body>
<div id='body-warrper'>
    <div id='main'>
        <div id="header"><?php echo SITE_HEADER_IMAGE;?></div>
        <div id="menu-conteinter"><?php require_once "includes/site/menu.php"; ?></div>
      
	  <div id='sides'>
		
		<?php
		 if( $p  != "forum")
		 {
		 ?>
		 
				<div id="left-side" >
					<?php require_once "includes/site/left-part.php";?>
				</div>
				
				
		 <?php
		 }
		?>
		

    <div id="center-side" <?php if(isset($center_width)) echo $center_width;?>>
					<div id='news'>
								<?php 
							   if(!$p) { $p = DEFAULT_INDEX_PAGE; }
								if(@file_exists("./switch/".$p."/index.php"))
										{
										   include "./switch/".$p."/index.php";
										}
										else
											{
											   include "./switch/".DEFAULT_INDEX_PAGE."/index.php"; //index
											}
			
								?>
					</div>
	
	<div id="clear"></div>
	<?php
		 if( $p  != "forum")
		 {
	 ?>
			<!-- REKLAME -->
	<div id='reclame-center'>
	
			<div id='panel-top'>Реклама</div>
			<div id='panel-bottom'>
			<?php
			  $rand_banner = mysqli_fetch_array(mysqli_query($_db,"SELECT * FROM `banners` WHERE `razmer`='468x60' AND `show`='true' ORDER BY rand() LIMIT 1"));
			   echo "<a href='".$rand_banner['url']."'><img src='".$rand_banner['image']."'  width='395'  title='".$rand_banner['alt']."' alt='".$rand_banner['alt']."' border='0' /></a>";
			?>
			</div>
	
	</div>
			<!-- REKLAME -->
	<?php
	}
	?>		
			<div id="clear"></div>
    </div>
	   
		<?php
		 if( $p  != "forum")
		 {
		 ?>	
            <div id="right-side">
              <?php require_once "includes/site/right-part.php";?>
			</div>
			
		<?php
		 }
		 ?>
		    <div id="clear"></div>
    </div>
	    <div id="clear"></div>
</div>

 <div id="clear"></div>

		<div id='footer' ><?php require_once "includes/site/footer.php";?></div>


	<div id='emoticons-list'>
		
		<img src='./images/emo/1.gif'  width='19' border='0' onclick="addEmo(':D')" title=":D" />
		<img src='./images/emo/2.gif'  width='19' border='0' onclick="addEmo(';)')"  title=";)" />
		<img src='./images/emo/3.gif'  width='19' border='0' onclick="addEmo(':)')" title=":)" />
		<img src='./images/emo/4.gif'  width='19' border='0'  onclick="addEmo(';(')" title=";(" />
		<img src='./images/emo/5.gif'  width='19' border='0' onclick="addEmo(':*')" title=":*" />
		<img src='./images/emo/6.gif'  width='19' border='0'  onclick="addEmo(':p')" title=":p" />
		<img src='./images/emo/7.gif'  width='19' border='0' onclick="addEmo('(kvo)')"  title="(kvo)" />
		<img src='./images/emo/11.gif'  width='19' border='0' onclick="addEmo('(doh)')" title="(doh)" />
		<img src='./images/emo/12.gif'  width='19' border='0' onclick="addEmo(':@')"  title=":@" />
		<img src='./images/emo/13.gif'  width='19' border='0'  onclick="addEmo('(wasntme)')"title="(wasntme)" />
		<img src='./images/emo/14.gif'  width='19' border='0'  onclick="addEmo(';)')" title=";)" />
		<img src='./images/emo/15.gif'  width='19' border='0' onclick="addEmo(':x')" title=":x" />
		<img src='./images/emo/18.gif'  width='19' border='0' onclick="addEmo('(hug)')" title="(hug)" />
		<img src='./images/emo/19.gif'  width='19' border='0' onclick="addEmo('(xixi)')" title="(xixi)"  />
		<img src='./images/emo/20.gif'  width='19' border='0' onclick="addEmo('(bravo-bravo)')" title="(bravo-bravo)"  />
		<img src='./images/emo/21.gif'  width='19' border='0' onclick="addEmo('(ok)')" title="(ok)" />
		<img src='./images/emo/22.gif'  width='19' border='0'  onclick="addEmo('(yes)')"  title="(yes)" />
		<img src='./images/emo/23.gif'  width='19' border='0'  onclick="addEmo('(no)')"   title="(no)" />
		<img src='./images/emo/9.gif'  width='19' border='0' onclick="addEmo('(inlove)')"   title="(inlove)" />
		<img src='./images/emo/16.gif'  width='19' border='0' onclick="addEmo('(devil)')"   title="(devil)" />
		<img src='./images/emo/17.gif'  width='19' border='0'  onclick="addEmo('(angel)')"   title="(angel)" />
		<img src='./images/emo/24.gif'  width='19' border='0' onclick="addEmo('(sun)')"   title="(sun)" />
		<img src='./images/emo/25.gif'  width='19' border='0' onclick="addEmo('(smooking)')"  title="(smooking)" />
		<img src='./images/emo/26.gif'  width='19' border='0' onclick="addEmo('(fubar)')"   title="(fubar)" />
		<img src='./images/emo/27.gif'  width='19' border='0' onclick="addEmo('(swear)')"   title="(swear)" />
		<img src='./images/emo/28.gif'  width='19' border='0'  onclick="addEmo('(heady)')"  title="(heady)" />
		<img src='./images/emo/10.gif'  width='19' border='0' onclick="addEmo('(evil)')"   title="(evil)" />
		<img src='./images/emo/8.gif'  width='19' border='0' onclick="addEmo('(dull)')"  title="(dull)"  />
				
	</div>  
	
 

</body>     
</html>     