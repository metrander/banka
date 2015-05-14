<?php
class info extends model{
		function __constuct(){
		parent::__construct();
		
		
	}
	//вывод информации по контактам([0] - наименование сайта,[1] - адрес, [2] - телефон, [3] - email)
	function inf(){
		$result = $this->db->select("SELECT text_contact FROM contact");
		return $result;
	}
	//меню на left-bar
	function lmenu(){
		$result = $this->db->select("SELECT name_menu, link FROM left_menu ORDER BY id_order");
		return $result;
	}
	function informer($field){
		$result = $this->db->select("SELECT $field FROM informer ");
		return $result;
	}
	
	function informers(){
            $sql = "
            SELECT h.id, h.name as head_name, m.name as menu_name, m.id as id_menu
            FROM informers h,informer_menu m 
            WHERE m.id_informer = h.id AND h.reclama = '0'";
				
		$result = $this->db->select($sql);
		$array = array();
		$name_head = "";
		foreach($result as $value):
			if($name_head != $value['head_name']){
				$array['inf_menu'][$value['id']]['name'] = $value['head_name'];
			}
				$array['inf_menu'][$value['id']]['sub'][$value['id_menu']]['name'] = $value['menu_name'];
				$name_head = $value['head_name'];
		endforeach;
		return $array; 
	}
	
	function informers_reclama(){
		$sql = "
		SELECT h.id, h.name as head_name, t.txt, t.id as id_txt
		FROM informers h,informer_reclama t
              WHERE t.id_informer = h.id AND h.reclama = '1'";
				
		$result = $this->db->select($sql);
		$array = array();
		$name_head = "";
		foreach($result as $value):
			if($name_head != $value['head_name']){
				$array['inf_reclama'][$value['id']]['name'] = $value['head_name'];
			}
				$array['inf_reclama'][$value['id']]['sub'][$value['id_txt']]['text'] = $value['txt'];
				$name_head = $value['head_name'];
		endforeach;
		return $array; 
	}
	
	
	
	
	function gmenu(){
		$result = $this->db->select("SELECT id, name_category, ind FROM category ORDER BY ind ");
		return $result;
	
	}
	function stati(){
		$result = $this->db->select("SELECT id, name_category, ind FROM category_stat ORDER BY ind ");
		return $result;
	
	}
}

?>