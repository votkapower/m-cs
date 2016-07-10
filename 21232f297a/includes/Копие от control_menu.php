<?php
 $unreaded_msgs = mysqli_num_rows(mysqli_query($_db,"SELECT * FROM `contacts` WHERE `readed`='0'"));
 $total_msgs = mysqli_num_rows(mysqli_query($_db,"SELECT * FROM `contacts`"));
?>
<div id='panel-top'>Контролът е в тови ръце ..</div>
<div id='panel-bottom'>


		<div style='background:#540303;color:#160000;text-shadow:1px 1px #660202;padding:5px 3px;font-family:Arial;'>Настрой</div>
			<a href='./?p=site_settings'><img src='../images/icons/interface_preferences.png' width='16' /> Настроики на сайта</a>  <br/>
			<a href='./?p=site_style'><img src='./images/color_wheel.png' width='16' /> Визия на сайта</a> <br/>
			<a href='./?p=plugins'><img src='../images/icons/html_go.png' width='16' /> Плъгини</a> <br/>
			<!----plugin-place-1--->
		<br/>
		
		
		
		<div style='background:#540303;color:#160000;text-shadow:1px 1px #660202;padding:5px 3px;font-family:Arial;'>Поща</div>
		
			<img src='../images/icons/email_go.png' width='16' />Съобщения: <a href='./?p=contact_msgs'><?php echo $unreaded_msgs;?></a> / <a href='./?p=contact_msgs&w=all'><?php echo $total_msgs;?></a> 
		<br />	
			<!----plugin-place-2--->
		<br />
		

		
		
	    <div style='background:#540303;color:#160000;text-shadow:1px 1px #660202;padding:5px 3px;font-family:Arial;'>Добави</div>
			<a href='./?p=add_news'><img src='../images/icons/shape_square_add.png' width='16' /> Новина</a>  <br/>
			<a href='./?p=add_poll'><img src='../images/icons/chart_bar_add.png' width='16' /> Анкета</a> <br/>
			<a href='./?p=add_server'><img src='../images/icons/html_add.png' width='16' /> Сървър</a> <br/>
			<a href='./?p=add_menu_item'><img src='../images/icons/link_add.png' width='16' /> Линк в менюто</a> <br/>
			<a href='./?p=add_banner'><img src='../images/icons/addverisment_edit.png' width='16' /> Банер</a> <br/>
			<a href='./?p=add_user'><img src='../images/icons/group_add.png' width='16' /> Потребител</a>  <br/>
		<br/>

	    <div style='background:#540303;color:#160000;text-shadow:1px 1px #660202;padding:5px 3px;font-family:Arial;'>Списък</div>
			<a href='./?p=list_of&w=news'><img src='../images/icons/shape_square_edit.png' width='16' /> Новините</a>  <br/>
			<a href='./?p=list_of&w=polls'><img src='../images/icons/chart_bar_edit.png' width='16' /> Анкетите</a> <br/>
			<a href='./?p=list_of&w=servers'><img src='../images/icons/html_go.png' width='16' /> Сървърите</a> <br/>
			<a href='./?p=list_of&w=menu_links'><img src='../images/icons/link_edit.png' width='16' /> Линковете в менюто</a> <br/>
			<a href='./?p=list_of&w=banners'><img src='../images/icons/addverisment_edit.png' width='16' /> Банерите</a> <br/>
			<a href='./?p=list_of&w=users'><img src='../images/icons/group_edit.png' width='16' /> Потребителите</a>  <br/>
		 <!----plugin-place-3--->
		<br/>
		
<a href='../?p=index'>&laquo; <span style='font-size:10px;'>Назад към сайта</span></a>  <br/> 

				<div style='border-top:1px dashed #660404;margin-top:20px;padding:15px 5px;'>
				<a href='../logout.php' id='button'>Изход</a>
				</div>
				
		
</div>