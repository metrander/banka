<div class = "contentwrapper">
    <div class = "content">
        <div class="index-tab-conteiner">
            <h1>Регистрация</h1>
             <div id="conteiner_reg">
            
             <?php
			 
			@session_start();
			 
			
			 if(isset($_SESSION['regError']['error'])){
			 	echo $_SESSION['regError']['error'];
			 }
			
			 ?>
             <form name="regForm" action="reg/insertReg" method="post">
                <p><span>Ваше имя</span> <input type="text" value="<?= @$_SESSION['regError']['name'] ?>" name="name"></p>
                <p><span>Email</span> <input type="text" value="<?=  @$_SESSION['regError']['email'] ?>" name="email"></p>
                <p><span>Телефон</span> <input type="text" value="<?=  @$_SESSION['regError']['phone']?>" name="phone"></p>
                <p><span>Пароль</span> <input type="password" value="" name="pass1"></p>
                <p><span>Повторите пароль</span> <input type="password" value="" name="pass2"></p>
                <input type="submit" value="Зарегистрироваться" class = "but">
             </form>  
             </div><!--reg--> 
        </div><!--.index-tab-conteiner-->
    </div><!--.content-->
</div> <!--.contentwrapper-->           
<?php
 if(isset($_SESSION['regError']['error'])){
	 unset($_SESSION['regError']);
 }
?>