<?php
class index_model extends model {
	function __construct(){
		parent::__construct();
	}
	
	public function content($arg){
		$sql_old_version="
		
		SELECT g.id, g.name_goods, gr.name_gradient, p.name_photo, g.price
		FROM category c, goods g, gradients gr, photo p
		WHERE c.id = :num_category AND c.id = g.id_category AND g.id = gr.id_goods AND p.id_goods = g.id AND p.master = '1' 
		 
		";
		
		$sql="
		
		SELECT g.id, g.name_goods, gr.name_gradient, p.name_photo, g.price
		FROM category c 
		INNER JOIN goods g ON c.id = :num_category AND c.id = g.id_category
		INNER JOIN photo p ON p.id_goods = g.id AND p.master = '1' 
		LEFT JOIN gradients gr ON g.id = gr.id_goods
		
		 
		";
		
		
		
		$result = $this->db->select($sql,array(":num_category" => $arg));
		
		$content = array();
		$name = "";
		foreach($result as $value){
			
			if($value['name_goods'] != $name):
				$content[$value['id']]['name']= $value['name_goods'];
				$content[$value['id']]['photo'] = $value['name_photo'];
				$content[$value['id']]['price'] = $value['price'];
				$content[$value['id']]['id_good'] = $value['id'];
				$name = $value['name_goods'];
			endif;
			$content[$value['id']]['sub'][] = $value['name_gradient'];
		}
		
		return $content;
	}
	function get_stat($arg){
		$id = (int)$arg;
		$sql = "
		
		SELECT *
		FROM category_stat
		WHERE id = :id
		
		";
	
		$result = array();
		$result = $this->db->select($sql,array(':id'=>$id));
		return $result;
		
	}
	
	
	
	
	
}
?>