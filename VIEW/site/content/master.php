<div class = "contentwrapper">
    <div class = "content">
       <div class="index-tab-conteiner">
            <h1>Ваш выбор</h1>
<?php
foreach($this->arr as $value){
?>
            <div class="index-tab-object-conteiner">
                <div class="index-tab-object">
					 <h2><a href="../../item/page/<?= $value['id_good']; ?>"><?= $value['name']?></a></h2>
  						<a href="../../item/page/<?= $value['id_good']; ?>"><img src="/PHOTO/<?=$value['photo']; ?>" alt="" height="160px"></a>
                   		 <div class="detail">
                       	<?php $detail = implode(', ',$value['sub']);?>
						<?php if(!empty($detail)):?>	 
                            <h3>Состав</h3>
                        <?php endif;?>
                            <p>
                            <?= $detail;?>
                            </p>
                            <div class="summa">
                             <?=$value['price']; ?> 
                            </div>
                   		 </div><!--.detail-->  
                  	 	<div class="do-zakaz"  id="id<?=$value['id_good']; ?>" atr = "2">
                                    Заказать
                                </div>             
                </div><!--index-tab-object-->
            </div><!--index-tab-object-conteiner--> 
<?php
}
?>
      </div><!--.index-tab-->
    </div><!--.content-->
</div><!--.contentwrapper-->	