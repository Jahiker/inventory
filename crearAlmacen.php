<?php  
	session_start();
	include('conexion.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ALMACENES</title>
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
		<form method="post" action="validar.php">
			<div>
				<table align="center" border="0" id="regisTable">
					<tr>
						<th colspan="2" id="titleTable">CREAR ALMACEN</th>
					</tr>
					<tr>
						<td>NOMBRE:</td>
						<td><input type="text" name="nombre" id="campo" placeholder="NOMBRE" required=""></td>
					</tr>
					<tr>
						<td>DIRECCION:</td>
						<td><textarea name="direccion" id="campo" placeholder="Introduzca direccion"></textarea></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" name="registrar" id="registrar" value="CREAR"><input type="reset" name="borrar" id="borrar" value="BORRAR"><input type="hidden" name="opcion" value="4"></td>
					</tr>
				</table>
			</div>
		</form>
	</body>
</html>