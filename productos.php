<?php  
	session_start();
	include('conexion.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PRODUCTOS</title>
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
				<th width="50"><a href="listaProductos.php"><img src="img/Caja.png" id="icono"></a></th>
				<th width="50"><a href="cargaProductos.php"><img src="img/add_77928.png" id="icono"></a></th>
				<th width="50"><a href="crearCategoria.php"><img src="img/label_icon-icons.com_54391.png" id="icono"></a></th>
			</tr>
			<tr>
				<th>PRODUCTOS</th>
				<th>CARGAR PRODUCTOS</th>
				<th>CREAR CATEGORIA DE PRODUCTOS</th>
			</tr>
		</table>
	</body>
</html>