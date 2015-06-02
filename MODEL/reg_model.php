<?php
class reg_model extends model{
	function __constuct(){
		parent::__construct();
		
		
	}
	
	function insertReg(){
		//регистрация пользователя - запись в таблицу
		session_start();
		$name = substr(rtrim(htmlspecialchars($_POST['name'])),0,50);
		$email= substr(rtrim(htmlspecialchars($_POST['email'])),0,50);
		if(!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i",$email)) 
		$email = "";
		$phone= substr(rtrim(htmlspecialchars($_POST['phone'])),0,20);
		$pass1 = trim($_POST['pass1']);
		$pass2 = trim($_POST['pass2']);
		$mathPassword = '';
		if($pass1 == $pass2)
			$mathPassword = true;
		$pass = hash::create("md5",$pass1,HASH_KEY);
		
		
		$error = '';
		
		
		if(empty($name)) $error .= "<li>Вы не указали имя</li>";
		if(empty($email)) $error .= "<li>Неверный Email</li>";
		if(empty($phone)) $error .= "<li>Вы не указали телефон</li>";
		if(empty($pass1)) $error .= "<li>Вы не указали пароль</li>";
		if(empty($error)){
			//Ошибок нет
			//нужно проверить есть ли такой пользователь с таким же эл.адресом
			$dbh = $this->db->query("
			
			SELECT id 
			FROM user
			WHERE email = '$email'
			
			");
			if($dbh->fetchColumn()>0){
				//пользователь зарегистрирован, тогда готовим ошибку
				$_SESSION['regError']['error'] = "<div id = 'error_table'> Такой пользователь с таким email - ом зарегистрирован. </div>";
				$_SESSION['regError']['name'] = $name;
				$_SESSION['regError']['email'] = $email;
				$_SESSION['regError']['phone'] = $phone;
				return;
			}//if($dbh->fetchColumn()>0)
			else{
				//все в порядке(такого пользователя нет)продолжаем регистрацию
				$this->db->insert("user",array("name"=>$name,"email"=>$email,"pass"=>$pass,"phone" =>$phone));
				
				$id_user = $this->db->lastInsertId();
				$_SESSION['regError']['error'] = "<div id = 'success'>Спасибо за регистрацию</div>";
				$_SESSION['user']['name'] = $name;
				$_SESSION['user']['id_user'] = $id_user;
			}//else if($dbh->fetchColumn()>0)
		}//if(empty($error))
		else{
			
			//Есть ошибки
			
			$_SESSION['regError']['error'] = "<div id = 'error_table'> Обнаружены ошибки заполнения:<br /><br /><ul> ".$error." </ul></div>";
			$_SESSION['regError']['name'] = $name;
			$_SESSION['regError']['email'] = $email;
			$_SESSION['regError']['phone'] = $phone;
		}//else if(empty($error))
		
		
		
	}
	function logout(){
		@session_start();
		unset($_SESSION['user']['name']);
		session_destroy();
	}
	
	function enter(){
		$login = $_POST['login'];
		$password = hash::create("md5",$_POST['pass'],HASH_KEY);
		
		$rez = $this->db->select('SELECT id, pass, name	FROM user WHERE email = :login',array(':login'=>$login));
		if(count($rez)==0){
			echo 1;
			return;
		}
		
			if($rez[0]['pass'] == $password){
				//пользователь выполняет вход
				@session_start();
				$_SESSION['user']['name'] = $rez[0]['name'];
				$_SESSION['user']['id_user'] = $rez[0]['id'];
				echo "Здравствуйте ".$rez[0]['name'];
			}
			else {
				//такого пользователя нет
				$_SESSION['regError']['error'] = "<div id = 'error_table'> Обнаружены ошибки заполнения:<br /><br /><ul> ".$error." </ul></div>";
				echo 1;
			}
		
	}
}
?>