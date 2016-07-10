<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Преглед на стиловите настройки</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../styles/main.css" type="text/css" />
<link rel="stylesheet" href="../../styles/my/<?php echo $_GET['style']; ?>.css" type="text/css" />
<style type='text/css'>
body, root{ margin-left:20px; margin-top:20px; }
</style>
</head>
<body>
<div id='body-warrper'  style='width:550px;'>
	<div id='main' style='width:550px;'>
				<div id="header"></div>
				<div id="menu-conteinter"><?php require_once "../../includes/site/menu.php"; ?></div>
			  
			  <div id='sides'>
				
				
						<div id="left-side" style='width:150px;'>
						
								<div id='panel-top'>Панел - горна част</div>
								<div id='panel-bottom'>
										Панел - долна част
								</div>
								
								<div id='panel-top'>Панел - горна част</div>
								<div id='panel-bottom'>
										Панел - долна част
										
								</div>
						</div>

				

					<div id="center-side"  style='width:210px;'>
					
							
							<div id="clear"></div>
							
							<div id='reclame-center'>
							
									<div id='panel-top'>Панел - горна част</div>
									<div id='panel-bottom'>
											Панел - долна част
											 
											
									</div>
							 
							   <input type='text' value="тестово поленце" />
							   <br/>
							   
							   <select>
								<option>тестова опция</option>
							   </select>
							    <br/>
								
								
							   <button>тестово бутонче</button>
							   <br/>
							   
							 
							</div>
								
									
					
					</div>
					
					<div id="right-side"  style='width:150px;'>
					
								<div id='panel-top'>Панел - горна част</div>
								<div id='panel-bottom'>
										Панел - долна част
								</div>
								
								<div id='panel-top'>Панел - горна част</div>
								<div id='panel-bottom'>
										Панел - долна част
								</div>
								
								
					</div>
					
				<div id="clear"></div>
			</div>
			
 <div id='success_msg' style='width:520px;'>Събщение за успех</div>
 <div id='error_msg' style='width:520px;'>Събщение за грешка</div>
			
		</div>

 <div id="clear"></div>
 



<script type='text/javascript' src="../../scripts/jquery-1.8.2.min.js"></script>
<script type='text/javascript'>
$(function () {
   $("*").click(function () {
	  return false;
   });
});
</script>

</body>     
</html>     