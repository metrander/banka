 <div class="head-cart">
         <span>Корзина</span>
 		<p>Ваш заказ на сумму:</p>
		<?php if(@$_SESSION['total_quantity']): ?>
            <p><span id="mycart"><?= $_SESSION['summa']." грн. на ".$_SESSION['total_quantity']." шт.";?></span></p>
        <?php else:?>	
             <p><span id="mycart">0 грн.</span></p>
        <?php endif; ?>  
   </div><!--.head-cart-->
</div><!--.head -->
<div class="clr"></div>