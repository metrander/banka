<div class = "content">
 	<span>Основные страницы</span>
      	<p>
           +<a href="page/add/">Новая страница</a>
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
     <?php foreach($arr_category['stat'] as $key => $values):?>
	     <tr>
           	<td>
              <a href="page/edit/<?= $key ;?>"> <?= $values['name']; ?></a>
            </td>
          	<td id="table-pos">
               <?= $values['position']; ?>
            </td>
            <td id="table-pos">
           		<a href="page/edit/<?= $key ;?>">Изменить</a>/<a href="page/del/<?= $key ;?>" id = "del">Удалить</a>
            </td>
	  	</tr>
	 <?php endforeach; ?>
     </table>
</div><!--content-->
    
    
    
    