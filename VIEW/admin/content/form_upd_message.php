<div class = "content">
    <span>Изменить сообщение</span>
    <div class = "new-informer"> 
        <form name="form_message" method="post" action="../../message/upd_msg">
            <ul>
                <li>
                    <label> 
                        <span> Наименование сообщения </span>
                        <div>
                            <input type="text" name="message_name" value="<?=@$_SESSION['message']['name'];?>" id="field_long">
                        </div>
                    </label>    
                </li>  
                <li>
                    <label> 
                        <span>Позиция</span>
                        <div>
                            <input type="text" name="message_position" value="<?=@$_SESSION['message']['ind'];?>" id="field_short">
                        </div>
                        <input type="hidden" name="id_infrecl" value="<?=$this->id_infrecl;?>">
                    </label>    
                </li>
                <li>
                    <input type="submit" value="Записать" class="informer_button">
                </li>
            </ul>    
        </form>
   </div>  <!-- class = "new-informer" -->  
</div>        