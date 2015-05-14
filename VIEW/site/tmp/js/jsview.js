$(document).ready(function() {
    

	$('.do-zakaz').click(function(){
		var s = $(this);
		var id = $(this).attr('id');
		id = id.substr(2);
		var atr = $(this).attr('atr');
		var data = {'id':id, 'atr':atr};
		
		$.post("../../item/cart",data,function(o){
			$("#mycart").text(o);
			s.text("в корзине").css("background","#393");
			s.unbind('click');
			s.bind('click', func);
		})
	})

	
	function func(){
		window.location="/item/order";
	}
	$('.head-cart').click(function(){
		func();
	
	})
	$('.but_myrec').click(function(){
		window.location="../../setrec";
	})
	$(".kol").keypress(function(e){
		 if ( e.which == 13 ) {
			e.preventDefault();
		}
	})

	$(".kol").each(function() {
		var start_kol = $(this).val();
	
		$(this).change(function(){
			var qty = $(this).val()
			if(!parseInt(qty)){
				$(this).val(start_kol);
				return;
			}
			$rez = confirm("Сделать перерасчёт?");
			if($rez){
				var id = $(this).attr("id");
				id = id.substr(2);
				var atr = $(this).attr("atr");
				atr = atr.substr(2);
				//alert("id:"+id+" atr:"+atr+" qty:"+qty);
				//return;
					$.post("../../item/cart",{'id':id, 'atr':atr, 'qty':qty},function(o){
						$("#mycart").text(o);
						window.location = "/item/order";
					})
				
			}
			else{
				$(this).val(start_kol);
			}
		})
        
    });
	
	$(".del").click(function(){
		if(!confirm("Удалить выбранный заказ?"))
			return;
		var id = $(this).attr("id");
		id = id.substr(2);
		$.post("../../item/del",{'id':id},function(o){
						
						window.location = "/item/order";
					})
	})
	
	$(".ingred-item").click(function(){
	var image = $(this).find("img").attr("src");
	var id = $(this).attr("id");
	id = id.substr(2);
	$.post("../../setrec/price",{'id':id},function(o){
		$("#total").text(o+" грн.");
		$(".my-zakaz").fadeIn(500);
	})
	$(".work-space").append("<div class = 'add-gred' id='id"+id+"'><img src='"+image+"' alt=''></div>");
	})
	
	$(".add-gred").live('click',function(){
		var id = $(this).attr("id");
		id = id.substr(2);
		$.post("../../setrec/delprice",{'id':id},function(o){
			$("#total").text(o+" грн.");
			if(o == 0)
				$(".my-zakaz").fadeOut(500);
		})
		
		$(this).remove();
	})
	
	$(".my-zakaz").click(function(){
		$.ajax({
			url:"../../setrec/myorder",
			success: function(data){
				
				$("#mycart").text(data);
				$(".add-gred").remove();
				$("#total").text("0 грн.");
				$(".my-zakaz").fadeOut(500);
			}
		})
		 
	})
})