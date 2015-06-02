<?php
class category_model extends model {
    function __construct() {
        parent::__construct();
    } 
    function add(){
        if(empty($_POST['category_name']))
            return false;
        $ind = (int)$_POST['category_position'];
        $this->db->insert("category",array('name_category'=>$_POST['category_name'],'ind'=>$ind));
        return true;
    }
    function upd(){
        if(empty($_POST['category_name']))
            return false;
        $ind = (int)$_POST['category_position'];
        $id_category = (int)$_POST['id_category'];
        $this->db->update("UPDATE category SET name_category = :name, ind = :ind WHERE id = :id",array(':name'=>$_POST['category_name'],':ind'=>$ind,':id'=>$id_category));
        return true;
    }
    function del($arg){
        $id_cat = (int)$arg;
        $result = $this->db->select("SELECT id FROM goods WHERE id_category = :id_cat",array(":id_cat"=>$id_cat));
        if(!$result[0]['id']){
            $this->db->exec('DELETE FROM category WHERE id = '.$id_cat);
        }
    } 
    function add_page(){
        @session_start();
        echo"<pre>";
            print_r($_POST);
        echo"</pre>"  ;
       
        $error="";
        $name_goods = trim($_POST['name_goods']);
        if(empty($name_goods)) $error .="Наименование товара<br>";
        if(empty($error)){
            //запись товара 
            
            $price_low = (int)$_POST['price_low'].".".(int)$_POST['price_low_real'];
            $price = (int)$_POST['price'].".".(int)$_POST['price_real'];
            $price_high = (int)$_POST['price_heigh'].".".(int)$_POST['price_heigh_real'];  
            $this->db->insert("goods",array("id_category"=>$_POST['id_category'],"name_goods"=>$name_goods,
                "price_low"=>$price_low,"price"=>$price,"price_high"=>$price_high));
            $id_goods = $this->db->lastInsertId();
            
            $cnt = (count($_POST)-11)/4;
            //запись инградиента
            for($i=1; $i<$cnt+1; $i++){
               if(!empty($_POST['name_gradient'.$i])){
                   
                   $this->db->insert("gradients",array("name_gradient"=>$_POST['name_gradient'.$i] ,"weight_low"=>(int)$_POST['weight_low'.$i] ,"weight" =>(int)$_POST['weight'.$i] , "weight_high" =>(int)$_POST['weight_heigh'.$i],"id_goods"=>$id_goods));
               }
            }
               
            if(($_FILES['myfile']['name'])&&(!$_FILES['myfile']['error']) ){
                //информация о загружаемом файле
                $name_origin_file = $_FILES['myfile']['name'];
                $name_tmp_file = $_FILES['myfile']['tmp_name'];
                $size_file = $_FILES['myfile']['size'];
                $type_file = $_FILES['myfile']['type'];
                $error_file = $_FILES['myfile']['error'];
                //массивы для проверки загружаемого файла
                $mime_access = array("image/gif","image/png","image/jpeg","image/pjpeg","image/x-png");
                $ext_access = array("gif","jpg","png","jpeg");
                $ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $name_origin_file));
                //проверки
                if(!in_array($type_file, $mime_access)) $error .="Файл должен быть[gif,jpg,png,jpeg]<br>";
                if(!in_array($ext, $ext_access)) $error .="Недопустимое расширение файла<br>"; 
                if($size_file>MAX_SIZE) $error .="Большой размер файла<br>";
                if($error_file) $error .= "Ошибка при загрузке файла<br>";
                //установка пути
                $path_to = PATH_ROOT."PHOTO/";
                $name_new_file =  date('YmdHis')."_".uniqid().".".$ext;
                //Копироване файла из временной дректории в указанную
                if(!move_uploaded_file($name_tmp_file,$path_to.$name_new_file)){
                        $error .="Ошибка копирования файла<br>";
                }
                else{
                    $image = new SimpleImage();
                    $upd_file = $id_goods.uniqid().".".$ext;
                    $image->img_resize($path_to.$name_new_file, $path_to.$upd_file,RESIZE_WIDTH, RESIZE_HEIGHT,  $quality=100, $rgb=COLOR_FON, $fon=0);
                    @unlink($path_to.$name_new_file);
                    $this->db->insert("photo",array("id_goods"=>$id_goods,"name_photo"=>$upd_file,"master"=>'1'));
                }//if(!move_uploaded_file($name_tmp_file,$path_to.$name_new_file))
            }//if($name_origin_file)
           
           
           
           
        }//if(empty($error))
         if(!empty($error)){
            $_SESSION['error_file'] = $error;  
            return FALSE;
         }
            else                
                return TRUE;
        
    }
}
