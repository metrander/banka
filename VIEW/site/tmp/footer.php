<div class = "clr"></div>
<div class = "footer">
			<div class = "logo">
				<h2><a href="/"> <?=$contact[0]['text_contact'];?> </a></h2>
				<p>Copyright (c) 2015</p>
			</div><!--.logo-->
			<div class = "fphone">
				<h2>телефон:</h2>
				<h1><?=$contact[2]['text_contact'];?></h1>
				 <?php foreach($informers_reclama['inf_reclama'] as $value): ?>
                <h2><?= $value['name'];?></h2>
                <?php foreach($value['sub'] as $k => $val){?>
                <p><?=$val['text']; ?></p3>
                <?php }?>           
    	<?php endforeach; ?>
			</div><!--.fphone--> 
			<div class="fmenu">
				<p>Меню</p>
				<ul>
                
                 <?php foreach($stati as $val):?>
                <li><a href="../../index/stat/<?=$val['id'];?>"><?=$val['name_category']; ?></a></li>
               <?php endforeach; ?>
              					
				</ul>
				<ul>
					 <?php foreach($gmenu as $value):?>
					 <?php $id = $value['ind'] == 1? "/" :" ../../index/cat/".$value['id'];?> 	        
                  	 <li><a href="<?=$id;?>"><?=$value['name_category']; ?></a></li>
               		 <?php endforeach; ?>
				</ul>
			</div><!--.fmenu-->
		</div><!--.footer-->
	</div><!--.conteiner-->		
	</body>
</html>