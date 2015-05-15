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
    //put your code here
}
