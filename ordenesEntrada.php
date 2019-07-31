<?php  
	session_start();
	include('conexion.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ORDENES</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php 
			if ($_SESSION['sexo']=='masculino') {
				include('bannerM.php');
			} else {
				include('bannerF.php');
			}
		?>
		<table align="center" border="0" id="menu1">
			<tr>
				<th width="50"><a href="listaOrdenesEntrada.php"><img src="img/Arrow-download-icon.png" id="icono"></a></th>
				<th width="50"><a href="ordenEntrada.php"><img src="img/add_77928.png" id="icono"></a></th>
			</tr>
			<tr>
				<th>ORDENES DE ENTRADA</th>
				<th>CREAR ORDEN DE ENTRADA</th>
			</tr>
		</table>
	</body>
</html>