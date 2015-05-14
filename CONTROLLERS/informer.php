<?php
class informer extends controller {
    function __construct() {
        parent::__construct();
        $this->view->title = "Управление сайтом(Информеры)";
	$this->view->js=array("js/jquery.js","js/jquery_accordion.js","js/ckeditor/ckeditor.js","js/jquery.cookie.js","js/admin.js");
    }
    function index(){
        $this->view->array = $this->model->informers();
        $this->view->render("content_informer","manager");
        exit;
    }
    function add_informer(){
        $this->view->render("form_add_infohmer","manager");
        exit;
    }
    function add_inf(){
        $result = $this->model->add();
        $this->redirect($result);
        exit;
    }
    function redirect($rez = false){
        if(!$rez)
                $redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:"/manager";
        else
                $redirect = "/informer";
        header("location:".$redirect);
    }
    
    function del_informer($arg){
        $this->model->del($arg);
        $this->redirect(FALSE);
        exit;
    }
    function upd_informer($arg){
        $this->view->id_informer=$arg;
        $this->model->get_data($arg);
        $this->view->render("form_upd_infohmer","manager");
        exit;
    }
    function upd_inf(){
       $result = $this->model->upd();
       $this->redirect($result);
       exit;
    }
    function new_page($arg){
        $this->view->array_informers=$this->model->get_informers();
        $this->view->id_informer=$arg;
        $this->view->title = "Новая страница информера ";
        $this->view->render("form_new_page","manager");
        exit;
    }
    function add_page(){
        $result = $this->model->add_page();
        $this->redirect($result);
    } 
    function upd_page($id_page){
        $this->view->array_informers=$this->model->get_informers();
        $this->view->title = "Изменить страницу информера ";
        $this->view->id_page=$id_page;
        $this->view->array = $this->model->get_inf_page($id_page);
        $this->view->render("form_edit_page","manager");
        exit;
    }
    function edit_page(){
        $result = $this->model->edit_page();
        $this->redirect($result); 
    }
    function del_page($arg){
        $this->model->del_page($arg);
        $this->redirect(FALSE);
        exit;
    }
}
?>