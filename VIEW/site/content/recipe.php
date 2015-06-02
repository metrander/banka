<div class = "contentwrapper">
    <div class = "content">
       <div class="index-tab-conteiner">

<div class = "my-order">
<h2>Мой рецепт</h2>


	<div class="my-zakaz">
  	 	Заказать
    </div>  
  <label> на сумму:</label> <span id='total'></span> 




<div class = "work-space">

</div>

<?php
unset($_SESSION['rec']);
?>
</pre>
<?php foreach($this->arr['cat'] as $key => $value): ?>
    <div class="ingred">
    	<div class = "ingred-thema">
    	<?= $value['name']?>
    	</div>	
        <?php foreach($value['item'] as $k => $val):?>
        			 <div class = "ingred-item" id = "id<?= $k;?>" >
                    	<img src="/IMG/<?=$val['icon']; ?>" alt="">
                        <p><?=$val['name']; ?></p>
                        <span><?=$val['price']; ?> грн.</span>
                     </div>
		<?php endforeach;?>
    
    </div>
<?php endforeach;?>
</div><!--my-order-->
</div><!--.index-tab-->
    </div><!--.content-->
		</div><!--.contentwrapper-->	