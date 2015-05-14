<div class = "content">
    <span>Изменить информер</span>
    <div class = "new-informer"> 
        <form name="form_informer" method="post" action="../../informer/upd_inf">
            <ul>
                <li>
                    <label> 
                        <span> Информер </span>
                        <div>
                            <input type="text" name="informer_name" value="<?=@$_SESSION['informer']['name'];?>" id="field_long">
                        </div>
                    </label>    
                </li>  
                <li>
                    <label> 
                        <span>Позиция</span>
                        <div>
                            <input type="text" name="informer_position" value="<?=@$_SESSION['informer']['ind'];?>" id="field_short">
                        </div>
                        <input type="hidden" name="id_informer" value="<?=$this->id_informer;?>">
                    </label>    
                </li>
                <li>
                    <input type="submit" value="Записать" class="informer_button">
                </li>
            </ul>    
        </form>
   </div>  <!-- class = "new-informer" -->  
</div>        