<?php  
	session_start();
	include('conexion.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CLIENTES Y PROVEEDORES</title>
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
				<th width="50"><a href="listaClientes.php"><img src="img/559963c6a93ed04668d0d6142828389229491.png" id="icono"></a></th>
				<th width="50"><a href="listaProveedores.php"><img src="img/Iconos-clientes-01.png" id="icono"></a></th>
				<th width="50"><a href="registroClientesProveedores.php"><img src="img/add_77928.png" id="icono"></a></th>
			</tr>
			<tr>
				<th>CLIENTES</th>
				<th>PROVEEDORES</th>
				<th>AGREGAR CLIENTES O PROVEEDORES</th>
			</tr>
		</table>
	</body>
</html>