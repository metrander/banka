<?php
class item_model extends model{
	function __construct(){
		parent::__construct();
	}
	
	
	
	function check_good($var){
		
		$sql="
		SELECT g.price, g.price_low, g.price_high
		FROM goods g
		WHERE g.id = :id 
		";
		
		$result = $this->db->select($sql,array(":id" => $var));
	 	
		if(!$result[0]['price']&&!$result[0]['price_low']&&!$result[0]['price_high'])
			return "0";
		if($result[0]['price']&&!$result[0]['price_low']&&!$result[0]['price_high'])
			return "1";
		if($result[0]['price']&&$result[0]['price_low']&&!$result[0]['price_high'])
			return "13";	
		if($result[0]['price']&&!$result[0]['price_low']&&$result[0]['price_high'])
			return "12";	
		if($result[0]['price']&&$result[0]['price_low']&&$result[0]['price_high'])
			return "123";		
	}
	
	function good($var){
		$sql1="
		
		SELECT g.id, g.name_goods, gr.name_gradient, p.name_photo, g.price, gr.weight, gr.weight_low, gr.weight_high, g.price_low, g.price_high
		FROM goods g, gradients gr, photo p
		WHERE g.id = :id AND g.id = gr.id_goods AND p.id_goods = g.id AND p.master = '1' 
		 
		";
		
	$sql="
		
		SELECT g.id, g.name_goods, gr.name_gradient, p.name_photo, g.price, gr.weight, gr.weight_low, gr.weight_high, g.price_low, g.price_high
		FROM goods g
		INNER JOIN photo p ON p.id_goods = g.id AND p.master = '1' AND g.id = :id
		LEFT JOIN gradients gr ON g.id = gr.id_goods
		
		 
		";
	
	
	
		$result = $this->db->select($sql,array(":id" => $var));
		if(!$result) {
			die("Ошибка передачи параметров!");
			
		}
		$name = "";
		
		foreach($result as $value){
			
			if($value['name_goods'] != $name):
				$content[$value['id']]['name']= $value['name_goods'];
				$content[$value['id']]['photo'] = $value['name_photo'];
				$content[$value['id']]['price'] = $value['price'];
				$content[$value['id']]['price_low'] = $value['price_low'];
				$content[$value['id']]['price_high'] = $value['price_high'];
				$content[$value['id']]['id_good_high'] = $value['id'];
				$name = $value['name_goods'];
			endif;
			$content[$value['id']]['sub'][] = $value['name_gradient'];
			$content[$value['id']]['weight'][] = $value['weight'];
			$content[$value['id']]['weight_low'][] = $value['weight_low'];
			$content[$value['id']]['weight_high'][] = $value['weight_high'];
		}//foreach
		
	
		
		return $content;
	}
	
	function addcart($qty=1){
		@session_start();
		$id_good =(int)$_POST['id'];
		$type_good =(int)$_POST['atr'];
		if((!$id_good)||(!$type_good)){
			echo "Товар в корзину не попал!";
			return;
		}
		if(isset($_POST['qty'])){
			$qty = $_POST['qty'];
			$qty = $qty - $_SESSION['cart'][$id_good][$type_good]['cnt'];
		}
		// id товара  колчество
		if(isset($_SESSION['cart'][$id_good][$type_good]['cnt'])){
			$_SESSION['cart'][$id_good][$type_good]['cnt'] +=$qty;
		}
		else{
		$_SESSION['cart'][$id_good][$type_good]['cnt'] =$qty;
		}

	if($id_good!=999){ //Если это 999 - "Мой рецепт", тогда пропускаем вычисления типа товара	
		
		// сумма  количество
		$sql = "SELECT g.name_goods,g.id, g.price, g.price_low, g.price_high, p.name_photo 
				FROM goods g, photo p 
				WHERE g.id = :id AND g.id = p.id_goods AND p.master = '1' 
				" ;
		$result = $this->db->select($sql,array(':id' =>$id_good));
		if(!$result){
					echo "Товар в корзину не попал!";
					return;
				}
		
		switch ($type_good):
			case 1: $price = $result[0]['price_high'];
			break;
			case 2: $price = $result[0]['price'];
			break;
			case 3: $price = $result[0]['price_low'];
			break;
			default: $price = 0;
			break;
		endswitch;
		//для стандартного заказа
		$total_price = $price * $_SESSION['cart'][$id_good][$type_good]['cnt'];
		$type_pizza = array('1' =>"Большая порция",'2' => "Средняя порция", '3' =>"Маленькая порция");
		$_SESSION['goods'][$id_good]['name'] = $result[0]['name_goods'];
		$_SESSION['goods'][$id_good]['photo']=$result[0]['name_photo'];
		$_SESSION['goods'][$id_good]['sort'][$type_good]['type']=$type_pizza[$type_good];
	}//if($id_good!=999){ //Если это 999 - "Мой рецепт", тогда пропускаем вычисления типа товара	
	else{
		//для заказа - "Мой рецепт"
		$total_price = $_SESSION['goods'][$id_good]['sort'][$type_good]['price'] * $_SESSION['cart'][$id_good][$type_good]['cnt'];
		$type_pizza = array('999' =>"Моя пицца");
		$_SESSION['goods'][$id_good]['name']="Мой рецепт пиццы";
		$_SESSION['goods'][$id_good]['photo']="";
		//$_SESSION['goods'][$id_good]['sort'][$type_good]['type']="состав";
	}
		
		$_SESSION['goods'][$id_good]['id'] =$id_good;
		$_SESSION['goods'][$id_good]['sort'][$type_good]['cnt']=$_SESSION['cart'][$id_good][$type_good]['cnt'];
		$_SESSION['goods'][$id_good]['sort'][$type_good]['price']=$total_price;
		
		
		
		
		//@$_SESSION['summa'] += $price;
		
		$total_summa = 0;
		$total_quantity = 0;
		foreach($_SESSION['goods'] as $value){
			foreach($value['sort'] as $val){
				$total_summa += $val['price'];
				$total_quantity += $val['cnt']; 
			}
		}
		@$_SESSION['summa'] = $total_summa;
		@$_SESSION['total_quantity'] = $total_quantity;
		echo $_SESSION['summa']." грн. на ".$_SESSION['total_quantity']." шт.";
	}
	function delcart(){
		@session_start();
		$id_good =(int)$_POST['id'];
		unset($_SESSION['goods'][$id_good]);
		unset($_SESSION['cart'][$id_good]);
		$total_summa = 0;
		$total_quantity = 0;
		foreach($_SESSION['goods'] as $value){
			foreach($value['sort'] as $val){
				$total_summa += $val['price'];
				$total_quantity += $val['cnt']; 
			}
		}
		@$_SESSION['summa'] = $total_summa;
		@$_SESSION['total_quantity'] = $total_quantity;
	}


	function send_order(){//Заказ на выполнения
		@session_start();
		
		$error ="";
		if(@$_SESSION['user']){
			//для зарегистрированного пользователя
			$result = $this->db->select("SELECT name, email, phone FROM user WHERE id = :id",array(':id'=>$_SESSION['user']['id_user']));
			$name_user = $result[0]['name'];
			$email_user = $result[0]['email'];
			$phone_user = $result[0]['phone'];
		}//if(@$_SESSION['user'])
		else{
			//для не зарегистрированного пользователя
			$name_user = substr(rtrim(htmlspecialchars($_POST['name'])),0,50);
			$email_user= substr(rtrim(htmlspecialchars($_POST['email'])),0,50);
			if(!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i",$email_user)) 
				$email_user = "";
			$phone_user= substr(rtrim(htmlspecialchars($_POST['phone'])),0,20);
			//проверка на заполнения
				if(empty($name_user)) $error .= "<li>Вы не указали имя</li>";
				if(empty($email_user)) $error .= "<li>Неверный Email</li>";
				if(empty($phone_user)) $error .= "<li>Вы не указали телефон</li>";
			//		
				$_SESSION['regError']['name'] = $name_user;
				$_SESSION['regError']['email'] = $email_user;
				$_SESSION['regError']['phone'] = $phone_user;
		
		}//else if(@$_SESSION['user'])
		if(empty($error)){
			//Ошибки при заполнении не обнаружены		
			//Информациия о клиенте 
			$user_order = "Имя: <strong>".$name_user."</strong><br>Телефон: <strong>".$phone_user."</strong><br>Email: <strong>".$email_user."</strong><br>";
			$dat = date("Y-m-d");
			$time = date("H:i:s");
			
			//Информация о товаре
			
			$list_gradients = "";
			$sql = "
			SELECT name_gradient, weight, weight_low, weight_high
			FROM gradients
			WHERE id_goods = :id_goods    
			";
			$dbh = $this->db->prepare($sql);
			$dbh->setFetchMode(PDO::FETCH_ASSOC);
		if(isset($_SESSION['goods'])){
				
			foreach($_SESSION['goods'] as $key => $value):
				foreach($value['sort'] as $k => $val){
					if($key != 999){//Пропускаем вычесления для - Моего рецепта
						$dbh->execute(array(":id_goods" => $key));
						$data = $dbh->fetchAll();
							foreach($data as $rez){
								if($k==1) $list_gradients .="<li> ".$rez['name_gradient']." - ".$rez['weight_high']." гр.</li>";
								if($k==2) $list_gradients .="<li> ".$rez['name_gradient']." - ".$rez['weight']." гр.</li>";
								if($k==3) $list_gradients .="<li> ".$rez['name_gradient']." - ".$rez['weight_low']." гр.</li>";
							}
							unset($_SESSION['goods'][$key]['sort'][$k]['name_gradient']);
							$_SESSION['goods'][$key]['sort'][$k]['name_gradient'] = $list_gradients;
							$list_gradients = "";
					}//if($key != 999)
					else{//Это - Мой рецепт
						$_SESSION['goods'][999]['sort'][$k]['name_gradient'] = $_SESSION['goods'][999]['sort'][$k]['type'];
						$_SESSION['goods'][999]['sort'][$k]['type']="Мой рецепт пиццы";
					}
				}//foreach($value['sort']
			endforeach;
		}//if(isset($_SESSION['goods']))
		else{
			echo "Ваша корзина пуста!";
			echo "<div id = 'order-ok'>Ваш заказ успешно принят. Сейчас к Вам позвонят на Ваш телефон:<span>".$phone_user."</span></div>";
			return;
		}
			$info_goood = serialize($_SESSION['goods']);
			$this->db->insert("orders",array("info_user" =>$user_order,"list_gradients"=>$info_goood,"data_order" =>$dat,"time_order" =>$time));
			//Удаление товара, которого заказали
			
			unset($_SESSION['goods']);
			unset($_SESSION['summa']);
			unset($_SESSION['total_quantity']);
			unset($_SESSION['cart']);
			unset($_SESSION['rec']);
		
		}//if(empty($error))
		else{
			//есть ошибки
			$_SESSION['regError']['error'] = "<div id = 'error_table'> Обнаружены ошибки заполнения:<br /><br /><ul> ".$error." </ul></div>";
			echo "1";
		}
		
	}
	
}
?>