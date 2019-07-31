<?php  
	session_start();
	include('conexion.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>HOME</title>
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
		<table align="center" border="0" id="menu">
			<tr>
				<th width="50"><a href="almacenes.php"><img src="img/Almacen.png" id="icono"></a></th>
				<th width="50"><a href="productos.php"><img src="img/Caja.png" id="icono"></a></th>
				<th width="50"><a href="clientes-proveedores.php"><img src="img/189054-business (3).png" id="icono"></a></th>
				<th width="50"><a href="ordenes.php"><img src="img/informe.png" id="icono"></a></th>
				<th width="50"><a href="usuarios.php"><img src="img/user-header.png" id="icono"></a></th>
			</tr>
			<tr>
				<th>ALMACENES</th>
				<th>PRODUCTOS</th>
				<th>CLIENTES Y PROVEEDORES</th>
				<th>ORDENES</th>
				<th>USUARIOS</th>
			</tr>
		</table>
	</body>
</html>