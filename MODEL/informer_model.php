<?php
class informer_model extends model {
    
    public function __construct() {
        parent::__construct();
    }
    
    function informers(){
        $sql = "SELECT i.`id`, i.`name`,m.`name` as name_menu,m.id as id_menu,i.ind,m.ind as ind_menu
                FROM informers i
                LEFT JOIN informer_menu m ON i.id=m.id_informer ORDER BY i.ind,m.ind";                

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
                $array['informer'][$value['id']]['sub'][$value['id_menu']]['name']=$value['name_menu'];
                $array['informer'][$value['id']]['sub'][$value['id_menu']]['ind']=$value['ind_menu'];
            }
        }
        return $array;
    }
    function add(){
        if(empty($_POST['informer_name']))
            return false;
        $ind = (int)$_POST['informer_position'];
        $this->db->insert("informers",array('name'=>$_POST['informer_name'],'ind'=>$ind));
        return true;
    }
    function upd(){
        if(empty($_POST['informer_name']))
            return false;
        $ind = (int)$_POST['informer_position'];
        $id_informer = (int)$_POST['id_informer'];
        $this->db->update("UPDATE informers SET name = :name, ind = :ind WHERE id = :id",array(':name'=>$_POST['informer_name'],':ind'=>$ind,':id'=>$id_informer));
        return true;
    }
    function del($arg){
        $id_inf = (int)$arg;
	$this->db->exec('DELETE FROM informers WHERE id = '.$id_inf);
        $this->db->exec('DELETE FROM informer_menu WHERE id_informer = '.$id_inf);
    }  
    function get_data($arg){
        @session_start();
        $sql = "SELECT name, ind FROM informers WHERE id = :id";
        $result = $this->db->select($sql,array(':id'=>$arg));
        $_SESSION['informer']['name']=$result[0]['name'];
        $_SESSION['informer']['ind']=$result[0]['ind'];
    }
    function add_page(){
        @session_start();
        $txt_stat =$_POST['txt'];
        $name_page = htmlspecialchars($_POST['name_page']);
        $ind = (int)$_POST['ind'];
        $id_informer = $_POST['id_informer'];
        if(empty($name_page)){
                $_SESSION['addError']['error'] = "Ошибка: Вы не заполнили поле - Наименование страницы...";
                $_SESSION['addError']['position'] = $ind;
                return false;
        }
        $this->db->insert("informer_menu",array('id_informer'=>$id_informer,'name'=>$name_page,'ind'=>$ind,'txt'=>$txt_stat));
        return true;
    }
    function get_informers(){
         $sql =  "SELECT name,id
                   FROM informers";
        $result=array();
        $result = $this->db->select($sql);
        return $result;
    }
    
    function get_inf_page($arg){
        $sql =  "SELECT name, txt, ind, id_informer
                   FROM informer_menu
                   WHERE id=:id";
        $result=array();
        $result = $this->db->select($sql,array(':id'=>$arg));
        return $result;
    }
    function edit_page(){
        @session_start();
        $txt_stat =$_POST['txt'];
        $name_page = htmlspecialchars($_POST['name_page']);
        $ind = (int)$_POST['ind'];
        $id_page = (int)$_POST['id_page'];
        $id_informer = (int)$_POST['id_informer'];
        if(empty($name_page)){
                $_SESSION['addError']['error'] = "Ошибка: Вы не заполнили поле - Наименование страницы...";
                $_SESSION['addError']['position'] = $ind;
                return false;
        }
        $this->db->update("UPDATE informer_menu SET name =:name,id_informer=:id_informer,txt=:txt,ind=:ind WHERE id=:id",array(':id_informer'=>$id_informer,':name'=>$name_page,':ind'=>$ind,':txt'=>$txt_stat,':id'=>$id_page));
        return true;
    }
    function del_page($arg){
        $id_page = (int)$arg;
	$this->db->exec('DELETE FROM informer_menu WHERE id = '.$id_page);
    }  
}
?>
