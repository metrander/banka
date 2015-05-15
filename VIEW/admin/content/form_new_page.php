<div class = "content">
    <a href="/informer">Информеры</a>    <span>Добавление новой страницы в информер</span>
<div class='edit-form'>
<?php
@session_start();
?>
    <form  action="../../informer/add_page" method="post">
        <table>
        	<tr>
            	<td colspan="2" style="color:#FF3333">
                	<?php
                        if(@$_SESSION['addError']){
                                echo $_SESSION['addError']['error'];
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <td>
                    Информер
                </td>
                <td id="h2">
                    <select name="id_informer" size="1">
                         <?php foreach ($this->array_informers as $value):?>
                            <?php if($this->id_informer == $value['id']): ?>
                                    <option value="<?=$value['id'];?>" selected><?=$value['name'];?></option>
                                    <?php else:?>
                                        <option value="<?=$value['id'];?>"><?=$value['name'];?></option>
                            <?php endif; ?>            
                         <?php endforeach;?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Наименование страницы
                </td>
                <td id="h2">
                    <input type="text" id="name_page" name = "name_page" value=""   />
                </td>
            </tr>
                 
            <tr>
                <td>
                    Позиция
                </td>
                <td >
                    <input type="text" name = "ind" value=""  id='form-position'/>
                  
                </td>
            </tr>
            <tr>
                <td><br />

                    Содержание страницы
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea class='full-text' id='editor1' name="txt"><?= @$array['txt_stat'];?></textarea>
                    <script>
                        CKEDITOR.replace("editor1");
                    </script>
                   
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Записать" />
                </td>
                <td>
                </td>
            </tr>
            
        </table>
    </form>
<?php
	unset($_SESSION['addError']);
?>
</div><!-- edit-form -->


</div><!-- content -->
