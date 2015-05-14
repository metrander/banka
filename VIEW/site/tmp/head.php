<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<script type="text/javascript" src="<?php echo PATH_TEMPLATE; ?>js/jquery-1.7.2.min.js"> </script>
    <script type="text/javascript" src="<?php echo PATH_TEMPLATE; ?>js/custumer.js"> </script>
    <?php

		if(isset($this->js)){
			foreach($this->js as $js){
				echo'
					<script type="text/javascript" src="'.PATH_TEMPLATE.$js.'"> </script>';
			}
		}
	?>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo PATH_TEMPLATE; ?>css/style.css">
   <title>
        <?php echo $this->title; ?>
    </title>
</head>	
<body>
<?php
@session_start();
?>
<div class="conteiner">	
