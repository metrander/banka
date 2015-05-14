<?php 
require_once "../LIB/FORM/val.php";
class form{

	private $_currentItem;	
	private $_postData = array();
	private $_val = array() ;
	private $_error = array();
	
	function __construct(){
		 $this->_val = new val;
	}
	
	public function post($field){
		$this->_postData[$field] = $_POST[$field];
		$this->_currentItem = $field;
		return $this;		
	}
	
	function fetch($fieldName = false){
		if($fieldName)
			if (isset($this->_postData[$fieldName]))
				return $this->_postData[$fieldName];
					else
					return false;
					
		else
			return $this->_postData;
	}
	
	function val($typeOfValidator,$arg = null){
		if($arg != null)
			$error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem],$arg);
			else
				$error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem]);
				
				
		if($error){
			$this->_error[$this->_currentItem] = $error;
		}
		
				
		return $this;
	}
	
	function submit(){
		if(empty($this->_error))
			return true;
			else{
				$str = '';
				foreach($this->_error as $key => $value){
					$str .= "[".$key."] : ".$value."  ";
				}
				throw new Exception($str);
			}
	}

}

?>