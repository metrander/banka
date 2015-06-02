<?php
class info_admin extends model{
	function __constuct(){
		parent::__construct();
		
	}
	function master_page(){
		$sql = "
		
		SELECT c.name_category, g.name_goods, g.id, c.id as id_category,c.ind,p.name_photo,
                r.name_gradient,r.id as id_gr,r.weight_low,r.weight_high,r.weight,g.price,g.price_low,g.price_high
		FROM category c
		LEFT JOIN goods g ON c.id = g.id_category
                LEFT JOIN photo p ON g.id = p.id_goods AND p.master = '1'
                LEFT JOIN gradients r ON r.id_goods = p.id_goods
		
		";
		$result =$this->db->select($sql);
		
		$array = array();
		
		$name_category = "";
		foreach($result as $value):
			if($name_category!=$value['name_category']){
                            $array['master_page'][$value['id_category']]['category'] = $value['name_category'];
                            $array['master_page'][$value['id_category']]['ind'] = $value['ind'];
			}
			if(!empty($value['name_goods']))
                        $array['master_page'][$value['id_category']]['sub'][$value['id']]['name'] = $value['name_goods'];
                        $array['master_page'][$value['id_category']]['sub'][$value['id']]['photo'] = $value['name_photo'];
                        $array['master_page'][$value['id_category']]['sub'][$value['id']]['price'] = $value['price'];
                        $array['master_page'][$value['id_category']]['sub'][$value['id']]['price_low'] = $value['price_low'];
                        $array['master_page'][$value['id_category']]['sub'][$value['id']]['price_high'] = $value['price_high'];
                        
                        $array['master_page'][$value['id_category']]['sub'][$value['id']]['gradient'][$value['id_gr']]['name'] = $value['name_gradient'];
                        $array['master_page'][$value['id_category']]['sub'][$value['id']]['gradient'][$value['id_gr']]['weight_low'] = $value['weight_low'];
                        $array['master_page'][$value['id_category']]['sub'][$value['id']]['gradient'][$value['id_gr']]['weight_high'] = $value['weight_high'];
                         $array['master_page'][$value['id_category']]['sub'][$value['id']]['gradient'][$value['id_gr']]['weight'] = $value['weight'];
		endforeach;
		
		
		$sql = "
		
		SELECT name_category, id, ind as position
		FROM category_stat 
		ORDER BY ind
		";
		
		$result =$this->db->select($sql);
		foreach($result as $value):
			$array['stat'][$value['id']]['name'] = $value['name_category'];
			$array['stat'][$value['id']]['position'] = $value['position'];
		endforeach;
		
		return $array;
	}

}

?>