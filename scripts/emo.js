/*
  Emoticons .. 
*/

$(function () {

 var i = 0; $("body").click(function () { if(i >= 1) { $("#emoticons-list").fadeOut(300); i=0;  }else{ i++; } });
  
  
  $("#emoticons-shower-mini").click(function (){
  
	  $("#textarea-current-selected").remove();
	  $("#emoticons-list").appendTo("#emoes-linkster-mini").slideToggle(100);
	  $("<input type='hidden' value='#chat-msg-insert-mini' id='textarea-current-selected' />").appendTo('body');
	  
  });


  $("#emoticons-shower-big").click(function (){
      $("#textarea-current-selected").remove();
      $("#emoticons-list").appendTo("#emoes-linkster-big").slideToggle(100);
	  $("<input type='hidden' value='#chat-msg-insert-big' id='textarea-current-selected' />").appendTo('body');
	  //console.log($("#emoticons-list").parent()[0]);
	  
  });
  
  
});


function addEmo(code)
{
 var currentTXT = $("#textarea-current-selected").val();

  
 if(currentTXT == "#chat-msg-insert-big")
 {
   var textarea = $("#chat-msg-insert-big").val();
   $("#chat-msg-insert-big").val(textarea + " "+code+" ");
   textarea.focus();
  } else if(currentTXT == "#chat-msg-insert-mini") {
	   var textarea = $("#chat-msg-insert-mini").val();
	   $("#chat-msg-insert-mini").val(textarea + " "+code+" ");
	   textarea.focus();
	  }
}