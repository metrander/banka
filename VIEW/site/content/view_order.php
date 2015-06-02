<div class = "contentwrapper">
    <div class = "content">
       <div class="index-tab-conteiner">
			<div id = "goods_order">
<h1>Оформления заказа</h1>


<?php
@session_start();

?>
<pre>
	<?php
	//print_r($_SESSION['goods']);
	?>
</pre>
<div id = "order-goods">
	<table width="100%" align="center" cellpadding="0" cellspacing="0">
<?php foreach($_SESSION['goods'] as $k =>  $value): ?>
    	<tr>
        	<td align="center">
             <img src="/PHOTO/<?=$value['photo']; ?>" alt="" height="100px">	
            </td>
            <td>
            <h2><a href="/item/page/<?= $value['id']; ?>"><?= $value['name']; ?></a></h2> 
            </td>
            <td>
            	<?php foreach($value['sort']  as $key => $item): ?>
                	<div><?=$item['type'];?></div>
					<input type="text" value="<?= $item['cnt'];?>" title="количество" id = "id<?=$k;?>" atr = "id<?= $key;?>" class = "kol"><span> <?=$item['price'];?> </span> <font color="#006633"> грн. </font>
				<?php endforeach;?>
            </td>
            <td>
            	<div class='del' id = "id<?=$k;?>" title="Удалить выбранный заказ" >
                </div>
            </td>
        </tr>
<?php endforeach; ?>
		<tr>
        	<td colspan="4" align="center">
            	<p>Сумма заказа: <span><?=@$_SESSION['summa'];?></span> грн.(<?=@$_SESSION['total_quantity'];?> шт.)</p>
                
            </td>
        </tr>
 </table> 
 </div><!-- order-goods  --> 
  <br />
<form name = "form-order" id = "form-order" method="post" action="../item/sorder" enctype="multipart/form-data">
 <div id = "main-zakaz">     
 <table  width="100%" align="center" cellpadding="0" cellspacing="0">
  
     <?php 
if(@!$_SESSION['user']):
	?>
 	<tr>
    	<td colspan="2" align="center">
        	<h3>Информация для заказа</h3>
        </td>
    </tr>
    <tr>
    	<td align="center">
        <?php
			 if(isset($_SESSION['regError']['error'])){
			 	echo $_SESSION['regError']['error'];
			 }
		?>	 
        </td>
    </tr>
 	<tr>
    	<td align="center">
                <div><span>Ваше имя</span></div>
        </td> 
        <td>
        		 <input type="text" value="<?= @$_SESSION['regError']['name'] ?>" name="name" id='info' >
        </td>
	</tr>
    <tr>
    	<td align="center">               
                <div><span>Email</span></div>
        </td>
        <td>        
                 <input type="text" value="<?=  @$_SESSION['regError']['email'] ?>" name="email" id='info'>
		</td>
    </tr>
    <tr>
    	<td align="center">                     
	           <div><span>Телефон</span></div>
        </td>
        <td>   
                <input type="text" value="<?=  @$_SESSION['regError']['phone']?>" name="phone" id='info'>
        </td>
    </tr>
  
    <?php endif; ?> 
 </table>    
     </div><!-- main-zakaz -->  
   
    <div class = 'but-zakaz'>
              
    <input type="submit" value="Сделать" id = "but-zakaz">         
 	</div>
</form>     
         
  
    
			</div><!--goods_order-->
		</div><!--index-tab-conteiner-->
	</div><!--content-->
</div><!--contentwrapper-->

<?php
 if(isset($_SESSION['regError']['error'])){
	 unset($_SESSION['regError']);
 }
 ?>