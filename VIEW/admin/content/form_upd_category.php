<div class = "content">
    <span>Изменить категорию</span>
    <div class = "new-informer"> 
        <form name="form_category" method="post" action="../../category/upd_cat">
            <ul>
                <li>
                    <label> 
                        <span> Категоря </span>
                        <div>
                            <input type="text" name="category_name" value="<?=@$arr_category['master_page'][$this->id_category]['category'];?>" id="field_long">
                        </div>
                    </label>    
                </li>  
                <li>
                    <label> 
                        <span>Позиция</span>
                        <div>
                            <input type="text" name="category_position" value="<?=@$arr_category['master_page'][$this->id_category]['ind'];?>" id="field_short">
                        </div>
                        <input type="hidden" name="id_category" value="<?=$this->id_category;?>">
                    </label>    
                </li>
                <li>
                    <input type="submit" value="Записать" class="informer_button">
                </li>
            </ul>    
        </form>
   </div>  <!-- class = "new-informer" -->  
</div>        