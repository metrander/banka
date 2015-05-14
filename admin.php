<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Управление сайтом</title>
<link href="VIEW/admin/tmp/css/style_admin.css" rel="stylesheet" type="text/css" />

</head>

<body>

<div class = "container">
    <div class = "head">
        <div class = "logon">
        	<span><label>А</label>дминка</span>
        </div><!--logon-->
        <div class = "portph">
        	<span><a href="">Admin</a> | <a href="">Выход</a></span>
        </div><!--portph-->
    </div><!--head-->
   <div class="main">
    <div class= "left-bar">
    	
        <span>Основные страницы</span>
       
        <ul class = 'list' id="accordion">
            <h3><li><a href="#"> Пицца </a></li></h3>
				<ul class='sublist'>
                	<li>-<a href="#">МАРГАРИТА</a></li>
                    <li>-<a href="#">ПЕППЕРОНИ С ТОМАТАМИ</a></li>
                    <li>-<a href="#">ПИЦЦА БАРБЕКЮ</a></li>
                    <li>-<a href="#">ПИЦЦА ГАВАЙСКАЯ</a></li>
                </ul>
            
            <h3><li><a href="#"> Салаты </a></li></h3>
            	<ul class='sublist'>
                	<li>-<a href="#">Салат с курицей</a></li>
                    <li>-<a href="#">Салат с моцареллой</a></li>
                    <li>-<a href="#">Салат с тунцом</a></li>
                    <li>-<a href="#">Салат со шпинатом</a></li>
	           	</ul>	
           
            <h3><li><a href="#"> Дисерты </a></li></h3>
            <h3><li><a href="#"> Напитки </a></li></h3>
        </ul>
   			<h3><a href="#">Информеры</a></h3>
            <h3><a href="#">Сообщение</a></h3>
            <h3><a href="#">Пользователи</a></h3>
            <h3><a href="#">Администратор</a></h3>
    </div><!--left-bar-->
   
    <div class = "content">
    	<span>Добавление/удаление страниц</span>
        
        	<p>
            +<a href="#">Новая страница</a>
            </p>
            <table id="table-pages" >
        	<tr>
            	<th>
                	Наименование страницы
                </th>
               	<th>
                	Номер позиции
                </th>
               	<th>
                	Действие
                </th>
            </tr>
     
        	<tr>
            	<td>
                	О нас
                </td>
               	<td id="table-pos">
                	1
                </td>
               	<td id="table-pos">
                	<a href="#">Изменить</a>/<a href="#">Удалить</a>
                </td>
            </tr>
            <tr>
            	<td>
                	Оплата
                </td>
               	<td id="table-pos">
                	2
                </td>
               	<td id="table-pos">
                	<a href="#">Изменить</a>/<a href="#">Удалить</a>
                </td>
            </tr>
            <tr>
            	<td >
                	Скидки и бонусы
                </td>
               	<td id="table-pos">
                	3
                </td>
               	<td id="table-pos">
                	<a href="#">Изменить</a>/<a href="#">Удалить</a>
                </td>
            </tr>
        </table>
    </div><!--content-->
   </div><!--main--> 
   <div class="clr"></div>
    <div class="footer">
        (c)2015
    </div><!--footer-->
</div><!--"container"-->    

</body>
</html>