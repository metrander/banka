<?php
class index extends controller{
	function __construct(){
		parent::__construct();
		$this->view->js = array("js/jsview.js");
		$this->view->title="Главная";
		
		
	}
	public function index(){
		$array = $this->model->content(1);
		$this->view->arr = $array;
		$this->view->render("master");
	}
	
	public function cat($var){
		$array = $this->model->content($var);
		$this->view->arr = $array;
		$this->view->render("master");
	}
	public function stat($arg){
		$this->view->title="Статья";
		$this->view->array_stat = $this->model->get_stat($arg);
		$this->view->render("stat_view");
		exit;
	}
	
	
}
?>

