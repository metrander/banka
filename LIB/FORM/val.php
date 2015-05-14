<?php
class val{

	function minlength($data,$arg){
		if(mb_strlen($data,'UTF-8') < $arg)
			return "Длина строки должна быть больше чем ".$arg." символов";
	}
	
	function maxlength($data,$arg){
		if(strlen($data) > $arg)
			return "Длина строки должна быть не меньше чем ".$arg." символов";
	}
	
	function digit($data){
		if(!ctype_digit($data)){
			return "Ваша строка должна быть из цифр!";
		}
	}
}
?>