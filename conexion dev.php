<!-- conexion a base de datos en desarrollo -->
<?php  
	$servidor='localhost';
	$usuario='root';
	$clave='root';
	$db='inventory'

	$link=mysqli_connect($servidor,$usuario,$clave)or die('No se pudo conectar al servidor'.mysqli_error($link));

	mysqli_select_db($link,$db);
?>

