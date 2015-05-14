    <div class= "left-bar">
        <ul class="nav-catalog" id="accordion">
          <?php
		  foreach($arr_category['master_page'] as $key => $values):?>
          	<h3><li><a href="#"> <?= $values['category'];?> </a></li></h3>
		  		<ul >
		  		<?php
					foreach($values['sub'] as $k => $val):?>
                    	<li id="sublist"><a href="#"><?= $val['name']  ;?></a></li>
                    <?php
					endforeach; ?>
                </ul>    
		  <?php
          endforeach; ?>
        </ul> 
            <h3><a href="http://pizza/manager">Основные страницы</a></h3>
            <h3><a href="http://pizza/informer">Информеры</a></h3>
            <h3><a href="#">Сообщение</a></h3>
            <h3><a href="#">Пользователи</a></h3>
            <h3><a href="#">Администратор</a></h3>
    </div><!--left-bar-->