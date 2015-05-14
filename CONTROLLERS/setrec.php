<?php
class setrec extends controller{
	function __construct(){
		parent::__construct();
		$this->view->title = "Мой рецепт";
		$this->view->js = array("js/jsview.js");
	}
	function index(){
		$this->view->arr = $this->model->gred();
		$this->view->render("recipe");	
	}
	function price(){
		$this->model->info_item();
		exit;
	}
	function delprice(){
		$this->model->item_del();
		exit;
	}
	function myorder(){
		$this->model->my_order();
		exit;
	}
	
}
?>