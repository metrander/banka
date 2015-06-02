<?php
class admin extends controller{

	function __construct(){
		parent::__construct();
	
		$this->view->title = "Вход администратора";
	}
	
	function index(){
		$this->view->render("admin_login","admin");
	}
	
	function login(){
		$res = $this->model->admin_login();
		if($res)
		header("location:../manager");
		exit;
	}

}

?>