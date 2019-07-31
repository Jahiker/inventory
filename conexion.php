<?php  
	$link=mysqli_connect("localhost","root","")or die('No se pudo conectar al servidor'.mysqli_error($link));
	mysqli_select_db($link,"inventory");
?>