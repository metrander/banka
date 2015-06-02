<?php
class category extends controller {
    function __construct() {
        parent::__construct();
		$this->view->js=array("js/jquery.js","js/ckeditor/ckeditor.js","js/jquery_accordion.js","js/jquery.cookie.js","js/admin.js");
    }
    function index(){
        $this->view->title = "Управление сайтом(Категории)";
        $this->view->render("content_category","manager");
        exit;
    }
    function add_category(){
        $this->view->title = "Управление сайтом(Новая категория)";
        $this->view->render("form_add_category","manager");
        exit;
    }
    function upd_category($arg){
        $this->view->id_category=$arg;
       // $this->model->get_data($arg);
        $this->view->render("form_upd_category","manager");
        exit;
    }
    function upd_cat(){
       $result = $this->model->upd();
       $this->redirect($result);
       exit;
    }
    function add_cat(){
        $result = $this->model->add();
        $this->redirect($result);
        exit;
    }
    function redirect($rez = false){
        if(!$rez)
                $redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:"/manager";
        else
                $redirect = "/category";
        header("location:".$redirect);
    }
    function del_category($arg){
        $this->model->del($arg);
        $this->redirect(FALSE);
        exit;
    }
    function new_page($arg){
        $this->view->id_category=$arg;
        $this->view->title = "Новый товар категории ";
        $this->view->render("form_newcategory_page","manager");
        exit;
    }
    function add_page(){
        $result=$this->model->add_page();
        $this->redirect($result);
        exit;
    }
   
}
