<?php
class manager extends controller{

	function __construct(){
		parent::__construct();
		$this->view->title = "Управление сайтом(Основные страницы)";
		$this->view->js=array("js/jquery.js","js/jquery_accordion.js","js/jquery.cookie.js","js/admin.js");
	}
	
	function index(){
		@session_start();
		if(!@$_SESSION['admin']){
			header("location:/");
			exit;
		}
		
		$this->view->render("content","manager");
	}
}