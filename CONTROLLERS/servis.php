<?php
class servis extends controller{
	function __construct(){
		parent::__construct();
		$this->view->js = array("js/default.js");
		$this->view->title = "Тестовая страница";
		$this->view->path = "VIEW/tmp/";
		
	}
	public function index(){
		
		$this->view->render("vinos");
	}
	
	function doaction(){
		$this->model->doaction();
		exit;
	}
	function getInsert(){
		$this->model->getInsert();
		exit;
	}
	function delInsert(){
		$this->model->delInsert();
		exit;
	}
}


?>