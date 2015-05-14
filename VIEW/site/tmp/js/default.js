$(function(){
	
	$.ajax({
	  dataType: 'json',
	  url: 'servis/getInsert',
	  success: function(data){
	    
			for(var i = 0; i < data.length; i++){
			$("#insertList").append("<div>"+data[i].name+"  <a href='#' class = 'del' rel='"+data[i].id+"'>x</a></div>");
			}
		
					
				$(".del").live('click',function(){
					var itemDel = $(this);
					var idDel = $(this).attr("rel");
					$.post("servis/delInsert",{'id':idDel},function(o){
						itemDel.parent().remove();
					})
				})	
	
	  }


	});
	
	
	$("#myform").submit(function(){
		
		var data = $(this).serialize();
		var url = $(this).attr("action");
	
		$.post(url,data,function(data){
			$("#insertList").append("<div>"+data.name+"  <a href='#' class = 'del' rel='"+data.id+"'>x</a></div>");
		},'json');
		return false;
	});
	
	
	
});	
	
