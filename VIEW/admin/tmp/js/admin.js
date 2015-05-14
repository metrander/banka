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
       $(this).next().slideToggle(500);
    })
});