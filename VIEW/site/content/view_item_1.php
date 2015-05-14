<div class = "contentwrapper">
    <div class = "content">
    <br><br>
               <div>
              	<?php foreach($this->array_good as $value): ?>
              		<div class = "pizza">
                    	<h3> <?=$value['name']; ?> </h3>
                        <img src="/PHOTO/<?= $value['photo']; ?>" border='0' width = '400px' >
                       
                    </div>
					<div class="ingrad">
                    	<?php if(count($value['sub'])>1):?>
                        <span>Состав:</span>
                        <ul>
						<?php $s = 0; for($i = 0; $i < count($value['sub']); $i++): ?>
                        <li><?=$value['sub'][$i]?> <?php if($value['weight'][$i]) {echo"  <span>".$value['weight'][$i]."гр.</span>";}   ?></li>
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
           
	</div> <!-- content-->  
</div><!-- contentwrapper --> 
