<div class = "content">
<div class='edit-form'>
<?php
@session_start();
$array = $this->array_stat[0];
?>
    <form  action="../../page/edit_page" method="post">
        <table>
        	<tr>
            	<td colspan="2" style="color:#FF3333">
                	<?php
					if(@$_SESSION['Error']){
						echo $_SESSION['Error'];
					}
					?>
                </td>
            </tr>
            <tr>
                <td>
                    Наименование страниицы
                </td>
                <td id="h2">
                    <input type="text" id="name_category" name = "name_category" value="<?= $array['name_category'];?>"   />
                </td>
            </tr>
                 
            <tr>
                <td>
                    Позиция
                </td>
                <td >
                    <input type="text" name = "ind" value="<?= $array['ind'];?>"  id='form-position'/>
                  
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
                    <textarea class='full-text' id='editor1' name="txt"><?= $array['txt_stat'];?></textarea>
                    <script>
                        CKEDITOR.replace("editor1");
                    </script>
                    <input type="hidden" name = "id_page" value="<?= $array['id'];?>" />
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
	unset($_SESSION['Error']);
?>
</div><!-- edit-form -->


</div><!-- content -->