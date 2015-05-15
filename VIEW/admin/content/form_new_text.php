<div class = "content">
     <a href="/manager">Основные страницы</a>    <span>Новая страница</span>
<div class='edit-form'>
<?php
@session_start();
?>
    <form  action="../../page/add_page" method="post">
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
                    Наименование страниицы
                </td>
                <td id="h2">
                    <input type="text" id="name_category" name = "name_category" value=""   />
                </td>
            </tr>
                 
            <tr>
                <td>
                    Позиция
                </td>
                <td >
                    <input type="text" name = "ind" value="<?=@$_SESSION['addError']['position']; ?>"  id='form-position'/>
                  
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