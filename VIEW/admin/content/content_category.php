<div class = "content">
    <span>Категории</span>
      	<p>
           +<a href="category/add_category">Новая категория</a>
        </p><br>

        <pre>
            <?php
              // print_r($arr_category['master_page']);
            ?>
        </pre>
        <?php foreach($arr_category['master_page'] as $key => $values):?>
        <div class="title_inform" title="<?= $values['category']; ?>">
            <h3> <?= $values['category']; ?></h3>
                <span>
                  кол.стр.( <?=count(@$arr_category['master_page'][$key]['sub']) ;?>)
                </span>
                <p>
                   <a href="category/upd_category/<?= $key ;?>">Изменить</a>/<a href="category/del_category/<?= $key ;?>" id = "del">Удалить</a>
                </p>
        </div> <!--class="title_inform"-->
          <div class="hide_item">
                 <?php if(isset($values['sub'])):?>
                        <table width = "100%">
                  <?php foreach($values['sub'] as $k => $val):?>
                          <tr> 
                              <td>
                                  <h3> <?= $val['name']; ?></h3>
                              </td>
                              <td>
                               
                              </td> 
                              <td>
                                <p>
                                  <a href="category/upd_page/<?= $k ;?>">Изменить</a>/<a href="category/del_page/<?= $k ;?>" id = "del">Удалить</a>
                                </p> 
                              </td>  
                          </tr>
                  <?php endforeach; ?>
                           <tr>
                               <td colspan="3" class="new-page">
                                    <a href="category/new_page/<?=$key;?>">+Новая страница</a>
                               </td>
                          </tr>
                        </table>      
                <?php else: ?>
                  
                    <span>
                           0 страниц
                    </span>
                    <div class="new-page">
                        <a href="category/new_page/<?=$key;?>">+Новая страница</a>
                    </div>
                 
                <?php endif; ?>  
               </div>  <!-- class="hide_item" -->
        <?php endforeach; ?>
</div><!--content-->

