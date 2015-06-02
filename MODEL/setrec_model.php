<?php
class setrec_model extends model{
	function __construct(){
		parent::__construct();
	}

	function gred(){
		
		$sql = "
		
		SELECT g.id, g.name as category, i.name as gredient, i.price, i.weight, i.icon, i.id as id_gred
		FROM gr_category g
		LEFT JOIN gr_item i ON g.id = i.id_category
		
		";
		$result = $this->db->select($sql);
		if(!$result){
			die("Неверное передача параметров ...");
		}
		$array = array();
		$category = "";
		foreach($result as $values){
			if($values['category']!=$category){
				$array['cat'][$values['id']]['name'] = $values['category'];
				
			}
			
			
				$array['cat'][$values['id']]['item'][$values['id_gred']]['name'] = $values['gredient'];
				$array['cat'][$values['id']]['item'][$values['id_gred']]['price'] = $values['price'];
				$array['cat'][$values['id']]['item'][$values['id_gred']]['weight'] = $values['weight'];
				$array['cat'][$values['id']]['item'][$values['id_gred']]['icon'] = $values['icon'];
			$category = $values['category'];
		}
		return $array;

	}
	
	function info_item(){
		@session_start();
		$sql = "
		
		SELECT id, price, weight
		FROM gr_item
		WHERE id = :id
		
		";
		$result = $this->db->select($sql,array(':id'=>$_POST['id']));
		
		if(!$result){
			die("Неправильная передача параметров ...");
		}
		
		if(@$_SESSION['rec'][$result[0]['id']]){
			$_SESSION['rec'][$result[0]['id']]['cnt']+=1;
		}
		else
		$_SESSION['rec'][$result[0]['id']]['cnt']=1;
		
		$price = $_SESSION['rec'][$result[0]['id']]['cnt'] * $result[0]['price'];
		$_SESSION['rec'][$result[0]['id']]['price'] = $price;
		
		$total = 0;
		foreach($_SESSION['rec'] as  $value){
			$total += $value['price'];
		}
		echo $total;
	}
	
	function item_del(){
		@session_start();
		$id = (int)$_POST['id'];
		$sql = "
		
		SELECT price
		FROM gr_item
		WHERE id = :id
		
		";
		$result = $this->db->select($sql,array(':id'=>$id));
		
		if(!$result){
			die("Неправильная передача параметров ...");
		}
		
		$price = $result[0]['price'];
		$_SESSION['rec'][$id]['price']-=$price;
		if($_SESSION['rec'][$id]['price']==0)
			unset($_SESSION['rec'][$id]);
		$total = 0;
		foreach($_SESSION['rec'] as $value){
			if(isset($value['price']))
			$total += $value['price'];
		}
		echo $total;
		
	}
	
	function my_order(){
		
	@session_start();
	$index = 999;
	if(!@$_SESSION['rec']){
		die("Ошибка передачи параметров ...");
	}
	$dbh = $this->db->prepare("SELECT name, price FROM gr_item WHERE id=:id");
	$dbh->setFetchMode(PDO::FETCH_ASSOC);  
		
	$total = 0;
	$gred = "";
		//Формиирование списка радиентов для  - Моего рецепта
		foreach($_SESSION['rec'] as $key => $value):
			if(isset($value['price']))
			$total += $value['price'];
			$dbh->execute(array(":id" => $key));
			$data = $dbh->fetch();
			$gred .="<li>".$data['name']." - ".$value['price']." грн.(".$value['cnt']."шт.)</li>";
		endforeach; 
	
	if(isset($_SESSION['cart'][999][999]['cnt']))
		$_SESSION['cart'][999][999]['cnt']+=1;
		else
	$_SESSION['cart'][999][999]['cnt'] = 1;	
	$_SESSION['goods'][$index]['id'] = 999;
	$_SESSION['goods'][$index]['name'] = "Мой рецепт пицы";
	$_SESSION['goods'][$index]['photo'] = "";
	$_SESSION['goods'][$index]['sort'][$_SESSION['cart'][999][999]['cnt']]['cnt'] = 1;
	$_SESSION['goods'][$index]['sort'][$_SESSION['cart'][999][999]['cnt']]['price'] = $total;
	
	$_SESSION['goods'][$index]['sort'][$_SESSION['cart'][999][999]['cnt']]['type'] =$gred;
	
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
	
}
	