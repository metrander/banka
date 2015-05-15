<div class = "content">
    <span>Добавить новое сообщение</span>
    <div class = "new-informer"> 
        <form name="form_message" method="post" action="../../message/add_msg">
            <ul>
                <li>
                    <label> 
                        <span> Наименования сообщения </span>
                        <div>
                            <input type="text" name="message_name" value="" id="field_long">
                        </div>
                    </label>    
                </li>  
                <li>
                    <label> 
                        <span>Позиция</span>
                        <div>
                            <input type="text" name="message_position" value="" id="field_short">
                        </div>
                    </label>    
                </li>
                <li>
                    <input type="submit" value="Записать" class="informer_button">
                </li>
            </ul>    
        </form>
   </div>  <!-- class = "new-informer" -->  
</div>        
