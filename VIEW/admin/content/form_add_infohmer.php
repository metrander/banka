<div class = "content">
    <span>Добавить новый информер</span>
    <div class = "new-informer"> 
        <form name="form_informer" method="post" action="../../informer/add_inf">
            <ul>
                <li>
                    <label> 
                        <span> Информер </span>
                        <div>
                            <input type="text" name="informer_name" value="" id="field_long">
                        </div>
                    </label>    
                </li>  
                <li>
                    <label> 
                        <span>Позиция</span>
                        <div>
                            <input type="text" name="informer_position" value="" id="field_short">
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
