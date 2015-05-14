<?php
class page_model extends model{
	function __construct(){
		parent::__construct();
	}
	function get_stat($arg){
		$sql = "
		
		SELECT *
		FROM category_stat 
		WHERE id = :id ORDER BY ind 
		
		";
		
		$result = array();
		$result = $this->db->select($sql,array(":id" =>$arg));
		if(!$result)
			die("Ошибка при передачи параметров..");
		return $result;	
	}//function get_stat($arg)
	
	function edit_page(){
		@session_start();
		$id_page = (int)$_POST['id_page'];
		$txt =$_POST['txt'];
		$name_category = htmlspecialchars($_POST['name_category']);
		$ind = (int)$_POST['ind'];
		if(empty($name_category)){
			$_SESSION['Error'] = "Ошибка: Вы не заполнили поле - Наименование страницы...";
			return false;
		}
			
		$sql = "
		
		UPDATE category_stat
		SET name_category=:name_category, 
			ind = :ind,
			txt_stat = :txt 
		WHERE id = :id
		
		";
		$result = $this->db->update($sql,array(':name_category'=>$name_category,':ind'=>$ind,':txt' =>$txt,':id'=>$id_page));
		return true;
	}//function edit_page()
	
	function add_page(){
		@session_start();
		$txt_stat =$_POST['txt'];
		$name_category = htmlspecialchars($_POST['name_category']);
		$ind = (int)$_POST['ind'];
		if(empty($name_category)){
			$_SESSION['addError']['error'] = "Ошибка: Вы не заполнили поле - Наименование страницы...";
			$_SESSION['addError']['position'] = $ind;
			return false;
		}
		
		$this->db->insert("category_stat",array('name_category'=>$name_category,'ind'=>$ind,'txt_stat'=>$txt_stat));
		
		return true;
	}//function add_page()
	function del_page($id_page){
		$id_page = (int)$id_page;
		$this->db->exec('DELETE FROM category_stat WHERE id = '.$id_page);
	}
}
?>