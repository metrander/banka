$(document).ready(function() {
	
	$("#del").live("click",function(){
		if(!confirm("Вы действительно хотите удалить?"))
			return false;
	})
//работа аккордиона       
    var openItem = false;
    if($.cookie("openItem") && $.cookie("openItem") != 'false'){
        var openItem = parseInt($.cookie("openItem"));
    }
    $("#accordion").accordion({
        active: openItem,
        collapsible: true,
        header: 'h3',
        autoHeight: false
    });
    $("#accordion h3").click(function(){
        $.cookie("openItem", $("#accordion").accordion("option", "active"));
    });
    $("#accordion > li").click(function(){
        $.cookie("openItem", null);
        var link = $(this).find('a').attr('href');
        window.location = link;
    });
//работа аккордиона   	
//слайдер информеров
    $(".title_inform").click(function(){
       $(this).next().slideToggle(100);
    })
    
});
function addgrad(n){
        var m = n+1;
        $("#id"+n).css("display","none");
        var content = "<li><input type='text' name='name_gradient"+m+"' class='name_grad'><input type='text' name='weight_low"+m+"' size='5' class='weight_grad'><input type='text' name='weight"+m+"' size='5' class='weight_grad'><input type='text' name='weight_heigh"+m+"' size='5' class='weight_grad'><div id='id"+m+"' onclick='addgrad("+m+")'> +</div></li>";
        $("ol").append(content);
    }