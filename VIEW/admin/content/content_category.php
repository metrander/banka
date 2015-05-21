<div class = "content">
    <span>Категории</span>
      	<p>
           +<a href="category/add_category">Новая категория</a>
        </p><br>

        <pre>
            <?php
               //$category = $this->array['category'];
                print_r($arr_category['master_page']);
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
        <?php endforeach; ?>
</div><!--content-->

