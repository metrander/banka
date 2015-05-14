<?php
class info_admin extends model{
	function __constuct(){
		parent::__construct();
		
	}
	function master_page(){
		$sql = "
		
		SELECT c.name_category, g.name_goods, g.id, c.id as id_category
		FROM category c
		LEFT JOIN goods g ON c.id = g.id_category
		
		";
		$result =$this->db->select($sql);
		
		$array = array();
		
		$name_category = "";
		foreach($result as $value):
			if($name_category!=$value['name_category']){
				$array['master_page'][$value['id_category']]['category'] = $value['name_category'];
			}
			$array['master_page'][$value['id_category']]['sub'][$value['id']]['name'] = $value['name_goods'];
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