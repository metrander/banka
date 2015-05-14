<?php
class controller{
	function __construct(){
		$this->view = new view;
	}
	function LoadModel($name){
		$path = "MODEL/".$name."_model.php";
		if(file_exists($path)){
			require_once $path;
			$NameModel = $name."_model";
			$this->model = new $NameModel();
		}
	}
}


?>