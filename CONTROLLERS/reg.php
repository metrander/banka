<?php
class reg extends controller{
	function __construct(){
		parent::__construct();
		$this->view->title = "Регистрация";
	
	}
	
	function index(){
		$this->view->render("registr");
		exit;
	}
	function insertReg(){
		$this->model->insertReg();
		header("location:../reg");
		exit;
	}
	function logout(){
		$this->model->logout();
		header("location:/");
		exit;
	}
	
	function enter(){
		$this->model->enter();
		exit;
	}
}
?>