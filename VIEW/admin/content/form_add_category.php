<div class = "content">
    <span>Добавить новую категорию</span>
    <div class = "new-informer"> 
        <form name="form_category" method="post" action="../../category/add_cat">
            <ul>
                <li>
                    <label> 
                        <span> Категория </span>
                        <div>
                            <input type="text" name="category_name" value="" id="field_long">
                        </div>
                    </label>    
                </li>  
                <li>
                    <label> 
                        <span>Позиция</span>
                        <div>
                            <input type="text" name="category_position" value="" id="field_short">
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
