<?php
require_once '../LIB/form.php';
require_once '../LIB/database.php';
$db = new database;
if(isset($_REQUEST['run'])){
try{	
	$form = new form;
	$form	->		post('name')
			->		val('minlength',3)
			->		post('age')
			->		val('digit')
			->		post('gender');	
					

	
	$a = $form->fetch();
	$b = $form->fetch('age');
	
	$form->submit();
	$db->insert("test",$a);
	
}
catch(Exception $e){
	echo "Ошибка: ".$e->getMessage();
}
	


}

?>

<form method="post" action="?run">
	name <input type="text" name="name">
    age <input type="text" name="age">
    gender <select name="gender" size="1">
    	<option value="m">Male</option>
        <option value="f">Female</option>
    </select>
    <input type="submit">
</form>