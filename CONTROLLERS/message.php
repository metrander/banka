<?php
class message extends controller {
    function __construct() {
        parent::__construct();
        $this->view->js=array("js/jquery.js","js/jquery_accordion.js","js/ckeditor/ckeditor.js","js/jquery.cookie.js","js/admin.js");
        $this->view->title = "Управление сайтом";
    }
    function index(){
        $this->view->title = "Управление сайтом(Сообщение)";
        $this->view->array = $this->model->message();
        $this->view->render("content_message","manager");
        exit;
    }
    function add_message(){
        $this->view->title = "Управление сайтом(Новое сообщение)";
        $this->view->render("form_add_message","manager");
        exit;
    }
    function add_msg(){
        $result = $this->model->add();
        $this->redirect($result);
        exit;
    }
    function redirect($rez = false){
        if(!$rez)
                $redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:"/message";
        else
                $redirect = "/message";
        header("location:".$redirect);
    }
    function del_message($arg){
        $this->model->del($arg);
        $this->redirect(FALSE);
        exit;
    }
    function upd_message($arg){
        $this->view->title = "Управление сайтом(Изменить сообщение)";
        $this->view->id_infrecl=$arg;
        $this->model->get_data($arg);
        $this->view->render("form_upd_message","manager");
        exit;
    }
    function upd_msg(){
       $result = $this->model->upd();
       $this->redirect($result);
       exit;
    }
    function new_page($arg){
        $this->view->array_message=$this->model->get_message();
        $this->view->id_message=$arg;
        $this->view->title = "Новая страница сообщения ";
        $this->view->render("form_newmessage_page","manager");
        exit;
    }
    function add_page(){
        $result = $this->model->add_page();
        $this->redirect($result);
    } 
    function upd_page($id_page){
        $this->view->array_message=$this->model->get_message();
        $this->view->title = "Изменить страницу сообщения ";
        $this->view->id_page=$id_page;
        $this->view->array = $this->model->get_msg_page($id_page);
        $this->view->render("form_editmessage_page","manager");
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
