<?php
class item extends controller{
	function __construct(){
		parent::__construct();
		$this->view->title = "Просмотр";
		$this->view->js = array("js/custumer.js","js/jsview.js");
	}
	
	function index(){
		
		}
	
	function order(){
		@session_start();
		if(@$_SESSION['goods']){
			$this->view->title = "Оформление заказа";
			$this->view->render("view_order");
		}
		else
		header("location:/");
		exit;
	}
	
	function page($item){
		$flag = $this->model->check_good($item);
		$this->view->array_good = $this->model->good($item);
		if($flag == "123")
			$this->view->render("view_item");
		if($flag == "1")
			$this->view->render("view_item_1");
		if($flag == "13")
			$this->view->render("view_item_13");
		if($flag == "12")
			$this->view->render("view_item_12");			
	}
	function cart(){
		$this->model->addcart();
		exit; 
	}
	function del(){
		$this->model->delcart();
	}
	function sorder(){
		$this->model->send_order();
	
	}
	
	
}

?>