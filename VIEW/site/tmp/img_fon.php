<div class = "head-menu">
    <ul class = "menu">
       <?php foreach($stati as $value):?>
        <li><a href="../../index/stat/<?=$value['id'];?>"><?=$value['name_category']; ?></a></li>
	   <?php endforeach; ?>
    </ul>
</div> <!--.head-menu-->

<div class = "my-menu">
    <ul class = "mymenu">
        <?php foreach($gmenu as $value):?>
			<?php $id = $value['ind'] == 1? "/" :" ../../index/cat/".$value['id'];?> 	        
           <li><a href="<?=$id;?>"><?=$value['name_category']; ?></a></li>
      	<?php endforeach; ?>
    </ul>
</div><!--.my-menu-->
<div class = "img-fon">
	<div class="but_myrec">
    </div>
</div><!--.img-fon-->