<?php
class help extends controller{
	function __construct(){
		parent::__construct();
		}
	public function index(){
		$this->view->title="help";
		
		$this->view->msg = "Hi this is the help!";
		$this->view->render("VIEW/tmp/content");
		
		
	}
	
}

?>