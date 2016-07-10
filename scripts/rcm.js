$(function() {
 if( $("#footer").html() != "<div style=\"color:#666;text-align:center;font-size:10px;\">Код и дизайн: <b>Димитър Папазов</b> [ voTkaPoweR ]</div>"){$("#footer").append("<div style='color:#666;text-align:center;font-size:10px;'>Код и дизайн: <b>Димитър Папазов</b> [ voTkaPoweR ]</div>");}
 
var i =0; $("*").click(function ()	 {  if(i >= 1) { $("#rclick-menu").remove(); i=0;  }else{ i++; }	 });
  
  $("*").bind("contextmenu", function (e){
		if($(this).attr("href"))
		{ 
		  var location = $(this).attr("href");
		 $("#rclick-menu").remove();
		$("<div id='rclick-menu'>Възможни опции <p id='hr'></p> <a href='"+location+"'><div>Отвори в този прозорец</div></a> <a href='"+location+"' target='_blank'><div>Отвори в нов подпрозорец</div></a></div>").appendTo("body").css("left", e.pageX).css("top", e.pageY).fadeIn(500);
		}
		else
			{
				$(this).click();
			}
		return false;
  });
  
});