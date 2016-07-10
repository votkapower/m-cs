<div id='panel-top'>Форум - докладвани теми </div>
<div id='panel-bottom'>

		<div style='background:#540303;color:#160000;text-shadow:1px 1px #660202;padding:5px 3px;font-family:Arial;'>Тема</div>
<?php
	$qp = mysqli_query($_db,"SELECT * FROM `forum-posts` WHERE `locked`='true' ORDER BY `id` DESC");
	$nm = mysqli_num_rows($qp);
	if($nm == 0){ error('Няма докладвани теми !');}
	$i=0;
	while($r = mysqli_fetch_array($qp))
	{
	  $i++;
	  echo " <br/> $i. <a href='../?p=forum&c=".$r['cat-id']."&read=".$r['id']."' title='Цъкни за да отидеш в темата и да я редактираш ако искаш !'>".$r['topic-title']."</a> <br/> <br/>";
	
	}
?>
	
		
</div>