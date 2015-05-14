<div class = "content">
    <span>Информеры</span>
      	<p>
           +<a href="informer/add_informer">Новый информер</a>
        </p><br>
<?php
   $informers = $this->array['informer'];
   // print_r($informers);
?>
        <?php foreach($informers as $key => $values):?>
        <div class="title_inform" title="<?= $values['name']; ?>">
            <h3> <?= $values['name']; ?></h3>
                <span>
                  кол.стр.( <?=count(@$informers[$key]['sub']) ;?>)
                </span>
                <p>
                   <a href="informer/upd_informer/<?= $key ;?>">Изменить</a>/<a href="informer/del_informer/<?= $key ;?>" id = "del">Удалить</a>
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
                                <span>
                                   позиция(<?= $val['ind']; ?>)
                                </span>
                              </td> 
                              <td>
                                <p>
                                  <a href="informer/upd_page/<?= $k ;?>">Изменить</a>/<a href="informer/del_page/<?= $k ;?>" id = "del">Удалить</a>
                                </p> 
                              </td>  
                          </tr>
                  <?php endforeach; ?>
                           <tr>
                               <td colspan="3" class="new-page">
                                    <a href="informer/new_page/<?=$key;?>">+Новая страница</a>
                               </td>
                          </tr>
                        </table>      
                <?php else: ?>
                  
                    <span>
                           0 страниц
                    </span>
                    <div class="new-page">
                        <a href="informer/new_page/<?=$key;?>">+Новая страница</a>
                    </div>
                 
                <?php endif; ?>  
               </div>  <!-- class="hide_item" -->       
        <?php endforeach; ?>
</div><!--content-->

