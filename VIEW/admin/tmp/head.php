﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= $this->title;?></title>
<link href="<?=PATH_TEMPLATE_ADMIN;?>css/style_admin.css" rel="stylesheet" type="text/css" />
<?php
if(isset($this->js)){
			foreach($this->js as $js){
				echo'
					<script type="text/javascript" src="'.PATH_TEMPLATE_ADMIN.$js.'"> </script>';
			}
}

?>

</head>

<body>
<div class = "container">
