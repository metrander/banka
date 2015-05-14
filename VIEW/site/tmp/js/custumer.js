$(document).ready(function() {
		//авторизация пользователя
		$("#formReg").submit(function(){
			var data = $(this).serialize();
			var url = $(this).attr("action");
			$.post(url,data,function(rez){
			
			if(rez == 1){	
				$("#error_table").remove();
				$("#formlog").append("<div id='error_table'></div>");
				$("#error_table").hide().fadeIn(500).html("Неверный логин или пароль");
				
			}
			else{
				$("#formlog").hide().fadeIn(500).html("<div id = 'success-log'>"+rez+"<br /><a href='../../reg/logout'>Выход</a></div>");
				$("#main-zakaz").fadeOut(500);
				
				
			}
			
			
			});
			return false;
		});

    	$("#form-order").submit(function(){
			var data = $(this).serialize();
			var url = $(this).attr("action");
			$.post(url,data,function(rez){
				if(rez == 1){
					window.location = "/item/order";
				}
				else{
					$("#order-goods").fadeOut(500);
					$("#main-zakaz").hide().fadeIn(500).html(rez);
					
					$(".but-zakaz").hide();
				}
			})
			return false;
		})
});