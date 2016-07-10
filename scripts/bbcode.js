function bbcode(tag1,tag2,obj) // code by voTkaPoweR
		{
		textarea = document.getElementById(obj);
			// Code for IE
				if (document.selection) 
					{
						textarea.focus();
						var sel = document.selection.createRange();
						//alert(sel.text);
						sel.text = tag1 + sel.text + tag2;
					}
		   else 
			{  // Code for Mozilla Firefox
				var len = textarea.value.length;
				var start = textarea.selectionStart;
				var end = textarea.selectionEnd;
				
				
				var scrollTop = textarea.scrollTop;
				var scrollLeft = textarea.scrollLeft;

				
				var sel = textarea.value.substring(start, end);
				//alert(sel);
				var rep = tag1 + sel + tag2;
				textarea.value =  textarea.value.substring(0,start) + rep + textarea.value.substring(end,len);
				
				textarea.scrollTop = scrollTop;
				textarea.scrollLeft = scrollLeft;
				
				
			}
		}
		
		
			
			function doURL(obj)
			{
			textarea = document.getElementById(obj);
			var url = prompt('Напиши адреса:','http://');
			var scrollTop = textarea.scrollTop;
			var scrollLeft = textarea.scrollLeft;

			if (url != '' && url != null) {

				if (document.selection) 
						{
							textarea.focus();
							var sel = document.selection.createRange();
							
						if(sel.text==""){
								sel.text = '[url]'  + url + '[/url]';
								} else {
								sel.text = '[url=' + url + ']' + sel.text + '[/url]';
								}			

							//alert(sel.text);
							
						}
			   else 
				{
					var len = textarea.value.length;
					var start = textarea.selectionStart;
					var end = textarea.selectionEnd;
					
					var sel = textarea.value.substring(start, end);
					
					if(sel==""){
							var rep = '[url]' + url + '[/url]';
							} else
							{
							var rep = '[url=' + url + ']' + sel + '[/url]';
							}
					//alert(sel);
					
					textarea.value =  textarea.value.substring(0,start) + rep + textarea.value.substring(end,len);
					
						
					textarea.scrollTop = scrollTop;
					textarea.scrollLeft = scrollLeft;
				}
			 }
			}	



			
			function doIMG(obj)
			{
			textarea = document.getElementById(obj);
			var url = prompt('Напиши адреса до снимката:','http://');
			var scrollTop = textarea.scrollTop;
			var scrollLeft = textarea.scrollLeft;

			if (url != '' && url != null) {

				if (document.selection) 
						{
							textarea.focus();
							var sel = document.selection.createRange();
							
						if(sel.text==""){
								sel.text = '[img]'  + url + '[/img]';
								} else {
								sel.text = '[img]' + sel.text + '[/img]';
								}			

							//alert(sel.text);
							
						}
			   else 
				{
					var len = textarea.value.length;
					var start = textarea.selectionStart;
					var end = textarea.selectionEnd;
					
					var sel = textarea.value.substring(start, end);
					
					if(sel==""){
							var rep = '[img]' + url + '[/img]';
							} else
							{
							var rep = '[img]' + sel + '[/img]';
							}
					//alert(sel);
					
					textarea.value =  textarea.value.substring(0,start) + rep + textarea.value.substring(end,len);
					
						
					textarea.scrollTop = scrollTop;
					textarea.scrollLeft = scrollLeft;
				}
			 }
			}
				
		//function doIMG(obj)
