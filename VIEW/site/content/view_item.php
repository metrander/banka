<div class = "contentwrapper">
    <div class = "content">
		<div id="tabs">
    	
            <input type="radio" name="tab" id="tab1">
            <label for="tab1" id="ltab1"> Большая </label> 
           
            <input type="radio" name="tab" id="tab2" checked="checked">
            <label for="tab2" id="ltab1"> Средняя </label> 
                
            <input type="radio" name="tab" id="tab3">
            <label for="tab3" id="ltab1"> Маленькая </label> 
      		
            <div class="div_text">
    
                <div>
              	<?php foreach($this->array_good as $value): ?>
              		<div class = "pizza">
                    	<h3> <?=$value['name']; ?> </h3>
                        <img src="/PHOTO/<?= $value['photo']; ?>" border='0' width = '400px' >
                        <div>
                        	Большая
                        </div>
                    </div>
					<div class="ingrad">
                    	<?php if(count($value['sub']>1)):?>
                       
                        <span>Состав:</span>
                        <ul>
						<?php $s = 0; for($i = 0; $i < count($value['sub']); $i++): ?>
                        <li><?=$value['sub'][$i]?> <?php if($value['weight_high'][$i]) {echo"  <span>".$value['weight_high'][$i]."гр.</span>";}   ?></li>
                          <?php $s +=  $value['weight_high'][$i];?>
                        <?php endfor;  ?>
                    	<?php endif;?>
                        </ul>
                        <p>
                        	<?= $value['price_high']; ?>
                             <span>грн.</span>
                             <?php if(@$s>0):?>
                             <span><?="(".$s." г)"; ?></span>
                             <?php endif;?>	
                        </p>
                       
                        <div class="do-zakaz" id="id<?=$value['id_good_high']; ?>" atr = "1" >
                       	 	Заказать
                    	 </div>  
                        <div id="enter"></div>
                    </div>                    
               <?php endforeach; ?>
                </div>
                
                <div>
              	<?php foreach($this->array_good as $value): ?>
              		<div class = "pizza">
                    	<h3> <?=$value['name']; ?> </h3>
                        <img src="/PHOTO/<?= $value['photo']; ?>" border='0' width = '300px' >
                        <div>
                        	Средняя
                        </div>
                    </div>
					<div class="ingrad">
                    	<?php if(count($value['sub']>1)):?>
                        <span>Состав:</span>
                        <ul>
						<?php $s = 0; for($i = 0; $i < count($value['sub']); $i++): ?>
                        <li><?=$value['sub'][$i]?> <?php if($value['weight_high'][$i]) {echo"  <span>".$value['weight'][$i]."гр.</span>";}   ?></li>
                        <?php $s +=  $value['weight'][$i];?>
                        <?php endfor;  ?>
                    	<?php endif;?>	
                        </ul>
                        <p>
                        	<?= $value['price']; ?>
                            <span>грн.</span>
							 <?php if(@$s>0):?>
                             <span><?="(".$s." г)"; ?></span>	
                             <?php endif;?>	
                        </p>
                          <div class="do-zakaz" id="id<?=$value['id_good_high']; ?>" atr = "2" >
                       	 	Заказать
                    	 </div>
                        
                        <div id="enter"></div>
                    </div>                    
               <?php endforeach; ?>
                </div>
               
                
                 <div>
               	<?php foreach($this->array_good as $value): ?>
              		<div class = "pizza">
                    	<h3> <?=$value['name']; ?> </h3>
                        <img src="/PHOTO/<?= $value['photo']; ?>" border='0' width = '200px' >
                        <div>
                        	Маленькая
                        </div>
                    </div>
					<div class="ingrad">
                    	<?php if(count($value['sub']>1)):?>
                        <span>Состав:</span>
                        <ul>
						<?php $s = 0; for($i = 0; $i < count($value['sub']); $i++): ?>
                        <li><?=$value['sub'][$i]?> <?php if($value['weight_high'][$i]) {echo"  <span>".$value['weight_low'][$i]."гр.</span>";}   ?></li>
                          <?php $s +=  $value['weight_low'][$i];?>
                        <?php endfor;  ?>
                        <?php endif;?>	
                        </ul>
                        <p>
                        	<?= $value['price_low']; ?>
                             <span>грн.</span>
                             <?php if(@$s>0):?>
                             <span><?="(".$s." г)"; ?></span>
                             <?php endif;?>		
                        </p>
                          <div class="do-zakaz" id="id<?=$value['id_good_high']; ?>" atr = "3" >
                       	 	Заказать
                    	 </div>  
                        <div id="enter"></div>
                    </div>                    
               <?php endforeach; ?>
                </div>
                
            </div><!--div_text-->

   	 	</div><!--tabs-->
	</div> <!-- content-->  
</div><!-- contentwrapper --> 
