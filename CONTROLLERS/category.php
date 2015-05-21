<?php
class category extends controller {
    function __construct() {
        parent::__construct();
		$this->view->js=array("js/jquery.js","js/jquery_accordion.js","js/ckeditor/ckeditor.js","js/jquery.cookie.js","js/admin.js");
    }
    function index(){
        $this->view->title = "Управление сайтом(Категории)";
        $this->view->render("content_category","manager");
    }
   
}
