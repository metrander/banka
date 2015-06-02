<?php
class page extends controller{

	function __construct(){
		parent::__construct();
		$this->view->js = array("js/jquery.js","js/jquery_accordion.js","js/ckeditor/ckeditor.js","js/jquery.cookie.js","js/admin.js");
		
	}
	
	
	function index(){
	}
	
	
	function edit($arg){
		$this->view->title = "Редактирование страницы";
		$this->view->array_stat=$this->model->get_stat($arg);
		$this->view->render("form_edit_text","manager");
	}
	function edit_page(){
		$add = $this->model->edit_page();
		$this->redirect($add);
		exit;
	}
	function add(){
		$this->view->title = "Новая страница ";
		$this->view->render("form_new_text","manager");
		
	}
	function add_page(){
		$add = $this->model->add_page();
		$this->redirect($add);
		exit;
	}
	
	function del($arg){
		$this->model->del_page($arg);
		$this->redirect();
		exit;
	}
	
	function redirect($rez = false){
		if(!$rez)
			$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:"/manager";
		else
			$redirect = "/manager";
		header("location:".$redirect);
	}

	
	
}
?>