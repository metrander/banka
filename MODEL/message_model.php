<?php
class message_model extends model {
    function __construct() {
        parent::__construct();
    }
    function message(){
         $sql = "SELECT i.`id`, i.`name`,m.`txt` as name_menu,m.id as id_menu,i.ind,m.ind as ind_menu
                FROM infreclama i
                LEFT JOIN informer_reclama m ON i.id=m.id_infrecl ORDER BY i.ind,m.ind";                

        $result = $this->db->select($sql);
        $array = array();
        $name = "";
        foreach ($result as $value) {
            if($name!=$value['name']){
                $array['informer'][$value['id']]['name']=$value['name'];
                $array['informer'][$value['id']]['ind']=$value['ind'];
                $name = $value['name'];
            }
            if(isset($value['name_menu'])){
                $array['informer'][$value['id']]['sub'][$value['id_menu']]['name']=substr($value['name_menu'],0,65)."...";
                $array['informer'][$value['id']]['sub'][$value['id_menu']]['ind']=$value['ind_menu'];
            }
        }
        return $array;
    }
    function add(){
        if(empty($_POST['message_name']))
            return false;
        $ind = (int)$_POST['message_position'];
        $this->db->insert("infreclama",array('name'=>$_POST['message_name'],'ind'=>$ind));
        return true;
    }
    function upd(){
        if(empty($_POST['message_name']))
            return false;
        $ind = (int)$_POST['message_position'];
        $id_infrecl = (int)$_POST['id_infrecl'];
        $this->db->update("UPDATE infreclama SET name = :name, ind = :ind WHERE id = :id",array(':name'=>$_POST['message_name'],':ind'=>$ind,':id'=>$id_infrecl));
        return true;
    }
    function del($arg){
        $id_inf = (int)$arg;
	$this->db->exec('DELETE FROM infreclama WHERE id = '.$id_inf);
        $this->db->exec('DELETE FROM informer_reclama WHERE id_infrecl = '.$id_inf);
    }
    function get_data($arg){
        @session_start();
        $sql = "SELECT name, ind FROM infreclama WHERE id = :id";
        $result = $this->db->select($sql,array(':id'=>$arg));
        $_SESSION['message']['name']=$result[0]['name'];
        $_SESSION['message']['ind']=$result[0]['ind'];
    }
    function get_message(){
         $sql =  "SELECT name,id
                   FROM infreclama";
        $result=array();
        $result = $this->db->select($sql);
        return $result;
    }
    function add_page(){
        @session_start();
        $txt_stat =$_POST['txt'];
        $ind = (int)$_POST['ind'];
        $id_inrecl = $_POST['id_infrecl'];
        if(empty($txt_stat)){
                $_SESSION['addError']['error'] = "Ошибка: Вы не заполнили поле - Содержание страницы...";
                $_SESSION['addError']['position'] = $ind;
                return false;
        }
        $this->db->insert("informer_reclama",array('id_infrecl'=>$id_inrecl,'ind'=>$ind,'txt'=>$txt_stat));
        return true;
    }
    function get_msg_page($arg){
        $sql =  "SELECT txt, ind, id_infrecl
                   FROM informer_reclama
                   WHERE id=:id";
        $result=array();
        $result = $this->db->select($sql,array(':id'=>$arg));
        return $result;
    }
    function edit_page(){
        @session_start();
        $txt_stat =$_POST['txt'];
        $ind = (int)$_POST['ind'];
        $id_page = (int)$_POST['id_page'];
        $id_infrecl = (int)$_POST['id_infrecl'];
        if(empty($txt_stat)){
                $_SESSION['addError']['error'] = "Ошибка: Вы не заполнили поле - Наименование страницы...";
                $_SESSION['addError']['position'] = $ind;
                return false;
        }
        $this->db->update("UPDATE informer_reclama SET id_infrecl=:id_infrecl,txt=:txt,ind=:ind WHERE id=:id",array(':id_infrecl'=>$id_infrecl,':ind'=>$ind,':txt'=>$txt_stat,':id'=>$id_page));
        return true;
    }
    function del_page($arg){
        $id_page = (int)$arg;
	$this->db->exec('DELETE FROM informer_reclama WHERE id = '.$id_page);
    }  
    
    
}
