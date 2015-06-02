<?php
class bootstrap{
	
	function __construct(){
		
		
		$url = isset($_GET['url'])? $_GET['url']: null;
		$url = trim($url,"/");
		$url = explode("/",$url);
		
		
			if(empty($url[0])){
				$url[0] = "index";
			}
		
		$file = "CONTROLLERS/".$url[0].".php";
			if(file_exists($file)){
				require_once "CONTROLLERS/".$url[0].".php";
			}
			else{
				require_once "CONTROLLERS/error.php";
				$oError = new error;
				return;
			}
		
			$controller = new $url[0];
			$controller->LoadModel($url[0]);
			
			if(isset($url[2])){
				if(!method_exists($controller,$url[1]))
					die("<br />Не верные параметры!<br />");
				$controller->$url[1]($url[2]);
			}
			else{
				if(isset($url[1])){
					if(!method_exists($controller,$url[1]))
					die("<br />Не верные параметры!<br />");
					$controller->$url[1]();
				}
			}
			$controller->index();
			
			
	}
			
		
	
}


?>