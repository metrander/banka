<?php
class admin_model extends model{
	function __constuct(){
		parent::__construct();
	}

	function admin_login(){
		@session_start();
		
		
		if((!$_POST['admin_login'])||(!$_POST['admin_password'])){
			die("<a href='../../admin'>Вы не заполнили необходимые поля!</a>");
		}//if(!isset($_POS..
		
		
		
		$sql = "
		
		SELECT id, name, email, phone, login, pass
		FROM admin
		WHERE login = :login LIMIT 1
		
		";	
		
		$result = $this->db->select($sql,array(':login' => $_POST['admin_login']));
		
		if ($_POST['admin_password'] != @$result[0]['pass'])
			die("<a href='../../admin'>Авторизация не прошла!</a>");
		
		$_SESSION['admin']['id'] = @$result[0]['id'];	
		$_SESSION['admin']['name'] = @$result[0]['name'];
		$_SESSION['admin']['email'] = @$result[0]['email'];
		$_SESSION['admin']['phone'] = @$result[0]['phone'];
		return true;
	}//function admin_login()
}//class admin_model extends model