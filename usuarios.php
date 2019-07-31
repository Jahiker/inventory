<?php  
	session_start();
	include('conexion.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>USUARIOS</title>
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
				<th width="50"><a href="listaUsuarios.php"><img src="img/user-header.png" id="icono"></a></th>
				<th width="50"><a href="registro.php"><img src="img/add_77928.png" id="icono"></a></th>
			</tr>
			<tr>
				<th>USUARIOS</th>
				<th>AGREGAR USUARIO</th>
			</tr>
		</table>
	</body>
</html>