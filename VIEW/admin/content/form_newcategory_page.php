<div class = "content">
    <a href="/category">Категории</a>    <span>Добавление новой страницы в категории</span>
<div class='edit-form'>
<?php
@session_start();
?>
        
    
    <form  action="../../../category/add_page" method="post" enctype="multipart/form-data">
        <table >
        	<tr>
            	<td colspan="2" style="color:#FF3333">
                	<?php
                        if(@$_SESSION['error_file']){
                                echo $_SESSION['error_file'];
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td>
                    Категория
                </td>
                <td id="h2">
                    <select name="id_category" size="1">
                         <?php foreach ($arr_category['master_page'] as $key => $value):?>
                            <?php if($this->id_category == $key): ?>
                                    <option value="<?=$key;?>" selected><?=$value['category'];?></option>
                                    <?php else:?>
                                        <option value="<?=$key;?>"><?=$value['category'];?></option>
                            <?php endif; ?>            
                         <?php endforeach;?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Наименование товара
                </td>
                <td >
                    <input type="text" name = "name_goods" value=""  />
                  
                </td>
            </tr>
            <tr>
                <td>
                    <img src="/PHOTO/photo.png" border="0" id="pfoto_good">
                </td>
                <td>
                    <input type="file" name="myfile">
                </td>
            </tr>
            <tr>
                <td >
                    Состав
                </td>
                <td>
                    <table >
                        <tr >
                            <td align="center">
                                Наименование
                            </td>
                            <td align="center">
                                <label>вес(г.)<br><strong>маленькая</strong><br>порция</label>
                            </td>
                            <td align="center">
                                <label>вес(г.)<br><strong>средняя</strong><br>порция</label>
                            </td>
                            <td align="center">
                                <label> вес(г.)<br><strong>большая</strong><br>порция</label>
                            </td>
                        </tr> 
                    </table>    
                    <ol>
                        <li> <input type="text" name="name_gradient1" class="name_grad" placeholder="Инградиент"  ><input type="text" name="weight_low1" size="5" class="weight_grad" ><input type="text" name="weight1" size="5" class="weight_grad" ><input type="text" name="weight_heigh1" size="5" class="weight_grad"> <div id="id1" onclick="addgrad(1)"> +</div></li>
                    </ol>
                    <input type="text" name="summa" value="Сумма" class="name_grad" readonly >
                    
                    <input type="text" name="price_low" size="5" class="price_grad" value="0">
                    <input type="text" name="price_low_real" size="2" class="price_real" value="00" title="копеек">
                    
                    <input type="text" name="price" size="5" class="price_grad" value="0">
                    <input type="text" name="price_real" size="2" class="price_real" value="00" title="копеек">
                    
                    <input type="text" name="price_heigh" size="5" class="price_grad" value="0">
                    <input type="text" name="price_heigh_real" size="2" class="price_real" value="00" title="копеек">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="left">
                    Описание
                </td>
            </tr>
             <tr>
                <td colspan="2">
                    <textarea class='full-text' id='editor1' name="txt"></textarea>
                    <script>
                        CKEDITOR.replace("editor1");
                    </script>
                   
                </td>
            </tr>
            <tr>    
                <td>
                    <input type="submit" value="Записать"  />
                </td>
                <td>
                </td>
            </tr>
            
        </table>
    </form>
<?php
	unset($_SESSION['error_file']);
?>
</div><!-- edit-form -->


</div><!-- content -->
