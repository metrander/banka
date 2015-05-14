<div class = "left-bar">
   <div class = "informer-bar">
          
            <h2>Авторизация</h2>
		  <?php
          if(!isset($_SESSION['user']['name'])):
          ?>
         <div id = "formlog">
          <form id="formReg" action="../../reg/enter" method="post">
          <p><label>Логин(e-mail) </label> <input type="text"  maxlength="25" name="login" value=""  /></p> 
          <p><label>Пароль </label> <input type="password" maxlength="25" name="pass" value="" /></p> 
          <div><a href="../../reg" target="_parent">регистрация</a><input type="submit" value="вход" id = "reg"/></div>
          </form>
      	 </div>
      		<?php
			else:
			echo"
			<div id='success-log'>
			Здравствуйте ".$_SESSION['user']['name']."<br/>
				<a href='../../../../reg/logout'>Выход</a>
			</div>";
			endif;
			?>	
           
    </div><!--.informer-bar-->
    
   <?php if(isset($informers['inf_menu'])):?>
    <div class = "informer-bar">
    <?php foreach($informers['inf_menu'] as $value): ?>
            <h2><?= $value['name'];?></h2>
            <?php foreach($value['sub'] as $k => $val){?>
            <h3><a href="<?=$k; ?>"><?=$val['name']; ?></a></h3>
			<?php }?>           
    <?php endforeach; ?>
    </div><!--.informer-bar-->
    <?php endif; ?>
	<?php if(isset($informers_reclama['inf_reclama'])):?>
    <div class = "informer-time">
        <?php foreach($informers_reclama['inf_reclama'] as $value): ?>
            <h2><?= $value['name'];?></h2>
            <?php foreach($value['sub'] as $k => $val){?>
            <p><?=$val['text']; ?></p3>
			<?php }?>           
    	<?php endforeach; ?>
    </div><!--.informer-time-->	
    <?php endif; ?>
    <div class = "zakaz"> 
        <div>Заказать столик</div>
    </div><!--.zakaz-->	
    <div class = "our-menu"> 
        <div>Наше меню</div>
    </div><!--.zakaz-->	
  
</div><!--.left-bar-->