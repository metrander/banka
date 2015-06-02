<?php
class view{
	public function render($name,$option = false){
		$inf = new info();
		switch($option):
			case false:{
				
				$contact = $inf->inf();
				$lmenu =$inf->lmenu();
				$gmenu =$inf->gmenu(); 
				$stati =$inf->stati();
				$informers = $inf->informers(); 
				$informers_reclama = $inf->informers_reclama();
				$informer =$inf->informer('regim');
				require_once PATH_TEMPLATE."head.php";
				require_once PATH_TEMPLATE."head-menu.php";
				require_once PATH_TEMPLATE."cart.php";
				require_once PATH_TEMPLATE."img_fon.php";
				require_once PATH_CONTENT.$name.".php";
				require_once PATH_TEMPLATE."left-bar.php";
				require_once PATH_TEMPLATE."footer.php";
			}
			break;
			case "admin":{
				$contact = $inf->inf();
				require_once PATH_TEMPLATE."head.php";
				require_once PATH_TEMPLATE."head-menu.php";
				require_once PATH_TEMPLATE."cart_end.php";
				require_once PATH_CONTENT.$name.".php";
				require_once PATH_TEMPLATE."footer_end.php";
			}
			break;
			case "manager":{
				$inf = new info_admin();
				$arr_category = $inf->master_page();
				require_once PATH_TEMPLATE_ADMIN."head.php";
				require_once PATH_TEMPLATE_ADMIN."shapka.php";
				require_once PATH_TEMPLATE_ADMIN."left_bar.php";
				require_once PATH_CONTENT_ADMIN.$name.".php";
				require_once PATH_TEMPLATE_ADMIN."footer.php";
			}
			break;
		
		
		
		endswitch;

	}
	
}
?>