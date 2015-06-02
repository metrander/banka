<?php
class servis_model extends model{
	function __constuct(){
		parent::__construct();
	}
	
	function doaction(){
		$text = $_POST['text'];
		$dbh = $this->db->prepare(
		
		"INSERT INTO user(name) VALUES(:text)
		
		");
		$dbh->execute(array(':text'=>$text));
		$data = array("name" => $text, "id" => $this->db->lastInsertId());
		echo json_encode($data);
	}
	
	function getInsert(){
		$dbh = $this->db->prepare("
		SELECT * 
		FROM user
		");
		$dbh->setFetchMode(PDO::FETCH_ASSOC);
		$dbh->execute();
		$data = $dbh->fetchAll();
		echo json_encode($data);
	}
	function delInsert(){
		$idDel = $_POST['id'];
		$dbh = $this->db->prepare("DELETE FROM user WHERE id = '".$idDel."'");
		$dbh->execute();
	}
} 
?>