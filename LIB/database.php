<?php
class database extends PDO {
	function __construct(){
		parent::__construct("mysql:host=localhost;dbname=pizza","root","159951",array(
							PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
							PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
						  ));
		
	}
	function insert($table,$data){
		$namefield = implode("`,`",array_keys($data));
		$namevar =":". implode(",:",array_keys($data));
		
		$dbh = $this->prepare("INSERT INTO ".$table." (`$namefield`) VALUES($namevar)");
		foreach($data as $key => $value){
			$dbh->bindValue(":$key",$value);
		}
		$dbh->execute();
		
	}
	
	function select($sql,$array = array(), $fetchMode  = PDO::FETCH_ASSOC){
	
		$dbh = $this->prepare($sql);
		
		$dbh->setFetchMode($fetchMode);  
		foreach($array as $key =>  $value){
			$dbh->bindValue("$key",$value);
		}
			$dbh->execute();
			
			$fields = $dbh->fetchAll();
			return $fields;

	}
	
	function update($sql,$array = array()){
		
		$dbh = $this->prepare($sql);
	
		foreach($array as $key =>  $value){
			$dbh->bindValue("$key",$value);
		}
			$dbh->execute();
		
	}
        
       
}

?>