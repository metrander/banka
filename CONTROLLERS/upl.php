<?php
class upl extends controller{
	function __construct(){
		parent::__construct();
		$this->view->js = array("js/imageupload.js");
		$this->view->title = "Загрузка файлов";
		$this->view->path = "VIEW/tmp/";
		
	}
	public function index(){
		$this->view->render("upload");
	}
	
	public function run(){
		$this->model->run();
		exit;
	}
	
	
}


?>